<?php 
ob_start();
require('includes/db.inc.php');
require('includes/functions.inc.php');
$err_flag = false;

if (isset($_POST['fullname']) AND !empty($_POST['fullname'])) {
	$fullname = sanitize($_POST['fullname']);
}else{
	$err_flag = true;
}

if (isset($_POST['email']) AND !empty($_POST['email'])) {
	$email = sanitize($_POST['email']);
}else{
	$err_flag = true;
}

if (isset($_POST['comment']) AND !empty($_POST['comment'])) {
	$comment = sanitize($_POST['comment']);
}else{
	$err_flag = true;
}

$comm_date = $_POST['comm_date'];
$post_id = intval($_POST['post_id']);
$post_title = $_POST['post_title'];

if ($err_flag == false) {
	$sql = "INSERT INTO comments (fullname, comment, comm_date, post_id) VALUES ('$fullname', '$comment', '$comm_date', '$post_id')";

	 $query = mysqli_query($link, $sql);
	 if ($query) {
	 	echo '<script>alert("Comment added successfully");</script>';  //Can be ignored...
	 }

	 $sql1 = "UPDATE posts SET num_comm = num_comm + 1 WHERE post_id = '$post_id'";  //Update the posts column...
	 $query1 = mysqli_query($link, $sql1);
	 if ($query1) {


	 	$expiry = time() * 60 * 60 * 24 * 7;  //Time converted seconds, minutes, hours, day and 1 week..
	 
	 		setcookie("c-fname", $fullname, $expiry, '/');
			setcookie("c-email", $email, $expiry, '/');
	 	header("Location: view_post.php?post-id=$post_id&post_title=$post_title");
	 }
}

 ?>