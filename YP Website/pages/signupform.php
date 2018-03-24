<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

?>
<div class="jumbotron" id="jumbotron-color">
	<div class="container" style="margin-top: 10px; margin-left: 60px">
		<h2>Sign Up</h2>
			<a href="index.php"><h4>&lt;Back to Home Page</h4></a>
	</div>
</div>

    <div class="container">
        <div class="row">
        	<!-- Dividers to center logo -->
            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-0"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            	<!-- Logo image and text -->
                <img src="../images/icons/yplogoblk.png" id="logo-padding-sm">
                <h1 id="logo-text-sm">Powertools</h1>
                <div class="container" id="form-transbox">
                <form action="../includes/scripts/signup.php" method="POST" enctype="multipart/form-data">
	                <label for="uploading">Upload Profile Picture:</label>
	                <br>
	        		<input type="file" name="profile_image" accept="image/*" class="btn btn-primary">
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
	        		<label for="fulladdress">Enter Full Address:</label>
	        		<br>
	        		<input type="fulladdress" placeholder="Enter Full Address" name="txtfulladdress" required>
					<br>
	        		<label for="city">City:</label>
	        		<br>
	        		<input type="city" placeholder="Enter City" name="txtcity" required>
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

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>s