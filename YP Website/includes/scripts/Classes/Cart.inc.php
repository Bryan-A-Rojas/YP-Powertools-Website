<?php

class Cart{

	private $user_id;

	function __construct($id){
		$this->user_id = $id;
	}

	function display_cart(){
		//Require database header
		include SCRIPTS . "dbh.inc.php";

		//Make variable called sql with query string "SELECT * from products WHERE id=$id_number"
		$sql = "SELECT product_image, product_name, 
					   product_price, SUM(quantity) as quantity, product_description 
				FROM products
				INNER JOIN cart
				ON products.product_id = cart.product_id
				WHERE cart.user_id = $this->user_id
            	GROUP BY product_image, product_name, product_price, product_description;";

		//Query sql string
		$result = $Database->query($sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray[] = $row;
	   	}

	   	//Store query in string
		$sql = "SELECT SUM(product_price * quantity)
				FROM products
				INNER JOIN cart
				ON products.product_id = cart.product_id
				WHERE cart.user_id = $this->user_id;";

		//Execute Query
		$result = $Database->query($sql);

		//Get total price
	    $resultsArray['Total Price'] = $result->fetch_assoc();

		//return array
		return $resultsArray;
	}

	function add_to_cart($product_id, $quantity){
		//include database header
		include SCRIPTS . "dbh.inc.php";

		$sql = "INSERT INTO `cart` (`user_id`, `product_id`, `quantity`) 
				VALUES ($this->user_id, $product_id, $quantity);";
		$result = $Database->query($sql);
		return $result;
	}

	function remove_from_cart($cart_id){
		//include database header
		include SCRIPTS . "dbh.inc.php";
		
		$sql = "DELETE FROM cart 
				WHERE `cart_id` = $cart_id;";
		$result = $Database->query($sql);
		return $result;
	}

	function clear_cart(){
		//include database header
		include SCRIPTS . "dbh.inc.php";

		$sql = "DELETE FROM `cart` 
				WHERE user_id = $this->user_id;";
		$result = $Database->query($sql);
		return $result;
	}

}
