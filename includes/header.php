<?php 
ob_start();
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
	$username = $_SESSION['username'];
	$user_id = $_SESSION['user-id'];
	$user_auth = true;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="top-menu">
		<a href="index.php">
			<header>
				<h1>APTECH Computer Education Blog</h1>
			</header>
		</a>
		<nav class="<?php if (isset($user_auth) && $user_auth == true) { echo 'long';} else {echo 'short';}
			 ?>">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Services</a></li>
			<?php if (isset($user_auth) && $user_auth == true) {
			 ?>
			<li><a href="add_categories.php">Add Category</a></li>
			<li><a href="add_post.php">Add Post</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php } else { ?>
			<li><a href="admin/index.php">Login</a></li>
			<?php } ?>
		</ul>
		<?php if (isset($username)) {
				echo "<p>Logged in: $username</p>";
			} ?>
	</nav>
	</div>
<div class="container">
