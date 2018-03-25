<?php 

require_once '../config.php';
require_once INCLUDES . 'header.inc.php';

?>

	<div class="container" style="margin-top: 10px; margin-left: 60px">
		<div class="jumbotron" id="jumbotron-color">
		<h2>Login</h2>
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
                <form action="../includes/scripts/login.php" method="POST">
	                  <div class="form-group">
					    <label for="email">Email:</label>
					    <div class="col-sm-6">
					    <input type="email" placeholder="Enter Email" name="txtemail" class="form-control" required>
						</div>
					  </div>

					    <div class="form-group">
					    <label for="password">Password:</label>
					    <div class="col-sm-6">
					    <input type="password" placeholder="Enter Password" name="txtpassword" class="form-control" required>
						</div>
					  </div>
					<br />

					<button type="submit" name="submit" class="btn btn-success">Log In</button>
				</form>
				<br>
				<p style="display:inline;">No account? </p><a href="signupform.php" style="display:inline;">Sign Up here</a>
				</div>
            </div>
	    </div>
    </div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>