<?php
$page_title = "APTECH Blog | Add Post";
require("includes/header.php"); 
require('includes/db.inc.php');
require('includes/functions.inc.php');
if (isset($_SESSION['user-id'])) {
	$user_id = $_SESSION['user-id'];
} else {
	header("Location:index.php");
}

if (isset($_POST['submit'])) {
	$error = false;
// Check if text field is not empty, if yes then sanitize the Post Title and assign to a variable
	if (!empty($_POST['title'])) {
		$title = sanitize($_POST['title']);
	} else {
		$error = true;
		$title_err = 1;
	}
// Check if text field is not empty, if yes then Sanitize Post Category and assign to a variable
	if (!empty($_POST['category'])) {
		$category = sanitize($_POST['category']);
		$category = intval($category);
		if ($category == 0) {
			$error = true;
			$noCatErr = 1;
		} 
	} else {
		$error = true;
		$cat_err = 1;
	}
// Check if text field is not empty, if yes then Sanitize Post Body and assign to a variable
	if (!empty($_POST['article'])) {
		$article = trim(sanitize($_POST['article']));
	} else {
		$error = true;
		$article_err = 1;
	}

// Get image and carry out all neccessary validations
	if ($_FILES['image']['error'] == 0) {
		$img_size = $_FILES['image']['size'];
		$img_name = $_FILES['image']['name'];
		$tmp_path = $_FILES['image']['tmp_name'];
		$img_type = $_FILES['image']['type'];
// Restrict file size upload to less than 1MB
		if ($img_size > 1048576) {
			$error = true;
			$img_size_err = 1;
		}
// Restrict user from uploading any file other than an image
		$extensions = array('jpg', 'jpeg', 'gif', 'png');
		$img_ext = explode('/', $img_type);
		$img_ext = end($img_ext);
		$img_ext = strtolower($img_ext);

		if (in_array($img_ext, $extensions) != true) {
			$error = true;
			$img_type_err = 1;
		}

	}

// If error is false insert post into the database
	if ($error === false) {
		$post_date = $_POST['post_date'];
		$img_path = 'img-uploads/' . basename($img_name);
		$sql_stmt = "INSERT INTO posts (post_title, post_body, post_date, image_path, num_comm, cat_id, user_id) VALUES ('$title', '$article', '$post_date', '$img_path', 0, '$category', '$user_id')";
		$query = mysqli_query($link, $sql_stmt);
		if ($query) {
			$move_img_to_dir = move_uploaded_file($tmp_path, $img_path);
			if ($move_img_to_dir) {
				echo "<script>alert('New post inserted successfully')</script>";
			}
			

		}
	}
}
?>

	
<div class="post-body">
	<h1>Add New Post:</h1>

		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm(this);">

			<input type="text" placeholder="Post Title" name="title">
			<select name="category">
			<option value="0">Select Category</option>
				<?php 
				// Fetch all categries for HTML Select options
				$sql = "SELECT * FROM categories";
				$result = mysqli_query($link, $sql);
				while ($row = mysqli_fetch_array($result)) { 
					$cat_id = $row['cat_id'];
					$cat_name = $row['cat_name'];
					?>
				<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
				<?php } ?>
			</select>
			<label>Post related image</label>
			<input type="file" name="image">
			<textarea placeholder="Please enter your post content here" name="article"></textarea>
			<input type="hidden" value="<?php echo time(); ?>" name="post_date">
			<input type="submit" value="Submit Post" name="submit">

		</form>
</div>

<?php require("includes/footer.php"); ?>