<?php
session_start();

	if(isset($_POST['clear_cart'])){
		require_once 'scripts/classes/Cart.inc.php';

		$cart = new Cart($_SESSION['id']);
		
		if($cart->clear_cart()){
			header("Location: ../pages/cart.php?cart=cleared");
			exit();
		} else {
			header("Location: ../pages/cart.php?cart=failed_clear");
			exit();
		}	

	} else {
		header("Location: ../pages/cart.php?cart=used_get");
		exit();
	}