<?php 
$page_title = "Add Category | APTECH Blog";
require("includes/header.php");
include 'includes/functions.inc.php';
include 'includes/db.inc.php';
if (isset($_SESSION['user-id'])) {
	$user_id = $_SESSION['user-id'];
} else {
	header("Location:index.php");
}

//Check if is isset login before one can view the add categories page.....
if (isset($_GET['submit'])) {
	$err = false;
	if (!empty($_GET['cat'])) {
		$cat = sanitize($_GET['cat']);
	} else {
		$err = true;
	}
	if (isset($cat)) {
		$sql = "SELECT * FROM categories WHERE cat_name = '$cat'";
	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0 ) {
		$err = true;
		$msg1 = 1;
	}
	}
	

	if ($err === false) {
		$sql = "INSERT INTO categories (cat_name) VALUES ('$cat')";
		$query = mysqli_query($link, $sql);
		if ($query) {
			$msg2 = 1;
		} else {
			$msg2 = 0;
		}

	}
}
?>
<div style="width: 100%; min-height: 400px; background-color: #ccc; padding: 10px;">
	<h1>Add Category</h1>
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="get">
	<input type="text" name="cat" placeholder="Enter new category here" style="width: 350px; height: 40px; padding:5px; border-radius: 5px; margin-right: 10px; font-size: 18px;">
	<input type="submit" name="submit" value="Add Category" style="width: 200px; height: 40px; padding:5px; border-radius: 5px; margin-right: 10px;font-size: 18px;">
	</form>
	<?php if (isset($err) && $err == true) { ?>
	<p style="width: 560px; padding: 10px; font-size: 18px; font-weight: bold; background-color: #43A047; color: #fff; min-height:50px">
		<?php if (isset($msg1) && $msg1 == 1) {
			echo "This category already exists...";
		} 
		?>
	</p>
	<?php } ?>
	<?php if (isset($msg2) && $msg2 == 1) { ?>
	<p style="width: 560px; padding: 10px; font-size: 18px; font-weight: bold; background-color: #43A047; color: #fff; min-height:50px">
		<?php if (isset($msg2) && $msg2 == 1) {
			echo "New category added successfully!";
		} 
		?>
	</p>
	<?php } ?>
	
</div>
<?php require 'includes/footer.php'; ?>