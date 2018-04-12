<?php
	
	require '../../config.php';
	require_once CLASSES . 'Notifications.php';

	if(isset($_POST['clear_cart'])){

		require_once CLASSES . 'Cart.inc.php';

		$cart = new Cart($_SESSION['account_id']);
		
		if($cart->clear_cart()){
			Notification::save_to_session('success', 'Cart cleared!');
			header("Location: ../../pages/cart.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../../pages/cart.php?cart=failed_clear");
			exit();
		}	

	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../../pages/cart.php");
		exit();
	}