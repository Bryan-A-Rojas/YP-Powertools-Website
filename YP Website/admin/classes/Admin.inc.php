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

		$sql = "SELECT account_id,profile_image,name,email 
				FROM accounts 
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


	//Edit pages

}