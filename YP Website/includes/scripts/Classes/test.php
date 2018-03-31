<?php
	
	//Basic pagination with no error checking

	 require_once '../../../config.php';

	 require_once INCLUDES . 'header.inc.php';
	// require_once SCRIPTS . 'dbh.inc.php';

	// //Number of items per page
	// $limit = 2;

	// //First found out the number of items in the database
	// $sql = "SELECT COUNT(product_id)
	// 		FROM products;";

	// $result = $Database->query($sql);

	// $num_of_products = $result->fetch_assoc();
	// $num_of_products = $num_of_products[0];

	// echo $num_of_products;

	// //Query String
	// $sql = "";

	// //if()
	// $sql = "SELECT *
	// 		FROM products
	// 		LIMIT 0, $limit";

	// $result = $Database->query($sql);

	// while($row = $result->fetch_assoc()){
	// 	echo "<pre>";
	// 	print_r($row);
	// 	echo "</pre>";
	// }

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<canvas id="myChart" style="width:500px;height:500px"></canvas>
		</div>
	</div>	
</div>

<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    // Configuration options go here
    options: {}
});

</script>