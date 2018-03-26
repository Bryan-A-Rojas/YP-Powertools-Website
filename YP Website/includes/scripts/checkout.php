<?php

require_once '../../config.php';

	if(isset($_POST['checkout'])){
		
		if(!isset($_SESSION['account_id'])){
			header("Location: ../../pages/checkout.php?checkout=not_logged_in");
			exit();
		}

		require_once CLASSES . 'Cart.inc.php';

		$cart = new Cart($_SESSION['account_id']);
		
		if($cart->checkout($_POST['txtpayment'])){
			header("Location: ../../pages/user_page.php?checkout=success");
			exit();
		} else {
			header("Location: ../../pages/checkout.php?checkout=not_enough_payment");
			exit();
		}
		
	} else {
		header("Location: ../../pages/checkout.php?checkout=used_get");
		exit();
	}