<?php

//Require database header
require_once 'dbh.inc.php';

class Cart{

	$user_id = 0;

	function __construct($id){
		$this->user_id = $id;
	}

	function display_cart(){
		//Make variable called sql with query string "SELECT * from products WHERE id=$id_number"
		$sql = "SELECT * FROM cart WHERE user_id = $user_id";
		//Query sql string
		$result = $Database->query($sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray[] = $row;
	   	}

		//return array
		return $resultsArray;
	}

	function add_to_cart($product_id, $quantity){
		$sql = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`) VALUES (`$user_id`, `$product_id`, `$quantity`)";
		$result = $Database->query($sql);
		return $result;
	}

	function remove_from_cart($cart_id){
		$sql = "DELETE FROM `cart` WHERE `cart_id` = `$cart_id`";
		$result = $Database->query($sql);
		return $result;
	}
}
