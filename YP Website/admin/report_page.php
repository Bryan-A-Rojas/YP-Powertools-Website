<?php 

require_once 'config_admin.php';

require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

require_once ADMIN_CLASSES . 'Reports.php';

$current_day = date('d');
$current_month = date('F');
$current_year = date('Y');

$yearly_sales = Reports::get_yearly_sales();
$yearly_title = "$current_month " . ($current_year - 1) .  "-$current_year";
// echo "<pre>";
//   print_r($yearly_sales);
// echo "</pre>";

$monthly_sales = Reports::get_monthly_sales();
$monthly_title = $monthly_sales[0]['SalesMonth'] . " " . $monthly_sales[0]['SalesDay'] . " - " . end($monthly_sales)['SalesMonth'] . " " . end($monthly_sales)['SalesDay'];
// echo "<pre>";
//   print_r($monthly_sales);
// echo "</pre>";

$weekly_sales = Reports::get_weekly_sales();
$week_title =  $weekly_sales[0]['SalesDate'] . " - " . end($weekly_sales)['SalesDate'];
// echo "<pre>";
//   print_r($weekly_sales);
// echo "</pre>";

?>

<div class="jumbotron" id="jumbotron-color">
  <h2>Report Page</h2>
</div>

<div class="container-fluid" style="background-color:lightgrey">
  <div class="row" style="background-color: white">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style="margin-bottom:30px;">
      <canvas id="yearlyChart"></canvas>
    </div>
    <div class="col-lg-2"></div>
  </div>
  <div class="row" style="background-color: white">
    <div class="col-lg-6" style="margin-bottom:30px;">
      <canvas id="monthlyChart"></canvas>
    </div>
    <div class="col-lg-6">
      <canvas id="weeklyChart"></canvas>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
  var yearly_chart = document.getElementById('yearlyChart').getContext('2d');
  var chart = new Chart(yearly_chart, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: [<?php foreach($yearly_sales as $key => $item){echo '"' . $item['SalesMonth'] . ' ('. $item['SalesYear'] . ')",';} ?>],

      datasets: [{
        label: "Profit in Philippine Peso",
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'red',
        data: [<?php foreach($yearly_sales as $key => $item){echo $item['total_price'] . ',';} ?>], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Yearly Sales Report (<?php echo $yearly_title ?>)',
        fontSize:35
      }
    }
  });



  var monthly_chart = document.getElementById('monthlyChart').getContext('2d');
  var chart = new Chart(monthly_chart, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: [<?php foreach($monthly_sales as $key => $item){echo '"' . $item['SalesMonth'] . ' '. $item['SalesDay'] . '",';} ?>],

      datasets: [{
        label: "Profit in Philippine Peso",
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'red',
        data: [<?php foreach($monthly_sales as $key => $item){echo $item['total_price'] . ',';} ?>], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Monthly Sales Report (<?php echo $monthly_title ?>)',
        fontSize:25
      }
    }
  });


  var weekly_chart = document.getElementById('weeklyChart').getContext('2d');
  var chart = new Chart(weekly_chart, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: [<?php foreach($weekly_sales as $key => $item){echo '"' . $item['SalesDay'] . ' '. $item['SalesDate'] . '",';} ?>],

      datasets: [{
        label: "Profit in Philippine Peso",
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'red',
        data: [<?php foreach($weekly_sales as $key => $item){echo $item['total_price'] . ',';} ?>], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Weekly Sales Report (<?php echo $week_title ?>)',
        fontSize:25
      }
    }
  });
</script>



<?php 

require_once INCLUDES . 'endtags.inc.php';

?>