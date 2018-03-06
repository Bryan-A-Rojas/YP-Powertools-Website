<?php 

session_start();
include '../includes/header.inc.php';
include '../includes/navbar_superadmin.inc.php';

?>

<div class="container">
	<div class="row">
		<div class="col-md-13" id="profile-transbox">
			<h2>Super Admin's Profile</h2>	
			<img src="../images/profile_images/sample-superadmin.png" alt="userimage" id="profile-image">
			<br />
			<label for="uploading">Change Profile Picture:</label>
			<br />
			<input type="file" name="txtuploadpicture" accept="image/*">
			<br />
			<label for="email">Your Email:</label>
			<p>Email should go here</p>
		</div>
	</div>
</div>

<?php 

include '../includes/endtags.inc.php';

?>