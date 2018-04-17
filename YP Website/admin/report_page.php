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

$monthly_sales = Reports::get_monthly_sales();
$monthly_title = $monthly_sales[0]['SalesMonth'] . " " . $monthly_sales[0]['SalesDay'] . " - " . end($monthly_sales)['SalesMonth'] . " " . end($monthly_sales)['SalesDay'];

$weekly_sales = Reports::get_weekly_sales();
$week_title =  $weekly_sales[0]['SalesDate'] . " - " . end($weekly_sales)['SalesDate'];

$sales_per_product = Reports::get_sales_per_product();

$availability_per_product = Reports::get_unavailable_percentage();
$availability_per_product = $availability_per_product[0];
$availability_per_product['Percentage_available'] = 100 - $availability_per_product['Percentage'];

$status_pie_chart_array = Reports::get_status_percentage();

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<div class="jumbotron" id="jumbotron-color">
  <h1>Report Page</h1>
</div>

<div class="container" style="background-color:lightgrey">
  <div class="row" style="background-color: white">
    <div class="col-lg-5" style="margin-bottom:30px; border: 1px solid black; border-radius: 25px;">
       <canvas id="availability_per_product_pie_chart"></canvas>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-5" style="margin-bottom:30px; border: 1px solid black; border-radius: 25px;">
      <canvas id="status_pie_chart"></canvas>
    </div>
  </div>
  <div class="row" style="background-color: white">
    <div class="col-lg-6" style="margin-bottom:30px; border: 1px solid black; border-radius: 25px;">
       <canvas id="per_product"></canvas>
    </div>
    <div class="col-lg-6" style="margin-bottom:30px; border: 1px solid black; border-radius: 25px;">
      <canvas id="yearlyChart"></canvas>
    </div>
  </div>
  <div class="row" style="background-color: white">
    <div class="col-lg-6" style="margin-bottom:30px; border: 1px solid black; border-radius: 25px;">
      <canvas id="monthlyChart"></canvas>
    </div>
    <div class="col-lg-6" style="margin-bottom:30px; border: 1px solid black; border-radius: 25px;">
      <canvas id="weeklyChart"></canvas>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
  var availability_per_product = document.getElementById('availability_per_product_pie_chart').getContext('2d');
  var chart = new Chart(availability_per_product, {
    // The type of chart we want to create
    type: 'pie',
    // The data for our dataset
    data: {
      labels: ['Available' , 'Unavailable'],

      datasets: [{
        label: "Availability Percentage",
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor:['green','red'],
        data: ['<?php echo $availability_per_product['Percentage_available'] ?>', '<?php echo $availability_per_product['Percentage'] ?>'], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Product Availability Percentage',
        fontSize:35
      }
    }
  });

  var status_percentage = document.getElementById('status_pie_chart').getContext('2d');
  var chart = new Chart(status_percentage, {
    // The type of chart we want to create
    type: 'pie',
    // The data for our dataset
    data: {
      labels: ['Approved' , 'Denied', 'Pending'],

      datasets: [{
        label: "Percentage",
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor:['green', 'red', 'orange'],
        data: ['<?php echo $status_pie_chart_array['approved'] ?>','<?php echo $status_pie_chart_array['denied'] ?>','<?php echo $status_pie_chart_array['pending'] ?>'], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Transaction Status Percentage',
        fontSize:35
      }
    }
  });



  var per_product = document.getElementById('per_product').getContext('2d');
  var chart = new Chart(per_product, {
    // The type of chart we want to create
    type: 'bar',
    // The data for our dataset
    data: {
      labels: [<?php foreach($sales_per_product as $key => $item){echo '"' . $item['name'] . '", ';} ?>],

      datasets: [{
        label: "Sales Per Product",
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'red',
        data: [<?php foreach($sales_per_product as $key => $item){echo '"' . $item['quantity'] . '", ';} ?>], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Sales Per Product',
        fontSize:35
      }
    }
  });


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