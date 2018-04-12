<?php

require_once '../config_admin.php';
require_once CLASSES . 'Notifications.php';

	if(isset($_POST['Edit'])){

		require_once SCRIPTS . 'functions.inc.php';

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

		$product_id = $Database->real_escape_string($_POST['product_id']);
		$txtname = $Database->real_escape_string($_POST['txtname']);
		$price  = $Database->real_escape_string($_POST['txtprice']);
		$description  = $Database->real_escape_string($_POST['txtdescription']);
		$stock  = $Database->real_escape_string($_POST['stock']);
		$availability = isset($_POST['availability']) ? 'available' : 'unavailable';
		$image_name = $_FILES['product_image']['name'];

		$sql = "";
		//if profile image is not uploaded then use different insert
		if(!file_exists($_FILES['product_image']['tmp_name']) || !is_uploaded_file($_FILES['product_image']['tmp_name'])) {
			$sql = "UPDATE `products` 
					SET `name` = '$txtname', 
						`price` = $price, 
						`description` = '$description', 
						`stock` = $stock, 
						`availability` = '$availability'
					WHERE product_id = $product_id";
		} else {
			move_image($product_image, "products");
			$sql = "UPDATE `products` 
					SET `image` = '$image_name',
						`name` = '$txtname', 
						`price` = $price, 
						`description` = '$description', 
						`stock` = $stock, 
						`availability` = '$availability'
					WHERE product_id = $product_id";
		}
		
		if ($Database->query($sql) === TRUE) {
			Notification::save_to_session('success', 'Product Updated!');
			header("Location: ../edit_products.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../edit_products.php");
			exit();
		}

	} elseif(isset($_POST['Restore'])){

		//Check if password is correct
		require SCRIPTS . 'dbh.inc.php';

		$account_id = $_SESSION['account_id'];
		require ADMIN_CLASSES . 'Admin.inc.php';
		$Admin = New Admin($account_id);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../edit_products.php");
			exit();
		}

		//Proceed if correct
		require_once ADMIN_CLASSES . 'Products.inc.php';

		$Products = new Products($_SESSION['account_id']);
		
		if($Products->restore_product($_POST['product_id'])){
			Notification::save_to_session('success', 'Product Restored!');
			header("Location: ../edit_products.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../edit_products.php");
			exit();
		}

	} elseif(isset($_POST['Remove'])) {

		//Check if password is correct
		require SCRIPTS . 'dbh.inc.php';

		$account_id = $_SESSION['account_id'];
		require ADMIN_CLASSES . 'Admin.inc.php';
		$Admin = New Admin($account_id);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../edit_products.php");
			exit();
		}

		//Proceed if correct
		require_once ADMIN_CLASSES . 'Products.inc.php';

		$Products = new Products($_SESSION['account_id']);
		
		if($Products->delete_product($_POST['product_id'])){
			Notification::save_to_session('success', 'Product Removed!');
			header("Location: ../edit_products.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../edit_products.php");
			exit();
		}

	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../edit_products.php");
		exit();
	}