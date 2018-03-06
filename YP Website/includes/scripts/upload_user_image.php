<?php
session_start();

	if(isset($_POST['upload'])){
		require_once 'functions.inc.php';
		require_once 'dbh.inc.php';

		if($error = move_image($_FILES['profile_image'], "profile_images") !== true){
				header("Location: ../../pages/user_page.php?$error");
				exit();
		} else {
				$image_name = $_FILES['profile_image']['name'];

				$id = $_SESSION['id'];
				$sql = "UPDATE `users` SET `profile_image` = '$image_name' WHERE `id` = $id;";

				if ($Database->query($sql) === TRUE) {
					$_SESSION['profile_image'] = $image_name; 
					header("Location: ../../pages/user_page.php?upload=success");
					exit();
				} else {
					header("Location: ../../pages/user_page.php?upload=database_error");
					exit();
				}
		}

	} else {
		header("Location: ../../pages/user_page.php?used_get");
		exit();
	}