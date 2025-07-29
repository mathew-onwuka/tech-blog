<?php
ob_start();
session_start(); 
include 'header.php';
include '../includes/functions.inc.php';
include '../includes/db.inc.php';
?>
<?php 
if (isset($_POST['submit'])) {
	$err = false;
	if (!empty($_POST['username'])) {
		$username = sanitize($_POST['username']);
	} else {
		$msg1 = 1;
		$err = true;
	}

	if (!empty($_POST['password'])) {
		$password = sanitize($_POST['password']);
		$password = sha1($password);
	} else {
		$msg2 = 1;
		$err = true;
	}

	if ($err == false) {
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$query = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($query);
		if (mysqli_num_rows($query) > 0) {
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['user-id'] = $row['user_id'];
			header("Location:../index.php");
		} else {
			$msg3 = 1;
		}
	}

}
?>
<h1>SIGN IN</h1>
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		<table>
			<tr>
				<td><label>USERNAME:</label></td>
				<td><input type="text" name="username" <?php if (isset($msg1) && ($msg1 == 1)) {
					echo 'style = "border:2px solid red;"';
				} ?> value="<?php if(isset($username)): echo $username; ?>
					
				<?php endif ?>"></td>
			</tr>

			<tr>
				<td><label>PASSWORD:</label></td>
				<td><input type="password" name="password" <?php if (isset($msg1)) {
					echo 'style = border:2px solid red';
				} ?>></td>
				<td><button>SHOW</button></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="Log In" id="login"></td>
			</tr>
		</table>
	</form>
	<?php if (isset($msg3)) {
					echo '<div style="color:red; font-size:17px;">Incorrect login details</div>';
				} ?>
<?php include 'footer.php' ?>