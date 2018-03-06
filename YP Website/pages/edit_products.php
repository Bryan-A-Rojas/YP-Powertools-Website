<?php 

session_start();
include '../includes/header.inc.php';

?>

<div class="jumbotron" id="jumbotron-margin">
		<h2>Edit Products Page</h2>
		<a href="index.php"><h4>&lt;Back to Home Page</h4></a>
</div>

<!-- Parallax -->
<div class="parallax" id="front-page-background">
    <div class="container">
        <div class="row">
        	<!-- Dividers to center logo -->
            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-0"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            	<!-- Logo image and text -->
                <img src="../images/icons/yplogoblk.png" id="logo-padding">
                <h1 id="logo-text">Powertools</h1>
                <div class="container" id="form-transbox">
                <form action="../includes/scripts/signup.php" method="POST" enctype="multipart/form-data">
	                <h2>Add Product</h2>

	                <label for="uploading">Upload Product Picture:</label>
	                <br>
	        		<input type="file" name="profile_image" accept="image/*" class="btn btn-primary">
	        		<br />
	        		<br />
	        		<label for="product">Product Name:</label>
					<br>
	        		<input type="text" placeholder="Enter Full Name" name="txtfullname" required>
	        		<br>
	        		<label for="price">Price:</label>
					<br>
	        		<input type="email" placeholder="Enter Email" name="txtemail" required>
 					<br />
	        		<label for="description">Description</label>
	        		<br>
	        		<input type="password" placeholder="Enter Password" name="txtpassword" required>
	        		<br>
	        		<br>
	        		<button type="submit" name="submit" class="btn btn-primary">Add</button>
	        	</form>
	</div>
</div>

<?php 

include '../includes/endtags.inc.php';

?>