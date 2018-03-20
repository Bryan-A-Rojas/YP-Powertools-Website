<?php 

class Products{

	static function get_products(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		//Make variable called sql with query string "SELECT * from products WHERE id=$id_number"
		$sql = "SELECT * FROM products;";
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

	static function get_specific_product($product_id){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';
		
		//Make variable called sql with query string "SELECT * from products WHERE id=$id_number"
		$sql = "SELECT * FROM products WHERE product_id = $product_id;";
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





