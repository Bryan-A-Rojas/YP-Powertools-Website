<?php 

class Reports{

	static function get_yearly_sales(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT YEAR(date_of_purchase) as SalesYear,
       				   MONTHNAME(STR_TO_DATE(MONTH(date_of_purchase), '%m')) as SalesMonth,
       				   SUM(total_price) AS total_price
    			FROM transactions
				WHERE date_of_purchase >= DATE_SUB(NOW(),INTERVAL 1 YEAR) AND status = 'approved'
				GROUP BY YEAR(date_of_purchase), MONTH(date_of_purchase)
				ORDER BY YEAR(date_of_purchase), MONTH(date_of_purchase);";

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

	static function get_status_percentage(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT (SELECT Count(transactions.status) 
				         FROM transactions 
				         WHERE transactions.status = 'approved') * 100 / (Select Count(*) From transactions) as approved
				from transactions
				group by transactions.status;";

				//Query sql string
		$result = $Database->query($sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray[] = $row;
	   	}

	   	$whole_result = array();
	   	$whole_result['approved'] = $resultsArray[0]['approved'];

	   	$sql = "SELECT (SELECT Count(transactions.status) 
				         FROM transactions 
				         WHERE transactions.status = 'denied') * 100 / (Select Count(*) From transactions) as denied
				from transactions
				group by transactions.status;";

		//Query sql string
		$result = $Database->query($sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray[] = $row;
	   	}

	   	$whole_result['denied'] = $resultsArray[0]['denied'];

	   	$sql = "SELECT (SELECT Count(transactions.status) 
				         FROM transactions 
				         WHERE transactions.status = 'pending') * 100 / (Select Count(*) From transactions) as pending
				from transactions
				group by transactions.status;";

		//Query sql string
		$result = $Database->query($sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while($row = $result->fetch_assoc()) {
	        $resultsArray[] = $row;
	   	}

	   	$whole_result['pending'] = $resultsArray[0]['pending'];

	   	return $whole_result;
	}



	static function get_unavailable_percentage(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT ((SELECT Count(Availability) FROM products WHERE availability != 'available' OR stock < 1) * 100 / (Select Count(*) From products)) as Percentage
			From products
			GROUP BY availability";

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

	static function get_monthly_sales(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT DAY(date_of_purchase) as SalesDay,
       				   MONTHNAME(STR_TO_DATE(MONTH(date_of_purchase), '%m')) as SalesMonth,
       				   SUM(total_price) AS total_price
				FROM transactions
				WHERE (date_of_purchase BETWEEN NOW() - INTERVAL 30 DAY AND NOW()) AND status = 'approved'
				GROUP BY YEAR(date_of_purchase), MONTH(date_of_purchase), DAY(date_of_purchase)
				ORDER BY YEAR(date_of_purchase), MONTH(date_of_purchase), DAY(date_of_purchase);";

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

	static function get_weekly_sales(){
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT DAYNAME(date_of_purchase) as SalesDay,
       				   CONCAT(MONTHNAME(STR_TO_DATE(MONTH(date_of_purchase), '%m')), ' ',DAY(date_of_purchase)) as SalesDate,
       				   SUM(total_price) AS total_price
				FROM transactions
				WHERE (date_of_purchase >= NOW() + INTERVAL -7 DAY
   						AND date_of_purchase <  NOW() + INTERVAL  0 DAY) 
                        AND status = 'approved'
				GROUP BY YEAR(date_of_purchase), MONTH(date_of_purchase), DAY(date_of_purchase)
				ORDER BY YEAR(date_of_purchase), MONTH(date_of_purchase), DAY(date_of_purchase);";

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

	static function get_sales_per_product(){
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT products.name, SUM(quantity) AS quantity FROM purchases
				INNER JOIN transactions
				ON transactions.transaction_id = purchases.transaction_id
				INNER JOIN products
				ON products.product_id = purchases.product_id
				WHERE transactions.status = 'approved'
				GROUP BY purchases.product_id;";

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