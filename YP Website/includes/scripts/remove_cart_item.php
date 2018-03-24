<?php
	
	require '../../config.php';

	if(isset($_POST['Remove'])){

		require_once CLASSES . 'Cart.inc.php';

		$cart = new Cart($_SESSION['account_id']);
		
		if($cart->remove_item($_POST['product_id'])){
			header("Location: ../../pages/cart.php?item=removed");
			exit();
		} else {
			header("Location: ../../pages/cart.php?item=failed_to_remove");
			exit();
		}	

	} else {
		header("Location: ../../pages/cart.php?item=used_get");
		exit();
	}