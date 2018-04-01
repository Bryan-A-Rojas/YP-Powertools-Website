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
		//Require database header
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

}