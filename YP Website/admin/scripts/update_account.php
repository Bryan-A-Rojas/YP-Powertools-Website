<?php

require_once '../config_admin.php';
require_once CLASSES . 'Notifications.php';

	if(isset($_POST['update'])){

		require_once SCRIPTS . 'dbh.inc.php';
		
		require ADMIN_CLASSES . 'Admin.inc.php';
		$Admin = New Admin($_SESSION['account_id']);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../accountlist.php");
			exit();
		}

		require_once SCRIPTS . 'functions.inc.php';

		$profile_image = $_FILES['profile_image'];
		$full_name = $Database->real_escape_string($_POST['txtfullname']);
		$email = $Database->real_escape_string($_POST['txtemail']);
		$phone_number = $Database->real_escape_string($_POST['txtno']);
		$full_address = $Database->real_escape_string($_POST['txtfulladdress']);
		$city = $Database->real_escape_string($_POST['txtcity']);
		$account_id = $Database->real_escape_string($_POST['account_id']);
		$role = $Database->real_escape_string($_POST['role']);

		if(empty($full_name) || empty($email)){
			Notification::save_to_session('danger', 'Please fill up all fields!');
			header("Location: ../accountlist.php");
			exit();
		} else {
				//Check if they are in the right format
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				    Notification::save_to_session('danger', 'Email is in the wrong format!');
				    header("Location: ../accountlist.php");
					exit();
				} else {
					
					$status = isset($_POST['status']) ? "active" : "inactive";
					
					$sql = "";
					//if profile image is not uploaded then use different insert
					if(!file_exists($_FILES['profile_image']['tmp_name']) || !is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
						
						if($_SESSION['role'] == 'superadmin'){
							$role = $_POST['role'];
							$sql = "UPDATE `accounts` 
								SET `name` = '$full_name',
								 	`email`= '$email',
								 	`phone_number` = '$phone_number',
								 	`role` = '$role',
								 	`status` = '$status'
								WHERE `account_id` = $account_id;";
						} else {
							$sql = "UPDATE `accounts` 
								SET `name` = '$full_name',
									`phone_number` = '$phone_number',
								 	`email`= '$email',
								 	`status` = '$status'
								WHERE `account_id` = $account_id;";
						}

					} else {
						//else move profile image to a folder
						if(move_image($_FILES['profile_image'], "profile_images") !== true){
							Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
							header("Location: ../accountlist.php");
							exit();
						} else {
							$image_name = $_FILES['profile_image']['name'];

							if($_SESSION['role'] == 'superadmin'){
								$role = $_POST['role'];
								$sql = "UPDATE `accounts` 
										SET `profile_image` = '$image_name',
											`name` = '$full_name',
										 	`email`= '$email',
										 	`phone_number` = '$phone_number',
										 	`role` = '$role',
										 	`status` = '$status'
										WHERE `account_id` = $account_id;";
							} else {
								$sql = "UPDATE `accounts` 
									SET `profile_image` = '$image_name',
										`name` = '$full_name',
										`phone_number` = '$phone_number',
									 	`email`= '$email',
									 	`status` = '$status'
									WHERE `account_id` = $account_id;";
							}
						}
					}

					if ($Database->query($sql) === TRUE) {
						
						$sql = "UPDATE `addresses` 
								SET `full_address` = '$full_address', 
									`city` = '$city' 
								WHERE `account_id` = $account_id;";
						$Database->query($sql);

						$result = $Database->query("SELECT *
										  			FROM accounts
										  			WHERE account_id = $account_id");

						if($role != 'user' AND !isset($_POST['change'])){
							$_SESSION['name'] = $full_name;
							$_SESSION['email'] = $email;
							Notification::save_to_session('success', 'Account Updated!');
						    header("Location: ../admin_page.php");
						    exit();
						}
						
						Notification::save_to_session('success', 'Account Updated!');
					    header("Location: ../accountlist.php");
					    exit();
					} else {
						Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
					    header("Location: ../accountlist.php");
					    exit();
					}
				}
			}
	} elseif(isset($_POST['reactivate'])){

		require SCRIPTS . 'dbh.inc.php';

		require ADMIN_CLASSES . 'Admin.inc.php';
		$Admin = New Admin($_SESSION['account_id']);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../accountlist.php");
			exit();
		}

		$account_id = $_POST['account_id'];

		$sql = "UPDATE `accounts` 
				SET `status`= 'active'
				WHERE `account_id` = $account_id;";
		
		if($Database->query($sql)){
			Notification::save_to_session('success', 'Account Restored!');
			header("Location: ../accountlist.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../accountlist.php");
			exit();
		}
	} elseif(isset($_POST['deactivate'])) {
		require SCRIPTS . 'dbh.inc.php';

		require ADMIN_CLASSES . 'Admin.inc.php';
		$Admin = New Admin($_SESSION['account_id']);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../accountlist.php");
			exit();
		}

		$account_id = $_POST['account_id'];

		$sql = "UPDATE `accounts` 
				SET `status`= 'inactive'
				WHERE `account_id` = $account_id;";
		
		if($Database->query($sql)){
			Notification::save_to_session('success', 'Account Deactivated!');
			header("Location: ../accountlist.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../accountlist.php");
			exit();
		}
	} elseif(isset($_POST['create'])) {
		require SCRIPTS . 'dbh.inc.php';

		require ADMIN_CLASSES . 'Admin.inc.php';
		$Admin = New Admin($_SESSION['account_id']);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../accountlist.php");
			exit();
		}

		require SCRIPTS . 'functions.inc.php';

		$profile_image = $_FILES['profile_image'];
		$full_name = $Database->real_escape_string($_POST['txtfullname']);
		$email = $Database->real_escape_string($_POST['txtemail']);
		$phone_number = $Database->real_escape_string($_POST['txtno']);
		$password = $Database->real_escape_string($_POST['txtpassword']);
		$confirm_password = $Database->real_escape_string($_POST['txtconfirmpassword']);
		$full_address = $Database->real_escape_string($_POST['txtfulladdress']);
		$city = $Database->real_escape_string($_POST['txtcity']);

		$role = "user";
		if($_SESSION['role'] == 'superadmin' AND isset($_POST['role'])){
			$role = $Database->real_escape_string($_POST['role']);
		}
		
		$status = isset($_POST['status']) ? 'active' : 'inactive';

		if(empty($full_name) 		||
		   empty($email) 	 		|| 
		   empty($password)  		|| 
		   empty($confirm_password) || 
		   empty($full_address) 	|| 
		   empty($city)){

			Notification::save_to_session('danger', 'Please fill up all fields!');
			header("Location: ../accountlist.php");
			exit();
		} else {
			
			if($password != $confirm_password){
				Notification::save_to_session('danger', 'Password and confirm password is not the same!');
				header("Location: ../accountlist.php");
				exit();
			} else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				    Notification::save_to_session('danger', 'Email is in the wrong format!');
				    header("Location: ../accountlist.php");
					exit();
				} else {
					//Hash password
					$HashedPassword = password_hash($password,PASSWORD_DEFAULT);
					
					//SQL string to insert in database
					$sql = "";
					//if profile image is not uploaded then use different insert
					if(!file_exists($_FILES['profile_image']['tmp_name']) || !is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
						$sql = "INSERT INTO `accounts` (`name`, `email`, `phone_number`, `password`, `status`, `role`) 
								VALUES ('$full_name', '$email', '$phone_number', '$HashedPassword', '$status', '$role');";
					} else {
						//else move profile image to a folder
						if(move_image($_FILES['profile_image'], "profile_images") !== true){
							Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
							header("Location: ../accountlist.php");
							exit();
						} else {
							$image_name = $_FILES['profile_image']['name'];
							$sql = "INSERT INTO `accounts` (`profile_image`, `name`, `email`, `phone_number`,`password`, `status`, `role`) 
									VALUES ('$image_name', '$full_name', '$email', '$phone_number','$HashedPassword', '$status', '$role');";
						}
					}

					if ($Database->query($sql) === TRUE) {

						$id = $Database->insert_id;
						
						$sql = "INSERT INTO `addresses`(`account_id`, `full_address`, `city`) 
								VALUES ($id, '$full_address','$city');";
						$Database->query($sql);
						
						Notification::save_to_session('success', 'Account Created!');
					    header("Location: ../accountlist.php");
					    exit();
					} else {
						Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
					    header("Location: ../accountlist.php");
					    exit();
					}
				}
			}
		}
	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../accountlist.php");
		exit();
	}