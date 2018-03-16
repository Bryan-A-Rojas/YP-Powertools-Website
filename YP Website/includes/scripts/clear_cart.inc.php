<?php
	
	require_once '../../config.php';

	if(isset($_POST['clear_cart'])){
		require_once CLASSES . 'Cart.inc.php';

		$cart = new Cart($_SESSION['id']);
		
		if($cart->clear_cart()){
			header("Location: " . PAGES . "/cart.php?cart=cleared");
			exit();
		} else {
			header("Location: " . PAGES . "cart.php?cart=failed_clear");
			exit();
		}	

	} else {
		header("Location: " . PAGES . "cart.php?cart=used_get");
		exit();
	}