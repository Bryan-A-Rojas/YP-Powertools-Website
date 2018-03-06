<?php 

class SuperAdmin{

	private $SuperAdmin_id;

	function __construct($id){
		$this->SuperAdmin_id = $id;
	}

	//Get all users and admins
	function get_users_and_admins(){
		//Require database header
		require_once '../includes/scripts/dbh.inc.php';

		$sql = "SELECT id,profile_image,full_name,email,role FROM users WHERE `role` = 'User' OR `role` = 'Admin';";

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
		$sql = "INSERT INTO `products`(`product_image`, `product_name`, `product_price`, `product_description`) VALUES ('$image','$name','$description')";
		$result = $Database->query($sql);
		return $result;
	}

	//Edit pages

}