<?php 

require_once 'config_admin.php';
require_once CLASSES . 'Notifications.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>YP Powertools</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Plaster" rel="stylesheet">
        <!-- Personalized CSS -->
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <!-- Font Awesome -->
    	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
	<body style="background-image: url(../images/powertooloop.gif); background-repeat: no-repeat; background-size: cover;">
		<?php 
			//Display notification if it exists
			if(isset($_SESSION['notify'])){
			    require_once CLASSES . 'Notifications.php';
			    echo Notification::display_notification();
			    Notification::delete_from_session();        
			}
		?>



	    <div class="container">
	        <div class="row">
	        	<!-- Dividers to center logo -->
	            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-0"></div>
	            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
	            	<!-- Logo image and text -->
	                <img src="../images/icons/yplogoblk.png" id="logo-padding-sm">
	                <h1 id="logo-text-sm">Powertools</h1>
	                <div class="col-lg-12" style="margin-left: 80px">
	                <div class="container" id="form-transbox" style="border-radius: 15px; margin-bottom: 100px; margin-left: 50px; margin-right: 200px; width: 50%">
	                <form action="scripts/login.php" method="POST">
		                <div class="form-group">
						    <label for="email">Email:</label>
						    <div class="col-sm-12">
						    <input type="email" name="txtemail" class="form-control" required>
							</div>
						  </div>

						    <div class="form-group">
						    <label for="password">Password:</label>
						    <div class="col-sm-12">
						    <input type="password" name="txtadminpassword" class="form-control" required>
							</div>
						  </div>
						<br />

						<button type="submit" name="submit" class="btn btn-success float-right" style="margin-top: -35px">Log In</button>
					</form>
					</div>
					</div>
	            </div>
		    </div>
	    </div>
	</body>
</html>

