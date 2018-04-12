<?php
	
require_once '../../config.php';
require_once CLASSES . 'Notifications.php';

	if(isset($_POST['submit'])){
		//Require Database connection
		require_once SCRIPTS . 'dbh.inc.php';

		//Get all post data
		$email = $_POST['txtemail'];
		$password = $_POST['txtadminpassword'];

		if(empty($email) || empty($password)){
			Notification::save_to_session('danger', 'Please fill up all fields!');
			header("Location: ../loginform_admin.php");
			exit();
		} else {
			//SQL insert statement
			$sql = "SELECT * 
					FROM accounts 
					WHERE email = '$email' AND (role = 'admin' OR role = 'superadmin');";
			$result = $Database->query($sql);
			
			if($result->num_rows < 1){
				Notification::save_to_session('danger', 'Email or Password is incorrect!');
				header("Location: ../loginform_admin.php");
				exit();
			} else {
				if($row = $result->fetch_assoc()){

					if(!password_verify($password, $row['password'])){
						Notification::save_to_session('danger', 'Email or Password is incorrect!');
						header("Location: ../loginform_admin.php");
						exit();
					
					}elseif($row['status'] != 'active') {
						Notification::save_to_session('danger', 'Account is deactivated!');
						header("Location: ../loginform_admin.php");
						exit();
					}else{

						$_SESSION['account_id'] = $row['account_id'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['profile_image'] = $row['profile_image'];

						Notification::save_to_session('success', 'Welcome!');
						header("Location: ../admin_page.php");
						exit();
					}
				}
			}
		}
	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../loginform_admin.php");
		exit();
	}
?>