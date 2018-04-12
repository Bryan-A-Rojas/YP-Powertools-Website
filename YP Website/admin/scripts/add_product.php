<?php
	require_once '../config_admin.php';
	require_once CLASSES . 'Notifications.php';
	require_once SCRIPTS . 'functions.inc.php';

	if(isset($_POST['submit'])){
		//connect to database
		require_once SCRIPTS . 'dbh.inc.php';

		$account_id = $_SESSION['account_id'];
		require ADMIN_CLASSES . 'Admin.inc.php';
		$Admin = New Admin($account_id);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../edit_products.php");
			exit();
		}

		$product_image = $_FILES['product_image'];

		$txtname = $Database->real_escape_string($_POST['txtname']);
		$price  = $Database->real_escape_string($_POST['txtprice']);
		$description  = $Database->real_escape_string($_POST['txtdescription']);
		$stock  = $Database->real_escape_string($_POST['stock']);
		$availability = isset($_POST['availability']) ? 'available' : 'unavailable' ; 

		if($error = move_image($product_image, "products") !== true){
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../edit_products.php");
			exit();
		} else {
			$image_name = $_FILES['product_image']['name'];

			$sql = "INSERT INTO `products` (`image`, `name`, `price`, `description`, `stock`, `availability`)
					VALUES ('$image_name', '$txtname', $price, '$description', $stock, '$availability');";

			if ($Database->query($sql) === TRUE) {
				Notification::save_to_session('success', 'Added the product!');
				header("Location: ../edit_products.php");
				exit();
			} else {
				Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
				header("Location: ../edit_products.php");
				exit();
			}
		}
	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../edit_products.php");
		exit();
	}