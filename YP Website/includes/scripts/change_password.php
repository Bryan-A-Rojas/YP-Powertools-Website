<?php

require_once '../../config.php';
require_once CLASSES . 'Notifications.php';

	if(isset($_POST['change_password'])){
		
		//Check if password is correct
		require SCRIPTS . 'dbh.inc.php';

		$id = $_SESSION['account_id'];
		$password = $Database->real_escape_string($_POST['txtpassword']);
		$new_password = $Database->real_escape_string($_POST['txtnewpassword']);
		$confirm_new_password = $Database->real_escape_string($_POST['txtconfirmnewpassword']);

		$sql = "SELECT password 
				FROM accounts 
				WHERE `account_id` = $id;";
		$result = $Database->query($sql);
		$row = $result->fetch_assoc();

		if($new_password != $confirm_new_password){
			Notification::save_to_session('danger', 'Password and confirm password is not the same!');
			header("Location: ../../pages/user_page.php");
			exit();	
		}

		if(!password_verify($password, $row['password'])){
			Notification::save_to_session('danger', 'Password is invalid!');
			header("Location: ../../pages/user_page.php");
			exit();	
		}

		$id = $_SESSION['account_id'];
		$hashpass = password_hash($new_password,PASSWORD_DEFAULT);;

		$sql = "UPDATE `accounts`
				SET `password` = '$hashpass'
				WHERE `account_id` = $id;";

		if($Database->query($sql)){
			Notification::save_to_session('success', 'Password changed!');
			header("Location: ../../pages/user_page.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../../pages/user_page.php?change_password=database_fail");
			exit();
		}
		
	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../../pages/user_page.php?change_password=used_get");
		exit();
	}