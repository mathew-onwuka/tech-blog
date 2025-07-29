<footer>
		<div class="f-widget">
			<div class="list">
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
			</div>
		</div>
		<div class="f-widget">
			<div class="list2">
				<h3>Services overview</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.
				</p>
				<ul>
					<li><a href="#">Be the best in what we do.</a></li>
					<li><a href="#">Connect the world in so many ways.</a></li>
					<li><a href="#">Enlighten young minds.</a></li>
				</ul>
				
			</div>
		</div>
		<div class="f-widget">
			<div class="list2">
				
				<h3>Contact Us</h3>
				<p>
					If you will like to reach our customer services, you can get in touch by our info below: <br>
				
					<b>Address:</b> Aptech 50 Zik Ave. Enugu, Nigeria  <br>
					<b>Telephone:</b> +234-90256-34362 <br>
					<b>FAX:</b> +234-4578 <br>
					<b>Others:</b> +234 -80246 -85574 
					<a href="mailto:AptechEducation@gmail.com" style="text-decoration: none; border: 1px solid #fff; padding: 5px; background-color: #ddd; margin-left: 10px; color: #BF1E2E; border-radius: 2px;">E-mail <img src="images/email.png" width="20"></a>
				</p>
				<span style="font-size: 10px; color: #BF1E2E; ">&copy; APTECH Computer Education 2017</span>
			</div>
		</div>
	</footer>
</div>

<script src="js/validate.js"></script>
</body>
</html>