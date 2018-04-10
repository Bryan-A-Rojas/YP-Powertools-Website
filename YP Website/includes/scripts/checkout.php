<?php

require_once '../../config.php';
require_once CLASSES . 'Notifications.php';

	if(isset($_POST['checkout'])){
		
		if(!isset($_SESSION['account_id'])){
			Notification::save_to_session('danger', 'Please log in first!');
			header("Location: ../../pages/index.php");
			exit();
		}

		require_once CLASSES . 'Cart.inc.php';

		$cart = new Cart($_SESSION['account_id']);
		
		if($cart->checkout($_POST['txtpayment'])){
			Notification::save_to_session('success', 'Thank you for doing business with YP Powertools!');
			header("Location: ../../pages/user_page.php");
			exit();
		} else {
			Notification::save_to_session('danger', 'Insufficient Funds');
			header("Location: ../../pages/checkout.php");
			exit();
		}
		
	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../../pages/checkout.php");
		exit();
	}