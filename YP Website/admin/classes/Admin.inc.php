<?php 

class Admin{

	private $Admin_id;

	function __construct($id){
		$this->Admin_id = $id;
	}

	//Get all users
	function get_users(){
		//Require database header
		require_once SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT accounts.account_id,profile_image,name,email, city, full_address
				FROM accounts 
				LEFT JOIN addresses
				ON accounts.account_id = addresses.account_id
				WHERE `role` = 'user';";

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

	function add_product($image_array, $name, $price, $description){
		require_once SCRIPTS . 'functions.inc.php';

		move_image($image_array, "products");
		$sql = "INSERT INTO `products`(`image`, `name`, `price`, `description`) 
				VALUES ('$image','$name','$description')";
		$result = $Database->query($sql);
		return $result;
	}

	function get_order_history(){
		//Require database header
		require_once SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT `transaction_id`, `name` AS `account_name`, `total_price`, `payment_given`, 
				(`payment_given` -`total_price`) AS `change_given` , DATE_FORMAT(`date_of_purchase`, '%M %d ,%Y %r') as `date_of_purchase`
				FROM `transactions`
				inner join `accounts`
				on transactions.account_id = accounts.account_id
				WHERE `status` = 'approved';";

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

	function get_products_in_order_history($transaction_id){
		
	}

}