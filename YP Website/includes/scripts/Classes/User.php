<?php

require_once CLASSES . 'Person.php';

class User extends Person{

	function __construct($email){
		$this->email = $email;
		$this->getInfo();
	}

	private function getInfo(){
		//Require Database connection
		require SCRIPTS . 'dbh.inc.php';
		
		//SQL statement
		$sql = "SELECT * 
				FROM accounts 
				WHERE email = '$this->email';";

		$result = $Database->query($sql);

		//Get results
		$row = $result->fetch_assoc();

		$this->id = $row['account_id'];
		$this->profile_image = $row['profile_image'];
		$this->name = $row['name'];
		$this->email = $row['email'];
	}

	static function login($email = "", $password = ""){
		//Require Database connection
		require SCRIPTS . 'dbh.inc.php';
		
		//SQL statement
		$sql = "SELECT password 
				FROM accounts 
				WHERE email = '$email';";

		//Run query
		$result = $Database->query($sql);
		
		//If email does NOT exist return error message
		if($result->num_rows < 1){
			return "Invalid email or password";
		}

		//Get results
		$row = $result->fetch_assoc();

		//If password is NOT the same return error message
		if(!password_verify($password, $row['password'])){
			return "Invalid email or password";
		}

		return true;
	}

	static function get_specific_pending_transactions($account_id){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT `transaction_id`, `name` AS `account_name`, `total_price`, `payment_given`, 
				(`payment_given` -`total_price`) AS `change_given` , DATE_FORMAT(`date_of_purchase`, '%M %d ,%Y %r') as `date_of_purchase`
				FROM `transactions`
				inner join `accounts`
				on transactions.account_id = accounts.account_id
				WHERE transactions.`status` = 'pending' AND transactions.account_id = $account_id
				ORDER BY `date_of_purchase` ASC;";

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

	static function get_products_in_order_history($transaction_id){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT image, name, price, SUM(quantity) as quantity, description, (SUM(quantity) * price) as total
				FROM purchases
				INNER JOIN products
				ON products.product_id = purchases.product_id
				WHERE purchases.transaction_id = $transaction_id
				GROUP BY products.image, products.name, products.price, products.description;";

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

	static function get_specific_order_history($account_id){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT `transaction_id`, `name` AS `account_name`, 
						`total_price`, `payment_given`, (`payment_given` -`total_price`) AS `change_given` ,
						 DATE_FORMAT(`date_of_purchase`, '%M %d ,%Y %r') as `date_of_purchase`, transactions.`status`
				FROM `transactions`
				inner join `accounts`
				on transactions.account_id = accounts.account_id
				WHERE (transactions.`status` = 'approved' OR transactions.`status` = 'denied') AND transactions.`account_id` = $account_id
				ORDER BY `date_of_purchase` ASC;";

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
	
}