<?php
	session_start();

	require_once 'functions.inc.php';

	//Check if they used the button
	if(isset($_POST['submit'])){
		//connect to database
		require_once 'dbh.inc.php';

		$product_image = $_FILES['product_image'];

		$txtname = $Database->real_escape_string($_POST['txtname']);
		$price  = $Database->real_escape_string($_POST['txtprice']);
		$description  = $Database->real_escape_string($_POST['txtdescription']);

		if($error = move_image($product_image, "products") !== true){
			header("Location: ../../pages/edit_products.php?$error");
			exit();
		} else {
			$image_name = $_FILES['product_image']['name'];

			$sql = "INSERT INTO `products` (`product_image`, `product_name`, `product_price`, `product_description`) VALUES ('$image_name', '$txtname', $price, '$description')";

			if ($Database->query($sql) === TRUE) {
				header("Location: ../../pages/edit_products.php?add_product=success");
				exit();
			} else {
				header("Location: ../../pages/edit_products.php?add_product=failed_database");
				exit();
			}
		}
	} else {
		//User did not click the button
		header("Location: ../../pages/edit_products.php?add_product=used_get");
		exit();
	}