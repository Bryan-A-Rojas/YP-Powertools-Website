<?php 

require_once '../config.php';

if(isset($_SESSION['role'])){

	if($_SESSION['role'] == "user"){

		require_once INCLUDES . 'header.inc.php';

		require_once INCLUDES . 'navbar.inc.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-6" id="profile-transbox" style="margin-top: 20px;">
			<div>
				<h2><?php echo $_SESSION['name'] ?>'s Profile</h2>	
			</div>

			<?php if($_SESSION['profile_image'] != NULL): ?>
				<img style="margin-left: 35px;" src="../images/profile_images/<?php echo $_SESSION['profile_image'] ?>" alt="userimage" id="profile-image">
			<?php else: ?>
				<img style="margin-left: 35px;" src="../images/profile_images/sample-user.png" alt="userimage" id="profile-image">
			<?php endif ?>
			
			<br />
			<br />
			
			<label for="email">Email:</label>
			<p><?php echo $_SESSION['email'] ?></p>
			
			<label for="city">City:</label>
			<p><?php echo $_SESSION['city']?></p>

			<label for="fulladdress">Address:</label>
			<p><?php echo $_SESSION['full_address']?></p>
			
			
			 <button type="button" class="btn btn-warning btn-lg float-right" data-toggle="modal" data-target="#editProfileModal" data-whatever="@mdo">Edit Profile</button>

			 <button type="button" class="btn btn-danger btn-lg float-right" data-toggle="modal" data-target="#changePasswordModal" data-whatever="@mdo" style="margin-right:5px;">Change Password</button>

		</div>
	</div>
</div>

<!-- Modal for edit profile -->

<form action="../includes/scripts/update.php" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
			<input type="hidden" name="account_id" value="<?php echo $_SESSION['account_id'] ?>">

			<div class="form-group">
				<?php if($_SESSION['profile_image'] != NULL): ?>
					<img style="margin-left: 84px;" src="../images/profile_images/<?php echo $_SESSION['profile_image'] ?>" alt="userimage" id="profile-image" class="modal-image-size">
				<?php else: ?>
					<img style="margin-left: 84px;" src="../images/profile_images/sample-user.png" alt="userimage" id="profile-image" class="modal-image-size">
				<?php endif ?>
			</div>

          <div class="form-row">
            <label for="uploading">Upload Profile Picture:</label>
            <input type="file" name="profile_image" accept="image/*" class="form-control-file btn btn-primary" id="exampleFormControlFile1">
          </div>

          <div class="form-row">
            <div class="col">
              <label for="Name">Full Name:</label>
              <input type="text" placeholder="Enter Full Name" name="txtfullname" class="form-control" value="<?php echo $_SESSION['name'] ?>" required>
            </div>
          </div>

          <div class="form-row">
              <div class="col">
                <label for="email">Email:</label>
                <input type="email" placeholder="Enter Email" name="txtemail" class="form-control" value="<?php echo $_SESSION['email'] ?>" required>
              </div>
          </div>
          
          <div class="form-row">
            <div class="col">
              <label for="fulladdress">Enter Full Address</label>
              <input type="fulladdress" placeholder="Enter Full Address" name="txtfulladdress" class="form-control" value="<?php echo $_SESSION['full_address']?>" required>
            </div>
            <div class="col">
              <label for="city">Enter City</label>
              <input type="city" placeholder="Enter City" name="txtcity" class="form-control" value="<?php echo $_SESSION['city']?>" required>
            </div>
          </div>

          <hr>

          <div class="modal-footer col-lg-12">
            <button type="submit" name="update" class="btn btn-lg btn-warning float-right">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- Modal for change password -->
<form action="../includes/scripts/change_password.php" method="POST">
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
            	<input type="hidden" name="account_id" value="<?php echo $_SESSION['account_id'] ?>">

              <div class="form-row">
	            <div class="col">
	              <label for="password">Password:</label>
	              <input type="password" placeholder="Enter Password" name="txtpassword" class="form-control" required>
	            </div>
	          </div>

	          <div class="form-row">
	            <div class="col">
	              <label for="password">New Password:</label>
	              <input type="password" placeholder="Enter Password" name="txtnewpassword" class="form-control" required>
	            </div>
	          </div>

	          <div class="form-row">
	            <div class="col">
	              <label for="confirmpassword">Confirm New Password:</label>
	              <input type="password" placeholder="Confirm Password" name="txtconfirmnewpassword" class="form-control" required>
	            </div>
	          </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="change_password" class="btn btn-danger btn-lg">Confirm</button>
            </div>    
          </div>
        </div>
      </div>
    </div>
</form>


<?php 

		require_once INCLUDES . 'endtags.inc.php';
	} else {
		header("Location: index.php");
		exit();
	}
} else {
	header("Location: index.php");
	exit();
}

?>