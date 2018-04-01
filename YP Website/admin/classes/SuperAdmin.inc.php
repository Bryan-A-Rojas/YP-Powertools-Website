<?php 

class SuperAdmin extends Admin{

	private $SuperAdmin_id;

	function __construct($id){
		$this->SuperAdmin_id = $id;
	}

	//Get all users and admins
	function get_users_and_admins(){
		//Require database header
		require_once SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT accounts.account_id,profile_image,name,email, city, full_address, role
				FROM accounts 
				LEFT JOIN addresses
				ON accounts.account_id = addresses.account_id
				WHERE `role` = 'user' OR `role` = 'admin';";

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
		move_image($image_array, "products");
		$sql = "INSERT INTO `products`(`image`, `name`, `price`, `description`) 
				VALUES ('$image','$name','$description')";
		$result = $Database->query($sql);
		return $result;
	}

	//Edit pages

}