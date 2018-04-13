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

		$sql = "SELECT accounts.account_id,profile_image,name,email, city, full_address, role, status, phone_number
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

	static function get_number_of_pages($items_per_page){
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT CEILING(COUNT(*) / $items_per_page) 
				FROM accounts 
				WHERE role = 'user' OR role = 'admin';";
		$result = $Database->query($sql);
		$num_of_pages = (int) $result->fetch_assoc();

		return $num_of_pages;
	}

	static function get_users_and_admin_per_page($page, $items_per_page, $search = ''){
		require SCRIPTS . 'dbh.inc.php';

		$num_of_pages = Admin::get_number_of_pages($items_per_page);
		$offset = ($page-1) * $items_per_page; 
		$sql = "SELECT * 
				FROM accounts 
				INNER JOIN addresses
				ON accounts.account_id = addresses.account_id
				WHERE name LIKE '%$search%' AND (role = 'user' OR role = 'admin');";
 				//LIMIT $offset, $items_per_page;";
		$result = $Database->query($sql);

		$resultsArray['users'] = array();
		
		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray['users'][] = $row;
	    }

	    $resultsArray['pages'] = $num_of_pages;

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