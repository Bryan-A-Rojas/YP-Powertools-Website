<?php 

session_start();
include '../includes/header.inc.php';

?>

<div class="jumbotron" id="jumbotron-margin">
		<h1>Sign Up</h1>
		<a href="index.php"><h3>&lt;Back to Home Page</h3></a>
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
	                <label for="uploading">Upload Profile Picture:</label>
	                <br>
	        		<input type="file" name="txtuploadpicture" accept="image/*" class="btn btn-primary">
	        		<br />
	        		<br />
	        		<label for="Name">Full Name:</label>
					<br>
	        		<input type="text" placeholder="Enter Full Name" name="txtfullname" required>
	        		<br>
	        		<label for="email">Email:</label>
					<br>
	        		<input type="email" placeholder="Enter Email" name="txtemail" required>
	        		<br>
	        		<label for="password">Password:</label>
	        		<br>
	        		<input type="password" placeholder="Enter Password" name="txtpassword" required>
	        		<br>
	        		<label for="confirmpassword">Confirm Password:</label>
	        		<br>
	        		<input type="password" placeholder="Confirm Password" name="txtconfirmpassword" required>
	        		<br>
	        		<br>
	        		<button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
	        	</form>
				<br>
        		<p style="display:inline;">Already have an account? </p><a href="loginform.php" style="display:inline;">Login here</a>
        		</div>
            </div>
	    </div>
    </div>	
</div>

<?php 

include '../includes/endtags.inc.php';

?>