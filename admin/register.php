<?php 
include '../includes/db.inc.php';
include '../includes/functions.inc.php';

if (isset($_POST['submit'])){
 	$err = false;
 	if (empty($_POST['fname']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['pass2'])) {
 		$err = true;
 	}else{
 		$fullname = sanitize($_POST['fname']);
 		$username = sanitize($_POST['username']);
 		$email = sanitize($_POST['email']);
 		if ($_POST['pass'] == $_POST['pass2']){
 			$password = sha1($_POST['pass']);
 		}else{
 			$err = true;
 		}
 	}

 	if (isset($username) && isset($email)) {
 		$sql1 = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
 	$result1 =  mysqli_query($link, $sql1);

	 	if (mysqli_num_rows($result1) > 0) {
	 		$err = true;
	 		$info = "Username/Email already exist, Choose a new username and email";
	 	}
 	}

 	if ($err == false) {
 		$sql = "INSERT INTO users (username, fullname, email, password) VALUES ('$username', '$fullname', '$email', '$password')";
 		 $result = mysqli_query($link, $sql);
 		 if ($result){
 		 	$msg = 1;
 		 	$fullname = "";
 		 	$username = "";
 		 	$email = "";
 		 }
 	} else {
 		$msg = 0;
 	}
 } 


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register New User</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<div class="container">
	<div class="top-menu">
		<header>
			<h1>APTECH Computer Education Blog</h1>
		</header>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="index.php">LOGIN</a></li>
			</ul>
		</nav>
	</div>
	<div class="form-body">
		<h1>Capture new user details</h1>
		<form  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
			<table>
				<tr>
					<td><label>Fullname:</label></td>
					<td><input type="text" name="fname" value="<?php if (isset($fullname)) {
						echo $fullname;
					}?>"></td>
				</tr>
				<tr>
					<td><label>Choose username:</label></td>
					<td><input type="text" name="username" style="<?php if (isset($info)) {
						echo "border: 2px solid red;";
					}?>"  value="<?php if (isset($username)) {
						echo $username;
					}?>"></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type="password" name="pass"></td>
				</tr>
				<tr>
					<td><label>Confirm Password</label></td>
					<td><input type="password" name="pass2"></td>
				</tr>
				<tr>
					<td><label>Email</label></td>
					<td><input type="email" name="email" style="<?php if (isset($info)) {
						echo "border: 2px solid red;";
					}?>" value="<?php if (isset($email)) {
						echo $email;
					}?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Register User" ></td>
				</tr>
			</table>
		</form>
		<?php 
		if (isset($msg) && $msg == 1) {
		 ?>
			<div>
				<p style="width: 300px; background-color: #fff; color: #EA4335; font-size: 20px; font-weight: bold;"> New User Created Successfully</p>
			</div>
		<?php } ?>
		<?php 
		if (isset($msg) && $msg == 0) {
		 ?>
			<div>
				<p style="width: 300px; background-color: #EA4335; color: #000; font-size: 20px; font-weight: bold;"> Registeration Could not be completed. Try again</p>
			</div>
		<?php } ?>

		<p>
			<?php if (isset($info)) {
				echo $info;
			} ?>
		</p>
	</div>	
<?php require("../includes/footer.php"); ?>

</body>
</html>