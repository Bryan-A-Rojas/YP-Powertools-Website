<?php

require_once '../../config.php';
require_once CLASSES . 'Notifications.php';

	if(isset($_POST['add_to_cart'])){
		
		if(!isset($_SESSION['account_id'])){
			Notification::save_to_session('danger', 'Please login first!');
			header("Location: ../../pages/products.php");
			exit();
		}

		require_once CLASSES . 'Cart.inc.php';

		$cart = new Cart($_SESSION['account_id']);
		
		if($cart->add_to_cart($_POST['product_id'], $_POST['quantity'])){
			Notification::save_to_session('success', 'Added to cart!');
			header("Location: ../../pages/cart.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../../pages/cart.php");
			exit();
		}
		
	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../../pages/cart.php");
		exit();
	}