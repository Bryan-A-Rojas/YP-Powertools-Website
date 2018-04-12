<?php
	
	require '../../config.php';
	require_once CLASSES . 'Notifications.php';

	if(isset($_POST['Remove'])){

		require_once CLASSES . 'Cart.inc.php';

		$cart = new Cart($_SESSION['account_id']);
		
		if($cart->remove_item($_POST['product_id'])){
			Notification::save_to_session('success', 'Item removed');
			header("Location: ../../pages/cart.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Oops! Please refresh the page or contact the admin');
			header("Location: ../../pages/cart.php?item=failed_to_remove");
			exit();
		}	

	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../../pages/cart.php?item=used_get");
		exit();
	}