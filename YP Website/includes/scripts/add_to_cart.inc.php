<?php

require_once '../../config.php';

	if(isset($_POST['add_to_cart'])){
		require_once CLASSES . 'Cart.inc.php';

		$cart = new Cart($_SESSION['id']);
		
		if($cart->add_to_cart($_POST['product_id'], $_POST['quantity'])){
			header("Location: ../../pages/cart.php?cart=added");
			exit();
		} else {
			header("Location: ../../pages/cart.php?cart=fail_add");
			exit();
		}	
	} else {
		header("Location: ../../pages/cart.php?cart=used_get");
		exit();
	}