<?php

require_once '../config_admin.php';

	if(isset($_POST['Edit'])){

		require_once SCRIPTS . 'functions.inc.php';

		require_once SCRIPTS . 'dbh.inc.php';

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
			header("Location: ../edit_products.php?add_product=success");
			exit();
		} else {
			$error = $Database->error;
			echo $error;
			header("Location: ../edit_products.php?add_product=$error");
			exit();
		}

	} elseif(isset($_POST['Remove'])) {

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
		header("Location: ../edit_products.php?products=used_get");
		exit();
	}