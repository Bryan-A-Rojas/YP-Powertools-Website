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
				<input type="email" placeholder="Enter Email" name="txtemail" required>
				<br />

				<label for="password">Password:</label>
				<br />

				<input type="password" placeholder="Enter Password" name="txtpassword" required>
				<br />
				<br />

				<button type="submit" name="submit">Log In</button>

        		<a href="../pages/index.php">Return to Home</a>
            </div>
	    </div>
    </div>	
</div>

<?php 

include '../includes/endtags.inc.php';

?>