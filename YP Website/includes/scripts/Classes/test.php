<?php
	
	require 'Cart.inc.php';

	$cart = new Cart(1);

	$array = $cart->display_cart();

	echo "<pre>";
	print_r($array);
	echo "</pre>";
?>