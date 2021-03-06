<?php
	
require_once '../../config.php';

	if(isset($_POST['submit'])){
		require_once 'dbh.inc.php';
		require_once CLASSES . 'Notifications.php';

		//Get all post data
		$email = $_POST['txtemail'];
		$password = $_POST['txtpassword'];

		if(empty($email) || empty($password)){
			Notification::save_to_session('danger', 'Please fill up all fields!');
			header("Location: ../../pages/user_page.php");
			exit();
		} else {
			//SQL insert statement
			$sql = "SELECT * 
					FROM accounts 
					WHERE email = '$email' AND role = 'user';";
			$result = $Database->query($sql);
			
			if($result->num_rows < 1){
				Notification::save_to_session('danger', 'Email or Password is incorrect!');
				header("Location: ../../pages/user_page.php");
				exit();
			} else {
				if($row = $result->fetch_assoc()){

					if(!password_verify($password, $row['password'])){
						Notification::save_to_session('danger', 'Email or Password is incorrect!');
						header("Location: ../../pages/user_page.php");
						exit();
					} elseif($row['status'] != 'active') {
						Notification::save_to_session('danger', 'Account is deactivated!');
						header("Location: ../../pages/index.php");
						exit();
					} else {

						$_SESSION['account_id'] = $row['account_id'];
						$_SESSION['email'] = $row['email'];

						$_SESSION['phone_number'] = $row['phone_number'] != NULL ? $row['phone_number'] : 'N/A';
						
						$_SESSION['name'] = $row['name'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['profile_image'] = $row['profile_image'];
						$_SESSION['status'] = $row['status'];

						$id = $_SESSION['account_id'];

						$result = $Database->query("SELECT * 
													FROM addresses 
													WHERE account_id = $id;");
						$row = $result->fetch_assoc();

						$_SESSION['full_address'] = $row['full_address'];
						$_SESSION['city'] = $row['city'];

						Notification::save_to_session('success', 'Welcome!');
						header("Location: ../../pages/user_page.php");
						exit();
					}
				}
			}
		}
	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../../pages/user_page.php");
		exit();
	}
?>