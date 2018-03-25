<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

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
        var chart4 = new CanvasJS.Chart("chartContainer",
  {
    title:{
      text: "Gaming Consoles Sold in 2012"
    },
    legend: {
      maxWidth: 350,
      itemWidth: 120
    },
    data: [
    {
      type: "pie",
      showInLegend: true,
      legendText: "{indexLabel}",
      dataPoints: [
        { y: 4181563, indexLabel: "PlayStation 3" },
        { y: 2175498, indexLabel: "Wii" },
        { y: 3125844, indexLabel: "Xbox 360" },
        { y: 1176121, indexLabel: "Nintendo DS"},
        { y: 1727161, indexLabel: "PSP" },
        { y: 4303364, indexLabel: "Nintendo 3DS"},
        { y: 1717786, indexLabel: "PS Vita"}
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

<div class="container">
  <div class="jumbotron" id="jumbotron-color">
    <h1>Report Page</h1>
  </div>

  <div class="row">
    
        <div class="col-lg-8">
      <div id="linechart3" style="height: 500px; width: 100%;"></div>
    </div>

    <div class="col-lg-4">
<div id="chartContainer" style="height: 450px; width: 100%;"></div>
</div>

        <div class="col-lg-6">
      <div id="linechart2" style="height: 500px; width: 100%;"></div>
    </div>
    
    <div class="col-lg-6">
      <div id="linechart" style="height: 500px; width: 100%;"></div>
    </div>

</div>

</div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>