<?php 

class Reports{

	//Get all users
	function get_number_of_sales(){
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

}