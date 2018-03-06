<?php
	session_start();

	require_once 'functions.inc.php';

	//Check if they used the button
	if(isset($_POST['submit'])){
		//connect to database
		require_once 'dbh.inc.php';

		//Get all post data and sanitize input
		//profile_image,full_name, email, password, confirm password
		$profile_image = $_FILES['profile_image'];
		$full_name = $Database->real_escape_string($_POST['txtfullname']);
		$email = $Database->real_escape_string($_POST['txtemail']);
		$password = $Database->real_escape_string($_POST['txtpassword']);
		$confirm_password = $Database->real_escape_string($_POST['txtconfirmpassword']);

		if(empty($full_name) || empty($email) || empty($password) || empty($confirm_password)){
			//Fields are empty
			header("Location: ../../pages/signupform.php?signup=empty");
			exit();
		} else {
			//Check if password and confirm password is NOT the same
			if($password != $confirm_password){
				header("Location: ../../pages/signupform.php?signup=password_not_same");
				exit();
			} else {
				//Check if they are in the right format
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				    //Invalid email format
				    header("Location: ../../pages/signupform.php?signup=invalid_email");
					exit();
				} else {
					//Hash password
					$HashedPassword = password_hash($password,PASSWORD_DEFAULT);
					
					//SQL string to insert in database
					$sql = "";
					//if profile image is not uploaded then use different insert
					if(!file_exists($_FILES['profile_image']['tmp_name']) || !is_uploaded_file($_FILES['profile_image']['tmp_name'])) {
						$sql = "INSERT INTO `users` (`full_name`, `email`, `password`) VALUES ('$full_name', '$email', '$HashedPassword')";
					} else {
						//else move profile image to a folder
						if($error = move_image($_FILES['profile_image']) !== true){
							header("Location: ../../pages/signupform.php?$error");
							exit();
						} else {
							$image_name = $_FILES['profile_image']['name'];
							$sql = "INSERT INTO `users` (`profile_image`, `full_name`, `email`, `password`) VALUES ('$image_name', '$full_name', '$email', '$HashedPassword')";
						}
					}

					if ($Database->query($sql) === TRUE) {
						//Get last inserted id
						$id = $Database->insert_id;
						
						//Store ID in session
						$_SESSION['id'] = $id;
						
					    header("Location: ../../pages/signupform.php?signup=success");
					    exit();
					} else {

					    header("Location: ../../pages/signupform.php?signup=database_error");
					    exit();
					}
				}
			}
		}
	} else {
		//User did not click the button
		header("Location: ../../pages/signupform.php?signup=used_get");
		exit();
	}