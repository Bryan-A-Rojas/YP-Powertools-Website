<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

?>

    <div class="container">
        <div class="row">
        	<!-- Dividers to center logo -->
            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-0"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            	<!-- Logo image and text -->
                <img src="../images/icons/yplogoblk.png" id="logo-padding-sm">
                <h1 id="logo-text-sm">Powertools</h1>
                <div class="container" id="form-transbox">
                <form action="scripts/login.php" method="POST">
	                <label for="email">Email:</label>
	                <br />
					<input type="email" placeholder="Enter Email" name="txtemail" required>
					<br />

					<label for="password">Password:</label>
					<br />

					<input type="password" placeholder="Enter Password" name="txtpassword" required>
					<br />
					<br />

					<button type="submit" name="submit" class="btn btn-success">Log In</button>
				</form>
				</div>
            </div>
	    </div>
    </div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>