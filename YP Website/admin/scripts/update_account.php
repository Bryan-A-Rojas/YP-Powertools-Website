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


		if(empty($full_name) 		||
		   empty($email) 	 		|| 
		   empty($full_address) 	|| 
		   empty($city)){

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
						$sql = "UPDATE `accounts` 
								SET `name` = '$full_name',
								 	`email`= '$email',
								 	`status` = '$status'
								WHERE `account_id` = $account_id;";
					} else {
						//else move profile image to a folder
						if($error = move_image($_FILES['profile_image'], "profile_images") !== true){
							header("Location: ../accountlist.php?$error");
							exit();
						} else {
							$image_name = $_FILES['profile_image']['name'];
							$sql = "UPDATE `accounts` 
									SET `profile_image` = '$image_name',
										`name` = '$full_name',
									 	`email`= '$email',
									 	`status` = '$status'
									WHERE `account_id` = $account_id;";
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

						$row = $result->fetch_assoc();

						$_SESSION['account_id'] = $row['account_id'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['profile_image'] = $row['profile_image'];
						$_SESSION['status'] = $row['status'];

						$result = $Database->query("SELECT * 
													FROM addresses 
													WHERE account_id = $account_id;");
						$row = $result->fetch_assoc();

						$_SESSION['full_address'] = $row['full_address'];
						$_SESSION['city'] = $row['city'];
						
					    header("Location: ../accountlist.php?update=success");
					    exit();
					} else {

					    header("Location: ../accountlist.php?update=database_error");
					    exit();
					}
				}
			}
	} elseif(isset($_POST['Activate'])){

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

		$status = isset($_POST['status']) ? "active" : "inactive";
		$account_id = $_SESSION['account_id'];

		$sql = "UPDATE `accounts` 
				SET `status`= '$tatus'
				WHERE `account_id` = $account_id;";
		
		if($Database->query($sql)){
			header("Location: ../accountlist.php?products=restored");
			exit();
		} else {
			header("Location: ../accountlist.php?products=fail_to_restore");
			exit();
		}

	} elseif(isset($_POST['Deactivate'])) {

		//Check if password is correct
		require SCRIPTS . 'dbh.inc.php';

		$email = $_SESSION['email'];

		$sql = "SELECT password 
				FROM accounts 
				WHERE email = '$email';";
		$result = $Database->query($sql);
		$row = $result->fetch_assoc();

		if(!password_verify($_POST['txtpassword'], $row['password'])){
			header("Location: ../edit_products.php?products=wrong_password");
			exit();
		}

		//Proceed if correct
		require_once ADMIN_CLASSES . 'Products.inc.php';

		$Products = new Products($_SESSION['account_id']);
		
		if($Products->delete_product($_POST['product_id'])){
			header("Location: ../edit_products.php?products=removed");
			exit();
		} else {
			header("Location: ../edit_products.php?products=fail_to_remove");
			exit();
		}

	} else {
		header("Location: ../accountlist.php?update=used_get");
		exit();
	}