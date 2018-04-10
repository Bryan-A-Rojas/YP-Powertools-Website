<?php

require_once '../../config.php';

	if(isset($_POST['update'])){

		require_once SCRIPTS . 'functions.inc.php';

		require_once SCRIPTS . 'dbh.inc.php';

		//Get all post data and sanitize input
		//profile_image,full_name, email, password, confirm password
		$profile_image = $_FILES['profile_image'];
		$full_name = $Database->real_escape_string($_POST['txtfullname']);
		$email = $Database->real_escape_string($_POST['txtemail']);
		$full_address = $Database->real_escape_string($_POST['txtfulladdress']);
		$city = $Database->real_escape_string($_POST['txtcity']);
		$account_id = $Database->real_escape_string($_POST['account_id']);

		if(empty($full_name) || empty($email)){
			//Fields are empty
			header("Location: ../accountlist.php?update=empty");
			exit();
		} else {
				//Check if they are in the right format
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				    //Invalid email format
				    header("Location: ../accountlist.php?update=invalid_email");
					exit();
				} else {
					
					$status = isset($_POST['status']) ? "active" : "inactive";
					

					//SQL string to insert in database
					$sql = "";
					//if profile image is not uploaded then use different insert
					if(!file_exists($_FILES['profile_image']['tmp_name']) || !is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
						
						if($_SESSION['role'] == 'superadmin'){
							$role = $_POST['role'];
							$sql = "UPDATE `accounts` 
								SET `name` = '$full_name',
								 	`email`= '$email',
								 	`role` = '$role',
								 	`status` = '$status'
								WHERE `account_id` = $account_id;";
						} else {
							$sql = "UPDATE `accounts` 
								SET `name` = '$full_name',
								 	`email`= '$email',
								 	`status` = '$status'
								WHERE `account_id` = $account_id;";
						}

						
					} else {
						//else move profile image to a folder
						if($error = move_image($_FILES['profile_image'], "profile_images") !== true){
							header("Location: ../accountlist.php?$error");
							exit();
						} else {
							$image_name = $_FILES['profile_image']['name'];

							if($_SESSION['role'] == 'superadmin'){
								$role = $_POST['role'];
								$sql = "UPDATE `accounts` 
										SET `profile_image` = '$image_name',
											`name` = '$full_name',
										 	`email`= '$email',
										 	`role` = '$role',
										 	`status` = '$status'
										WHERE `account_id` = $account_id;";
							} else {
								$sql = "UPDATE `accounts` 
									SET `profile_image` = '$image_name',
										`name` = '$full_name',
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

					    header("Location: ../accountlist.php?update=success");
					    exit();
					} else {

					    header("Location: ../accountlist.php?update=database_error");
					    exit();
					}
				}
			}
	} elseif(isset($_POST['reactivate'])){

		//Check if password is correct
		require SCRIPTS . 'dbh.inc.php';

		// $email = $_SESSION['email'];

		// $sql = "SELECT password 
		// 		FROM accounts 
		// 		WHERE email = '$email';";
		// $result = $Database->query($sql);
		// $row = $result->fetch_assoc();

		// if(!password_verify($_POST['txtpassword'], $row['password'])){
		// 	header("Location: ../edit_products.php?products=wrong_password");
		// 	exit();
		// }

		$account_id = $_POST['account_id'];

		$sql = "UPDATE `accounts` 
				SET `status`= 'active'
				WHERE `account_id` = $account_id;";
		
		if($Database->query($sql)){
			header("Location: ../accountlist.php?account=restored");
			exit();
		} else {
			header("Location: ../accountlist.php?account=fail_to_restore");
			exit();
		}

	} elseif(isset($_POST['deactivate'])) {

		//Check if password is correct
		require SCRIPTS . 'dbh.inc.php';

		// $email = $_SESSION['email'];

		// $sql = "SELECT password 
		// 		FROM accounts 
		// 		WHERE email = '$email';";
		// $result = $Database->query($sql);
		// $row = $result->fetch_assoc();

		// if(!password_verify($_POST['txtpassword'], $row['password'])){
		// 	header("Location: ../edit_products.php?products=wrong_password");
		// 	exit();
		// }

		$account_id = $_POST['account_id'];

		$sql = "UPDATE `accounts` 
				SET `status`= 'inactive'
				WHERE `account_id` = $account_id;";
		
		if($Database->query($sql)){
			header("Location: ../accountlist.php?account=restored");
			exit();
		} else {
			header("Location: ../accountlist.php?account=fail_to_restore");
			exit();
		}

	} elseif(isset($_POST['create'])) {

		//connect to database
		require SCRIPTS . 'dbh.inc.php';

		require SCRIPTS . 'functions.inc.php';

		//Get all post data and sanitize input
		//profile_image,full_name, email, password, confirm password
		$profile_image = $_FILES['profile_image'];
		$full_name = $Database->real_escape_string($_POST['txtfullname']);
		$email = $Database->real_escape_string($_POST['txtemail']);
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

			//Fields are empty
			header("Location: ../accountlist.php?signup=empty");
			exit();
		} else {
			//Check if password and confirm password is NOT the same
			if($password != $confirm_password){
				header("Location: ../accountlist.php?signup=password_not_same");
				exit();
			} else {
				//Check if they are in the right format
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				    //Invalid email format
				    header("Location: ../accountlist.php?signup=invalid_email");
					exit();
				} else {
					//Hash password
					$HashedPassword = password_hash($password,PASSWORD_DEFAULT);
					
					//SQL string to insert in database
					$sql = "";
					//if profile image is not uploaded then use different insert
					if(!file_exists($_FILES['profile_image']['tmp_name']) || !is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
						$sql = "INSERT INTO `accounts` (`name`, `email`, `password`, `status`, `role`) 
								VALUES ('$full_name', '$email', '$HashedPassword', '$status', '$role');";
					} else {
						//else move profile image to a folder
						if($error = move_image($_FILES['profile_image'], "profile_images") !== true){
							header("Location: ../accountlist.php?$error");
							exit();
						} else {
							$image_name = $_FILES['profile_image']['name'];
							$sql = "INSERT INTO `accounts` (`profile_image`, `name`, `email`, `password`, `status`, `role`) 
									VALUES ('$image_name', '$full_name', '$email', '$HashedPassword', '$status', '$role');";
						}
					}

					if ($Database->query($sql) === TRUE) {

						$id = $Database->insert_id;
						
						$sql = "INSERT INTO `addresses`(`account_id`, `full_address`, `city`) 
								VALUES ($id, '$full_address','$city');";
						$Database->query($sql);
						
					    header("Location: ../accountlist.php?signup=success");
					    exit();
					} else {
					    header("Location: ../accountlist.php?signup=database_error");
					    exit();
					}
				}
			}
		}
	} else {
		header("Location: ../accountlist.php?update=used_get");
		exit();
	}