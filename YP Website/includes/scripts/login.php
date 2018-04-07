<?php
	
require_once '../../config.php';

	if(isset($_POST['submit'])){
		//Require Database connection
		require_once 'dbh.inc.php';

		//Get all post data
		$email = $_POST['txtemail'];
		$password = $_POST['txtpassword'];

		if(empty($email) || empty($password)){
			header("Location: ../../pages/user_page.php?login=empty");
			exit();
		} else {
			//SQL insert statement
			$sql = "SELECT * 
					FROM accounts 
					WHERE email = '$email' AND role = 'user';";
			$result = $Database->query($sql);
			
			if($result->num_rows < 1){
				header("Location: ../../pages/user_page.php?login=error");
				exit();
			} else {
				if($row = $result->fetch_assoc()){

					if(!password_verify($password, $row['password'])){
						header("Location: ../../pages/user_page.php?login=error");
						exit();
					}else{

						$_SESSION['account_id'] = $row['account_id'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['profile_image'] = $row['profile_image'];

						$id = $_SESSION['account_id'];

						$result = $Database->query("SELECT * 
													FROM addresses 
													WHERE account_id = $id;");
						$row = $result->fetch_assoc();

						$_SESSION['full_address'] = $row['full_address'];
						$_SESSION['city'] = $row['city'];

						header("Location: ../../pages/user_page.php");
						exit();
					}
				}
			}
		}
	} else {
		//User did not click the button
		header("Location: ../../pages/user_page.php?login=used_get");
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