<?php 

//Require database header
require_once 'dbh.inc.php';

class Products{

	function get_products(){
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

	function get_specific_product($product_id){
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





