<?php

require_once '../../config.php';

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
			header("Location: ../../pages/user_page.php?change_password=confirm_password_not_the_same");
			exit();	
		}

		if(!password_verify($password, $row['password'])){
			header("Location: ../../pages/user_page.php?change_password=wrong_password");
			exit();	
		}

		$id = $_SESSION['account_id'];
		$hashpass = password_hash($new_password,PASSWORD_DEFAULT);;

		$sql = "UPDATE `accounts`
				SET `password` = '$hashpass'
				WHERE `account_id` = $id;";

		if($Database->query($sql)){
			header("Location: ../../pages/user_page.php?change_password=success");
			exit();
		} else {
			header("Location: ../../pages/user_page.php?change_password=database_fail");
			exit();
		}
		
	} else {
		header("Location: ../../pages/user_page.php?change_password=used_get");
		exit();
	}