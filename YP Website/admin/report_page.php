<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

?>
  
<!--  COLUMN CHART -->
  <script type="text/javascript">
  window.onload = function () {

    var chart = new CanvasJS.Chart("yearlychart",
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
        


        var chart2 = new CanvasJS.Chart("monthlychart",
    {

      title:{
      text: "Monthly"
      },
      axisX: {
        valueFormatString: "D",
        interval:2,
        intervalType: "day"
      },
      axisY:{
        includeZero: false

      },
      data: [
      {
        type: "line",

        dataPoints: [
        { x: new Date(2012, 00, 1), y: 450 },
        { x: new Date(2012, 00, 3), y: 414},
          { x: new Date(2012, 00, 5), y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle"},
        { x: new Date(2012, 00, 7), y: 460 },
        { x: new Date(2012, 00, 9), y: 450 },
        { x: new Date(2012, 00, 11), y: 500 },
        { x: new Date(2012, 00, 13), y: 480 },
        { x: new Date(2012, 00, 15), y: 480 },
        { x: new Date(2012, 00, 17), y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross"},
        { x: new Date(2012, 00, 19), y: 500 },
        { x: new Date(2012, 00, 21), y: 480 },
        { x: new Date(2012, 00, 23), y: 510 }
        ]
      }
      ]
    });

        


        var chart3 = new CanvasJS.Chart("dailychart",
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

     var chart4 = new CanvasJS.Chart("chartContainer",
  {
    theme: "theme2",
    title:{
      text: "Gaming Consoles Sold in 2012"
    },    
    data: [
    {       
      type: "pie",
      showInLegend: true,
      toolTipContent: "{y} - #percent %",
      yValueFormatString: "#,##0,,.## Million",
      legendText: "{indexLabel}",
      dataPoints: [
        {  y: 4181563, indexLabel: "PlayStation 3" },
        {  y: 2175498, indexLabel: "Wii" },
        {  y: 3125844, indexLabel: "Xbox 360" },
        {  y: 1176121, indexLabel: "Nintendo DS"},
        {  y: 1727161, indexLabel: "PSP" },
        {  y: 4303364, indexLabel: "Nintendo 3DS"},
        {  y: 1717786, indexLabel: "PS Vita"}
      ]
    }
    ]
  });

    chart.render();
    chart2.render();
    chart3.render();
    chart4.render();
  }
  </script>


 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <div class="jumbotron" id="jumbotron-color">
    <h2>Report Page</h2>
  </div>
<div style="background-color: lightgrey">
<div class="container">
  
  <div class="row">
    <div class="col-lg-6 mx-auto">
      <div class="graph-spacing" style="margin-top: 20px">
        <div id="chartContainer" style="height: 400px; width: 100%;"></div>
      </div>
    </div>
  </div>  

    <div class="row">
        <div class="col-lg-12">
          <div class="graph-spacing">
          <div id="yearlychart" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
    </div>

  <div class="row">

        <div class="col-lg-6">
          <div class="graph-spacing">
      <div id="monthlychart" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
    
      <div class="col-lg-6">
          <div class="graph-spacing">
      <div id="dailychart" style="height: 300px; width: 100%;"></div>
      </div>
    </div>

  </div>

</div>

</div>

</div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>