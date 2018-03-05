<?php 

session_start();
include '../includes/header.inc.php';

?>

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
                <form action="">
        		<input type="file" name="txtuploadpicture" accept="image/*">
        		<br>
        		<input type="text" placeholder="Enter Name" name="txtfullname" required>
        		<br>
        		<input type="email" placeholder="Enter Email" name="txtemail" required>
        		<br>
        		<input type="password" placeholder="Enter Password" name="txtpassword" required>
        		<br>
        		<input type="password" placeholder="Confirm Password" name="txtconfirmpassword" required>
        		<br>
        		<button type="submit" name="submit">Register</button>
        		</form>

        		<a href="../pages/index.php">Return to Home</a>
            </div>
	    </div>
    </div>	
</div>

<?php 

include '../includes/endtags.inc.php';

?>