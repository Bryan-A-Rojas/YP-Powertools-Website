<?php

class Cart{

	private $user_id;

	function __construct($id){
		$this->user_id = $id;
	}

	function display_cart(){
		//Require database header
		require_once SCRIPTS . "dbh.inc.php";

		//Make variable called sql with query string "SELECT * from products WHERE id=$id_number"
		$sql = "SELECT cart.product_id,image, name, 
					   price, SUM(quantity) as quantity, description 
				FROM products
				INNER JOIN cart
				ON products.product_id = cart.product_id
				WHERE cart.account_id = $this->user_id
            	GROUP BY products.image, products.name, products.price, products.description;";

		//Query sql string
		$result = $Database->query($sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray[] = $row;
	   	}

	   	//Store query in string
		$sql = "SELECT SUM(products.price * cart.quantity) AS Total
				FROM products
				INNER JOIN cart
				ON products.product_id = cart.product_id
				WHERE cart.account_id = $this->user_id;";

		//Execute Query
		$result = $Database->query($sql);

		//Get total price
	    $resultsArray['Total Price'] = $result->fetch_assoc();

	    //Insert for logging
		$sql = "INSERT INTO `log` (`account_id`, `description`) 
				VALUES ($this->user_id, 'viewed their cart');";
		$result = $Database->query($sql);	

		//return array
		return $resultsArray;
	}

	function add_to_cart($product_id, $quantity){
		//include database header
		require_once SCRIPTS . "dbh.inc.php";

		$sql = "INSERT INTO `cart` (`account_id`, `product_id`, `quantity`) 
				VALUES ($this->user_id, $product_id, $quantity);";
		$result = $Database->query($sql);

		$sql = "SELECT name FROM products WHERE product_id = $product_id";
		$result = $Database->query($sql);
		$result = $result->fetch_assoc();
		$result = $result['name'];

		//Insert for logging
		$sql = "INSERT INTO `log` (`account_id`, `description`) 
				VALUES ($this->user_id, 'added $quantity pieces of $result to cart');";
		$result = $Database->query($sql);		

		return $result;
	}

	// function remove_from_cart($cart_id){
	// 	//include database header
	// 	require_once SCRIPTS . "dbh.inc.php";
		
	// 	$sql = "DELETE FROM cart 
	// 			WHERE `cart_id` = $cart_id;";
	// 	$result = $Database->query($sql);

	// 	//Insert for logging
	// 	$sql = "INSERT INTO `log` (`account_id`, `description`) 
	// 			VALUES ($this->user_id, 'removed $quantity $result to cart');";
	// 	$result = $Database->query($sql);	

	// 	return $result;
	// }

	function remove_item($product_id){
		//include database header
		require_once SCRIPTS . "dbh.inc.php";
		
		$sql = "DELETE FROM cart 
				WHERE `account_id` = $this->user_id AND `product_id` = $product_id;";
		$result = $Database->query($sql);

		$sql = "SELECT name FROM products WHERE product_id = $product_id";
		$result = $Database->query($sql);
		$result = $result->fetch_assoc();
		$result = $result['name'];

		//Insert for logging
		$sql = "INSERT INTO `log` (`account_id`, `description`) 
				VALUES ($this->user_id, 'removed $result from cart');";
		$result = $Database->query($sql);	

		return $result;
	}

	function clear_cart(){
		//include database header
		require_once SCRIPTS . "dbh.inc.php";

		$sql = "DELETE FROM `cart` 
				WHERE account_id = $this->user_id;";
		$result = $Database->query($sql);

		//Insert for logging
		$sql = "INSERT INTO `log` (`account_id`, `description`) 
				VALUES ($this->user_id, 'cleared their cart');";
		$result = $Database->query($sql);	

		return $result;
	}

	function display_checkout(){
		//Require database header
		require_once SCRIPTS . "dbh.inc.php";

		$sql = "SELECT cart.product_id, name, 
					   price, SUM(quantity) as quantity 
				FROM products
				INNER JOIN cart
				ON products.product_id = cart.product_id
				WHERE cart.account_id = $this->user_id
            	GROUP BY products.name, products.price;";

		//Query sql string
		$result = $Database->query($sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray[] = $row;
	   	}

	   	//Store query in string
		$sql = "SELECT SUM(products.price * cart.quantity) AS Total
				FROM products
				INNER JOIN cart
				ON products.product_id = cart.product_id
				WHERE cart.account_id = $this->user_id;";

		//Execute Query
		$result = $Database->query($sql);

		//Get total price
	    $resultsArray['Total Price'] = $result->fetch_assoc();

	    //Insert for logging
		$sql = "INSERT INTO `log` (`account_id`, `description`) 
				VALUES ($this->user_id, 'viewed checkout');";
		$result = $Database->query($sql);	

		//return array
		return $resultsArray;
	}

	function checkout($payment){
		//Require database header
		require_once SCRIPTS . "dbh.inc.php";

		//Get the total
		$sql = "SELECT SUM(products.price * cart.quantity) AS Total
				FROM products
				INNER JOIN cart
				ON products.product_id = cart.product_id
				WHERE cart.account_id = $this->user_id;";
		$result = $Database->query($sql);
	    $result = $result->fetch_assoc();
	    $total = $result['Total'];

	    //If what they gave is less than the require payment
		if($payment < $total){
			return false;
		}
	    
		//Finalize transaction by inserting it in the transactions table
		$sql = "INSERT INTO transactions (`account_id`,`total_price`,`payment_given`) 
				VALUES ($this->user_id, $total,$payment);";
		$Database->query($sql);

		//Get the transaction id
		$transaction_id = $Database->insert_id;

		//Retrieve the items being bought
		$sql = "SELECT cart.product_id as products_id, SUM(quantity) as quantity 
				FROM products
				INNER JOIN cart
				ON products.product_id = cart.product_id
				WHERE cart.account_id = $this->user_id
				GROUP BY cart.product_id;";
		$result = $Database->query($sql);
		$checkout_items = array();
	    while($row = $result->fetch_assoc()) {
	        $checkout_items[] = $row;
	   	}

	   	//Insert each item from cart into purchases
		foreach ($checkout_items as $key => $item){
			$products_id = $item['products_id'];
			$quantity = $item['quantity'];

			$sql = "INSERT INTO purchases (`transaction_id`, `product_id` , `quantity`) 
					VALUES ($transaction_id, $products_id, $quantity);";
			$Database->query($sql);
		}

		//Finally delete each item from the cart
		foreach($checkout_items as $key => $item){
			$products_id = $item['products_id'];
			$sql = "DELETE FROM cart 
					WHERE `account_id` = $this->user_id 
					AND `product_id` = $products_id;";
			$Database->query($sql);
		}

	    //Insert for logging
		$sql = "INSERT INTO `log` (`account_id`, `description`) 
				VALUES ($this->user_id, 'checked out');";
		$result = $Database->query($sql);	

		return true;
	}


}
