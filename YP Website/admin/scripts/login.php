<?php
	
require_once '../../config.php';

	if(isset($_POST['submit'])){
		//Require Database connection
		require_once SCRIPTS . 'dbh.inc.php';

		//Get all post data
		$email = $_POST['txtemail'];
		$password = $_POST['txtpassword'];

		if(empty($email) || empty($password)){
			header("Location: ../loginform_admin.php?login=empty");
			exit();
		} else {
			//SQL insert statement
			$sql = "SELECT * 
					FROM accounts 
					WHERE email = '$email' AND (role = 'admin' OR role = 'superadmin');";
			$result = $Database->query($sql);
			
			if($result->num_rows < 1){
				header("Location: ../loginform_admin.php?login=error");
				exit();
			} else {
				if($row = $result->fetch_assoc()){

					if(!password_verify($password, $row['password'])){
						header("Location: ../loginform_admin.php?login=error");
						exit();
					}else{

						$_SESSION['account_id'] = $row['account_id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['profile_image'] = $row['profile_image'];

						switch ($_SESSION['role']){
							case "admin":
								header("Location: ../admin_page.php");
								exit();
								break;
							case "superadmin":
								header("Location: ../superadmin_page.php");
								exit();
								break;
							default:
								header("Location: ../admin_page.php");
								exit();
								break;
						}
					}
				}
			}
		}
	} else {
		//User did not click the button
		header("Location: ../loginform_admin.php?login=used_get");
		exit();
	}

	//Check if method used is POST
		//get POST data: username and password
		//Query database if it exists
			//if account exists
				//Start session
				//store user id in session
				//login and redirect the user to user page
			//Else if account does not exists
				//Redirect to login page with error message "Your username/password is incorrect"
	//Else redirect with error message "Please login"
?>