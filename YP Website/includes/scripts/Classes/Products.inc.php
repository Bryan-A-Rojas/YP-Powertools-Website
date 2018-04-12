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

	static function get_products_per_page($page, $items_per_page){
		require SCRIPTS . 'dbh.inc.php';

		$num_of_pages = Products::get_number_of_pages($items_per_page);
		$offset = ($page-1) * $items_per_page; 
		$sql = "SELECT * FROM products LIMIT $offset, $items_per_page;";
		$result = $Database->query($sql);
		
		$resultsArray['products'] = array();
		
		while($row = $result->fetch_assoc()) {
	        $resultsArray['products'][] = $row;
	    }

	    $resultsArray['pages'] = $num_of_pages;

		return $resultsArray;
	}

	static function get_number_of_pages($items_per_page){
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT CEILING(COUNT(*) / $items_per_page) 
				FROM products";
		$result = $Database->query($sql);
		$num_of_pages = (int) $result->fetch_assoc();

		return $num_of_pages;
	}

	static function get_products_per_page_with_search($page, $items_per_page, $search = ''){
		require SCRIPTS . 'dbh.inc.php';

		$num_of_pages = Products::get_number_of_pages($items_per_page);
		$offset = ($page-1) * $items_per_page; 
		$sql = "SELECT * 
				FROM products 
				WHERE name LIKE '%$search%'
 				LIMIT $offset, $items_per_page;";
		$result = $Database->query($sql);

		$resultsArray['products'] = array();
		
		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray['products'][] = $row;
	    }

	    $resultsArray['pages'] = $num_of_pages;

		return $resultsArray;
	}


	static function get_specific_product($product_id){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';
		
		//Make variable called sql with query string "SELECT * from products WHERE id=$id_number"
		$sql = "SELECT * 
				FROM products 
				WHERE product_id = $product_id;";
				
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





