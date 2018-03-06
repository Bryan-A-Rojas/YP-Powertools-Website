<?php 

session_start();
include '../includes/header.inc.php';
include '../includes/navbar_superadmin.inc.php';

?>

<div class="container">
	<div class="row">
		<div class="col-md-13" id="profile-transbox">
			<h2>Super Admin's Profile</h2>	
			
			<?php if($_SESSION['profile_image'] != NULL): ?>
				<img src="../images/profile_images/<?php echo $_SESSION['profile_image'] ?>" alt="userimage" id="profile-image">
			<?php else: ?>
				<img src="../images/profile_images/sample-superadmin.png" alt="userimage" id="profile-image">
			<?php endif ?>

			<br />
			<label for="uploading">Change Profile Picture:</label>
			<br />

			<form action="../includes/scripts/upload_user_image.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="profile_image" accept="image/*" class="btn btn-primary">
				<input type="submit" name="upload" value="Upload" class="btn btn-success">
			</form>
			
			<br />
			<label for="email">Email:</label>
			<p><?php echo $_SESSION['email'] ?></p>
			
		</div>
	</div>
</div>

<?php 

include '../includes/endtags.inc.php';

?>