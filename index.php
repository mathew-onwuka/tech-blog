<?php 
$page_title = "APTECH Blog | Home";
require("includes/header.php");
require('includes/db.inc.php');
require('includes/functions.inc.php');
 ?>

	<div class="slider">
		<div class="feature"></div>
	</div>

<!-- Catergory 1 -->
	<div class="cat">
		<div class="cat-title">
			<h1><a href="#">Web Development</a></h1>
			<?php 
			$sql = "SELECT * FROM posts WHERE cat_id = 2 ORDER BY post_date DESC LIMIT 4";
			$result = mysqli_query($link, $sql);
			 ?>
		</div>

<!-- Post inserted from database -->

		<?php while ($rows = mysqli_fetch_array($result)) {
			$img_path = $rows['image_path'];
			$title = $rows['post_title'];
			$body = substr($rows['post_body'], 0, 200);
			$body = nl2br($body);
			$post_id = $rows['post_id'];
			$num_comm = $rows['num_comm'];
		 ?>

		 <a href="view_post.php?post-id=<?php echo urldecode($post_id) . '&post_title=' . urldecode($title); ?>">
		 
			<div class="post">
				<div class="pst-img">
					<img src="<?php echo $img_path; ?>">
				</div>
				<div class="pst-body">
					<h1><?php echo $title; ?></h1>
					<p>Comments:<?php echo $num_comm; ?></p>
					<p><?php echo $body; ?></p>

				</div>
			</div>
		</a>
			<?php } ?>
		
<!-- Post Insertion from database end here -->
		
	</div>


<!-- Catergory 2 -->

	<div class="cat">
		<div class="cat-title">
			<h1><a href="#">Networking</a></h1>
			<?php 
			$sql = "SELECT * FROM posts WHERE cat_id = 1 ORDER BY post_date DESC LIMIT 4";
			$result = mysqli_query($link, $sql);
			 ?>
		</div>

<!-- Post inserted from database -->

		<?php while ($rows = mysqli_fetch_array($result)) {
			$img_path = $rows['image_path'];
			$title = $rows['post_title'];
			$body = substr($rows['post_body'], 0, 200);
			$body = nl2br($body);
			$post_id = $rows['post_id'];
			$num_comm = $rows['num_comm'];
		 ?>

	<a href="view_post.php?post-id=<?php echo $post_id . '&post_title=' . $title; ?>">
		<div class="post">
			<div class="pst-img">
				<img src="<?php echo $img_path; ?>">
			</div>
			<div class="pst-body">
				<h1><?php echo $title; ?></h1>
				<p>Comments:<?php echo $num_comm; ?></p>
				<p><?php echo $body; ?></p>
			</div>
		</div>
	</a>
		<?php } ?>
<!-- Post Insertion from database end here -->	
	</div>



	<!-- Catergory 3 -->

	<div class="cat">
		<div class="cat-title">
			<h1><a href="#">Graphics Design & Animation</a></h1>
			<?php 
			$sql = "SELECT * FROM posts WHERE cat_id = 3 ORDER BY post_date DESC LIMIT 4";
			$result = mysqli_query($link, $sql);
			 ?>
		</div>

<!-- Post inserted from database -->

		<?php while ($rows = mysqli_fetch_array($result)) {
			$img_path = $rows['image_path'];
			$title = $rows['post_title'];
			$body = substr($rows['post_body'], 0, 200);
			$body = nl2br($body);
			$post_id = $rows['post_id'];
			$num_comm = $rows['num_comm'];
		 ?>
	<a href="view_post.php?post-id=<?php echo $post_id . '&post_title=' . $title; ?>">
		<div class="post">
			<div class="pst-img">
				<img src="<?php echo $img_path; ?>">
			</div>
			<div class="pst-body">
				<h1><?php echo $title; ?></h1>
				<p>Comments:<?php echo $num_comm; ?></p>
				<p><?php echo $body; ?></p>

			</div>

		</div>
	</a>
		<?php } ?>

<!-- Post Insertion from database end here -->	
	</div>
<?php require("includes/footer.php"); ?>