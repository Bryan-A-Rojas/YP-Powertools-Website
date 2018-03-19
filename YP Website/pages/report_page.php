<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

require_once CLASSES . 'Admin.inc.php';

$Admin = new Admin($_SESSION['id']);

$users_array = $Admin->get_users();

?>
	
<!-- 	COLUMN CHART -->
  <script type="text/javascript">
  window.onload = function () {
    var chart1 = new CanvasJS.Chart("columnchart",
    {
      title:{
      text: "Sales Sample"
      },
      data: [
      {
        type: "column", //change type to bar, line, area, pie, etc
        dataPoints: [
        { x: 10, y: 71 },
        { x: 20, y: 55},
        { x: 30, y: 50 },
        { x: 40, y: 65 },
        { x: 50, y: 95 },
        { x: 60, y: 68 },
        { x: 70, y: 28 },
        { x: 80, y: 34 },
        { x: 90, y: 14}

        ]
      }
      ]
    });

    var chart2 = new CanvasJS.Chart("linechart",
    {

      title:{
      text: "Sales Growth"
      },
      axisX: {
        valueFormatString: "MMM",
        interval:1,
        intervalType: "month"
      },
      axisY:{
        includeZero: false

      },
      data: [
      {
        type: "line",

        dataPoints: [
        { x: new Date(2012, 00, 1), y: 450 },
        { x: new Date(2012, 01, 1), y: 414},
          { x: new Date(2012, 02, 1), y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle"},
        { x: new Date(2012, 03, 1), y: 460 },
        { x: new Date(2012, 04, 1), y: 450 },
        { x: new Date(2012, 05, 1), y: 500 },
        { x: new Date(2012, 06, 1), y: 480 },
        { x: new Date(2012, 07, 1), y: 480 },
        { x: new Date(2012, 08, 1), y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross"},
        { x: new Date(2012, 09, 1), y: 500 },
        { x: new Date(2012, 10, 1), y: 480 },
        { x: new Date(2012, 11, 1), y: 510 }
        ]
      }
      ]
    });

    var chart3 = new CanvasJS.Chart("piechart",
	{
		theme: "theme2",
		title:{
			text: "Products"
		},		
		data: [
		{       
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			yValueFormatString: "#,##0,,.## Million",
			legendText: "{indexLabel}",
			dataPoints: [
				{  y: 4181563, indexLabel: "Product 1" },
				{  y: 2175498, indexLabel: "Product 2" },
				{  y: 3125844, indexLabel: "Product 3" },
				{  y: 1176121, indexLabel: "Product 4"},
				{  y: 1727161, indexLabel: "Product 5" },
				{  y: 4303364, indexLabel: "Product 6"},
				{  y: 1717786, indexLabel: "Product 7"}
			]
		}
		]
	});

	var chart4 = new CanvasJS.Chart("areachart",
    {
      title: {
        text: "Website Popularity"
      },
        data: [
      {
        type: "area",
        dataPoints: [//array

        { x: new Date(2012, 00, 1), y: 2600 },
        { x: new Date(2012, 01, 1), y: 3800 },
        { x: new Date(2012, 02, 1), y: 4300 },
        { x: new Date(2012, 03, 1), y: 2900 },
        { x: new Date(2012, 04, 1), y: 4100 },
        { x: new Date(2012, 05, 1), y: 4500 },
        { x: new Date(2012, 06, 1), y: 8600 },
        { x: new Date(2012, 07, 1), y: 6400 },
        { x: new Date(2012, 08, 1), y: 5300 },
        { x: new Date(2012, 09, 1), y: 6000 }
        ]
      }
      ]
    });

    chart1.render();
    chart2.render();
    chart3.render();
    chart4.render();
  }
  </script>


 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div class="jumbotron" id="jumbotron-margin">
		<h2>Report Page</h2>
		<a href="index.php"><h4>&lt;Back to Home Page</h4></a>
</div>

<div id="columnchart" style="height: 300px; width: 100%;"></div>
<div id="linechart" style="height: 300px; width: 100%;"></div>
<div id="piechart" style="height: 300px; width: 100%;"></div>
<div id="areachart" style="height: 300px; width: 100%;"></div>

<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Account Image</th>
      <th scope="col">Login Time</th>
      <th scope="col">Logout Time</th>
      <th scope="col">Activity</th>
    </tr>
  </thead>
  </tfoot>
  <tbody>

    <?php foreach ($users_array as $user): ?>
    <tr>

      <?php if($user['profile_image'] != NULL): ?>
        <th scope="row"><img src="../images/profile_images/<?php echo $user['profile_image'] ?>" alt="product-img" class="product-image-size"></th>
      <?php else: ?>
        <th scope="row"><img src="../images/profile_images/sample-user.png"  alt="product-img" class="product-image-size"></th>
      <?php endif ?>

      <td>Undefined</td>
      <td>Undefined</td>
    </tr>
    <?php endforeach ?>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>