<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

?>
  
<!--  COLUMN CHART -->
  <script type="text/javascript">
  window.onload = function () {

    var chart = new CanvasJS.Chart("linechart",
    {

      title:{
      text: "Yearly"
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
        var chart2 = new CanvasJS.Chart("linechart2",
    {

      title:{
      text: "Monthly"
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

        var chart3 = new CanvasJS.Chart("linechart3",
    {

      title:{
      text: "Daily"
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

    chart.render();
    chart2.render();
    chart3.render();
  }
  </script>


 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div class="jumbotron" id="jumbotron-margin">
    <h2>Report Page</h2>
    <a href="index.php"><h4>&lt;Back to Home Page</h4></a>
</div>

<div class="container">
  <div class="row">
    
    <div class="col-lg-6">
<h2>Sales Report</h2>
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td>Item#1 Name</td>
        <td class="alert alert-danger">Unavailable</td>
        <td>Nov 18</td>
        <td>Price </td>
      </tr>
  </tbody>

    <tbody>
      <tr>
        <td>Item#2 Name</td>
        <td class="alert alert-success">Available</td>
        <td>Nov 18</td>
        <td>Price </td>
      </tr>
  </tbody>

    <tbody>
      <tr>
        <td>Item#3 Name</td>
        <td class="alert alert-warning">New</td>
        <td>Nov 18</td>
        <td>Price </td>
      </tr>
  </tbody>

    <tbody>
      <tr>
        <td>Item#4 Name</td>
        <td class="alert alert-info">Used</td>
        <td>Nov 18</td>
        <td>Price </td>
      </tr>
  </tbody>

      <tbody>
      <tr>
        <td>Item#5 Name</td>
        <td class="alert alert-danger">Unavailable</td>
        <td>Nov 18</td>
        <td>Price </td>
      </tr>
  </tbody>

      <tbody>
      <tr>
        <td>Item#6 Name</td>
        <td class="alert alert-danger">Unavailable</td>
        <td>Nov 18</td>
        <td>Price </td>
      </tr>
  </tbody>

      <tbody>
      <tr>
        <td>Item#7 Name</td>
        <td class="alert alert-danger">Unavailable</td>
        <td>Nov 18</td>
        <td>Price </td>
      </tr>
  </tbody>

      <tbody>
      <tr>
        <td>Item#8 Name</td>
        <td class="alert alert-warning">New</td>
        <td>Nov 18</td>
        <td>Price </td>
      </tr>
      </tbody>

</table>
</div>

    <div class="col-lg-6">
      <div id="linechart3" style="height: 500px; width: 100%;"></div>
    </div>
    
    <div class="col-lg-12">
      <div id="linechart2" style="height: 500px; width: 100%;"></div>
      <div id="linechart" style="height: 500px; width: 100%;"></div>
    </div>

</div>

</div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>