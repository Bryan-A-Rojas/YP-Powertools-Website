<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

?>

<!-- <div style="background-image: url(../images/powertooloop.gif); background-repeat: no-repeat; background-size: 1400px;"> -->

    <div class="container">
        <div class="row">
        	<!-- Dividers to center logo -->
            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-0"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            	<!-- Logo image and text -->
                <img src="../images/icons/yplogoblk.png" id="logo-padding-sm">
                <h1 id="logo-text-sm">Powertools</h1>
                <div class="col-lg-12" style="margin-left: 80px">
                <div class="container" id="form-transbox" style="border-radius: 15px; margin-bottom: 100px; margin-left: 50px; margin-right: 200px">
                <form action="scripts/login.php" method="POST">
	                <div class="form-group">
					    <label for="email">Email:</label>
					    <div class="col-sm-12">
					    <input type="email" placeholder="Enter Email" name="txtemail" class="form-control" required>
						</div>
					  </div>

					    <div class="form-group">
					    <label for="password">Password:</label>
					    <div class="col-sm-12">
					    <input type="password" placeholder="Enter Password" name="txtpassword" class="form-control" required>
						</div>
					  </div>
					<br />

					<button type="submit" name="submit" class="btn btn-success" style="margin-left: 160px">Log In</button>
				</form>
				</div>
				</div>
            </div>
	    </div>
    </div>

    

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>

</div>