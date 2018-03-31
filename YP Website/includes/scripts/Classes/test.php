<?php
	
	//Basic pagination with no error checking

	require_once '../../../config.php';
	require_once SCRIPTS . 'dbh.inc.php';

	//Number of items per page
	$limit = 2;

	//First found out the number of items in the database
	$sql = "SELECT COUNT(product_id)
			FROM products;";

	$result = $Database->query($sql);

	$num_of_products = $result->fetch_assoc();
	$num_of_products = $num_of_products[0];

	echo $num_of_products;

	//Query String
	$sql = "";

	//if()
	$sql = "SELECT *
			FROM products
			LIMIT 0, $limit";

	$result = $Database->query($sql);

	while($row = $result->fetch_assoc()){
		echo "<pre>";
		print_r($row);
		echo "</pre>";
	}

?>