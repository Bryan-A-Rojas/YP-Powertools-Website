<?php 

class Admin{

	private $Admin_id;

	function __construct($id){
		$this->Admin_id = $id;
	}

	//Get all users
	function get_users(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT accounts.account_id,profile_image,name,email, city, full_address, status
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

	function get_specific_user($account_id){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT accounts.account_id,profile_image,name as account_name,email, city, full_address
				FROM accounts 
				LEFT JOIN addresses
				ON accounts.account_id = addresses.account_id
				WHERE `role` = 'user' AND accounts.account_id = $account_id;";

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
		require SCRIPTS . 'functions.inc.php';

		move_image($image_array, "products");
		$sql = "INSERT INTO `products`(`image`, `name`, `price`, `description`) 
				VALUES ('$image','$name','$description')";
		$result = $Database->query($sql);
		return $result;
	}

	function get_order_history(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT `transaction_id`, `name` AS `account_name`, `total_price`, 
						`payment_given`, (`payment_given` -`total_price`) AS `change_given` , 
						DATE_FORMAT(`date_of_purchase`, '%M %d ,%Y %r') as `date_of_purchase`, transactions.`status`
				FROM `transactions`
				inner join `accounts`
				on transactions.account_id = accounts.account_id
				WHERE transactions.`status` = 'approved' OR transactions.`status` = 'denied'
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

	function get_specific_order_history($account_id){
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

	function get_products_in_order_history($transaction_id){
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

	function get_pending_transactions(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT `transaction_id`, `name` AS `account_name`, `total_price`, `payment_given`, (`payment_given` -`total_price`) AS `change_given` , DATE_FORMAT(`date_of_purchase`, '%M %d ,%Y %r') as `date_of_purchase`
				FROM `transactions`
				inner join `accounts`
				on transactions.account_id = accounts.account_id
				WHERE transactions.`status` = 'pending'
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

	function get_specific_pending_transactions($account_id){
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

	function update_pending_transaction($transaction_id, $choice){
		require SCRIPTS . 'dbh.inc.php';

		$sql = "UPDATE `transactions` 
				SET `status`= '$choice'
				WHERE `transaction_id` = $transaction_id;";
		return $Database->query($sql);
	}

}