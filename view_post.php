<?php 
if (isset($_GET['post_title']) && isset($_GET['post-id'])) {
	$post_id = htmlentities($_GET['post-id']);
	$page_title = htmlentities($_GET['post_title']);
}else{
	header("Location: index.php");
}


$page_title = htmlspecialchars($GET['post_title']) . '| APTECH Blog';  //collect the page title $ post id 
require("includes/header.php");
require('includes/db.inc.php');
$post_id = intval($post_id);  

// A better way to query two separate tables and join them together...
$sql = "SELECT posts.*, users.fullname FROM posts INNER JOIN users ON posts.user_id = users.user_id WHERE post_id = '$post_id'";
$query = mysqli_query($link, $sql);
if (mysqli_num_rows($query) > 0) {
	$row = mysqli_fetch_array($query);
	$img_path = $row['image_path'];
	$post_date = date('F jS Y', $row['post_date']);
	$post_title = $row['post_title'];
	$body = nl2br($row['post_body']);
	$fullname = $row['fullname'];


	// Inserted...
	// $author_user_id = $row['user_id'];
	// $sql2 = "SELECT fullname FROM users WHERE user_id = '$author_user_id'";
	// $query2 = mysqli_query($link, $sql2);
	// if (mysqli_num_rows($query2) > 0) {
	// 	$row2 = mysqli_fetch_array($query2);
	// 	$fullname = $row2['fullname'];
		
	// }


} 
 ?>

 <div class="postCont"> 
 	<div class="imgCont">
 		<img src="<?php echo $img_path; ?>">
 	</div>
 	<div class="userDet">
 		<p>Published by: <?php echo $fullname; ?> </p>
 	</div>
 	<div class="userDet">
 		<p>On: <?php echo $post_date; ?> </p>
 	</div>
 	<h1><?php echo $post_title; ?></h1>
 	<div class="postBody">
 		<?php echo $body; ?>
 	</div>
 	
 		<hr>
 	<div class="comment">

 		<h3>Enter A comment below:</h3>

 		<!-- Set the cookie field -->
		<form action="add_comment.php" method="post" onsubmit="return validateForm(this);">

			 		<input type="text" placeholder="Provide your fullname" name="fullname" required>
			 		<input type="email" placeholder="Provide your email address" name="email" required>
			 		<textarea name="comment" placeholder="Enter your comment here..."></textarea>
			 		<input type="hidden" name="comm_date" value=" <?php echo time(); ?>">
			 		<input type="hidden" name="post_id" value=" <?php echo $post_id; ?>">
			 		<input type="hidden" name="post_title" value=" <?php echo $post_title; ?>">
			 		<input type="submit" value="Post Comment" name="submit">
		</form>
	</div>


	<h3>View Comments:</h3>

	<?php 
	$sql = "SELECT * FROM comments WHERE post_id = '$post_id'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_array($query)) {
			$fullname = $row['fullname'];
			$comm_date = date("F jS Y", $row['comm_date']);
			$comment = nl2br($row['comment']);
		
	 ?>
	<div class="view-comm">
		<p class="c-details">Fullname: <?php echo $fullname; ?></p>
		<p class="c-details">Date: <?php echo $comm_date; ?></p>
		<p class="comm"><?php echo $comment; ?></p>
	</div>

	<?php } } ?>
 </div>

<?php require("includes/footer.php"); ?>