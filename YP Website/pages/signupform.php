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
  <div class="form-group">
    <label for="uploading">Upload Profile Picture:</label>
    <input type="file" name="profile_image" accept="image/*" class="form-control-file btn btn-primary" id="exampleFormControlFile1">
  </div>

  <div class="form-row">
  <div class="col">
      <label for="Name">Full Name:</label>
      <input type="text" placeholder="Enter Full Name" name="txtfullname" class="form-control" required>
    </div>
  <div class="col">
      <label for="email">Email:</label>
      <input type="email" placeholder="Enter Email" name="txtemail" class="form-control" required>
    </div>
  
    <div class="col">
      <label for="city">Enter City</label>
      <input type="city" placeholder="Enter City" name="txtcity" class="form-control" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col">
      <label for="fulladdress">Enter Full Address</label>
      <input type="fulladdress" placeholder="Enter Full Address" name="txtfulladdress" class="form-control" required>
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="password">Password:</label>
      <input type="password" placeholder="Enter Password" name="txtpassword" class="form-control" required>
    </div>
    <div class="col">
      <label for="confirmpassword">Confirm Password:</label>
      <input type="password" placeholder="Confirm Password" name="txtconfirmpassword" class="form-control" required>
    </div>
  </div>
	<br>
  <button type="submit" name="submit" class="btn btn-primary float-right">Sign Up</button>

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