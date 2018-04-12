<?php
	
	require '../../config.php';
	require_once CLASSES . 'Notifications.php';
	require_once SCRIPTS . 'functions.inc.php';

	//Check if they used the button
	if(isset($_POST['submit'])){
		//connect to database
		require_once SCRIPTS . 'dbh.inc.php';

		//Get all post data and sanitize input
		//profile_image,full_name, email, password, confirm password
		$profile_image = $_FILES['profile_image'];
		$full_name = $Database->real_escape_string($_POST['txtfullname']);
		$email = $Database->real_escape_string($_POST['txtemail']);
		$phone_number = $Database->real_escape_string($_POST['txtno']);
		$password = $Database->real_escape_string($_POST['txtpassword']);
		$confirm_password = $Database->real_escape_string($_POST['txtconfirmpassword']);
		$full_address = $Database->real_escape_string($_POST['txtfulladdress']);
		$city = $Database->real_escape_string($_POST['txtcity']);

		if(empty($full_name) 		||
		   empty($email) 	 		||  
		   empty($password)  		|| 
		   empty($confirm_password) || 
		   empty($full_address) 	|| 
		   empty($city)){

			Notification::save_to_session('danger', 'Please fill up all fields!');
			header("Location: ../../pages/signupform.php");
			exit();
		} else {
			if($password != $confirm_password){
				Notification::save_to_session('danger', 'Password and confirm password is not the same!');
				header("Location: ../../pages/signupform.php");
				exit();
			} else {
				//Check if they are in the right format
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				    Notification::save_to_session('danger', 'Email is in the wrong format!');
				    header("Location: ../../pages/signupform.php");
					exit();
				} else {
					//Hash password
					$HashedPassword = password_hash($password,PASSWORD_DEFAULT);
					
					//SQL string to insert in database
					$sql = "";
					//if profile image is not uploaded then use different insert
					if(!file_exists($_FILES['profile_image']['tmp_name']) || !is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
						$sql = "INSERT INTO `accounts` (`name`, `email`, `phone_number`, `password`) 
								VALUES ('$full_name', '$email', '$phone_number', '$HashedPassword')";
					} else {
						//else move profile image to a folder
						if($error = move_image($_FILES['profile_image'], "profile_images") !== true){
							Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
							header("Location: ../../pages/signupform.php");
							exit();
						} else {
							$image_name = $_FILES['profile_image']['name'];
							$sql = "INSERT INTO `accounts` (`profile_image`, `name`, `email`, `phone_number`, `password`) 
									VALUES ('$image_name', '$full_name', '$email', '$phone_number', '$HashedPassword')";
						}
					}

					if ($Database->query($sql) === TRUE) {
						//Get last inserted id
						$id = $Database->insert_id;
						
						$sql = "INSERT INTO `addresses`(`account_id`, `full_address`, `city`) 
								VALUES ($id, '$full_address','$city');";
						$Database->query($sql);

						$result = $Database->query("SELECT *
										  			FROM accounts
										  			WHERE account_id = $id");

						$row = $result->fetch_assoc();

						$_SESSION['id'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['phone_number'] = $row['phone_number'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['profile_image'] = $row['profile_image'];

						$result = $Database->query("SELECT * 
													FROM addresses 
													WHERE account_id = $id;");
						$row = $result->fetch_assoc();

						$_SESSION['full_address'] = $row['full_address'];
						$_SESSION['city'] = $row['city'];
						
						Notification::save_to_session('success', 'Welcome!');
					    header("Location: ../../pages/signupform.php");
					    exit();
					} else {
						Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
					    header("Location: ../../pages/signupform.php");
					    exit();
					}
				}
			}
		}
	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../../pages/signupform.php");
		exit();
	}