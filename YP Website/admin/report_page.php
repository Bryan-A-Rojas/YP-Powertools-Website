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
        valueFormatString: "H",
        interval:1,
        intervalType: "hour"
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
    chart4.render();
  }
  </script>


 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <div class="jumbotron" id="jumbotron-color">
    <h2>Report Page</h2>
  </div>
<div style="background-color: lightgrey">
<div class="container-fluid">
  
  <div class="row">
    <div class="col-lg-6 mx-auto">
      <div class="graph-spacing" style="margin-top: 20px">
        <div id="chartContainer" style="height: 400px; width: 100%;"></div>
      </div>
    </div>
  </div>  

  <div class="row">
    <div class="col-lg-6 mx-auto" style="margin-bottom: 20px">

<form>
    <input type="datetime-local" id="party" name="bday">
    <span class="validity"></span>

  <p class="fallbackLabel">Choose a date and time for your party:</p>
  <div class="fallbackDateTimePicker">
    <div>
      <span>
        <label for="day">Day:</label>
        <select id="day" name="day">
        </select>
      </span>
      <span>
        <label for="month">Month:</label>
        <select id="month" name="month">
          <option selected>January</option>
          <option>February</option>
          <option>March</option>
          <option>April</option>
          <option>May</option>
          <option>June</option>
          <option>July</option>
          <option>August</option>
          <option>September</option>
          <option>October</option>
          <option>November</option>
          <option>December</option>
        </select>
      </span>
      <span>
        <label for="year">Year:</label>
        <select id="year" name="year">
        </select>
      </span>
    </div>
    <div>
      <span>
        <label for="hour">Hour:</label>
        <select id="hour" name="hour">
        </select>
      </span>
      <span>
        <label for="minute">Minute:</label>
        <select id="minute" name="minute">
        </select>
      </span>
    </div>
  </div>
  
<button type="button" class="btn btn-success btn-lg float-right">Refresh</button>

      <div class="btn-group float-right" style="margin-right: 10px">
      <button type="button" class="btn btn-info dropdown-toggle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Group by:
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
      </div>
      </div>
    </div>

</form>

<script>
// define variables
var nativePicker = document.querySelector('.nativeDateTimePicker');
var fallbackPicker = document.querySelector('.fallbackDateTimePicker');
var fallbackLabel = document.querySelector('.fallbackLabel');

var yearSelect = document.querySelector('#year');
var monthSelect = document.querySelector('#month');
var daySelect = document.querySelector('#day');
var hourSelect = document.querySelector('#hour');
var minuteSelect = document.querySelector('#minute');

// hide fallback initially
fallbackPicker.style.display = 'none';
fallbackLabel.style.display = 'none';

// test whether a new datetime-local input falls back to a text input or not
var test = document.createElement('input');
test.type = 'datetime-local';
// if it does, run the code inside the if() {} block
if(test.type === 'text') {
  // hide the native picker and show the fallback
  nativePicker.style.display = 'none';
  fallbackPicker.style.display = 'block';
  fallbackLabel.style.display = 'block';

  // populate the days and years dynamically
  // (the months are always the same, therefore hardcoded)
  populateDays(monthSelect.value);
  populateYears();
  populateHours();
  populateMinutes();
}

function populateDays(month) {
  // delete the current set of <option> elements out of the
  // day <select>, ready for the next set to be injected
  while(daySelect.firstChild){
    daySelect.removeChild(daySelect.firstChild);
  }

  // Create variable to hold new number of days to inject
  var dayNum;

  // 31 or 30 days?
  if(month === 'January' | month === 'March' | month === 'May' | month === 'July' | month === 'August' | month === 'October' | month === 'December') {
    dayNum = 31;
  } else if(month === 'April' | month === 'June' | month === 'September' | month === 'November') {
    dayNum = 30;
  } else {
  // If month is February, calculate whether it is a leap year or not
    var year = yearSelect.value;
    (year - 2016) % 4 === 0 ? dayNum = 29 : dayNum = 28;
  }

  // inject the right number of new <option> elements into the day <select>
  for(i = 1; i <= dayNum; i++) {
    var option = document.createElement('option');
    option.textContent = i;
    daySelect.appendChild(option);
  }

  // if previous day has already been set, set daySelect's value
  // to that day, to avoid the day jumping back to 1 when you
  // change the year
  if(previousDay) {
    daySelect.value = previousDay;

    // If the previous day was set to a high number, say 31, and then
    // you chose a month with less total days in it (e.g. February),
    // this part of the code ensures that the highest day available
    // is selected, rather than showing a blank daySelect
    if(daySelect.value === "") {
      daySelect.value = previousDay - 1;
    }

    if(daySelect.value === "") {
      daySelect.value = previousDay - 2;
    }

    if(daySelect.value === "") {
      daySelect.value = previousDay - 3;
    }
  }
}

function populateYears() {
  // get this year as a number
  var date = new Date();
  var year = date.getFullYear();

  // Make this year, and the 100 years before it available in the year <select>
  for(var i = 0; i <= 100; i++) {
    var option = document.createElement('option');
    option.textContent = year-i;
    yearSelect.appendChild(option);
  }
}

function populateHours() {
  // populate the hours <select> with the 24 hours of the day
  for(var i = 0; i <= 23; i++) {
    var option = document.createElement('option');
    option.textContent = (i < 10) ? ("0" + i) : i;
    hourSelect.appendChild(option);
  }
}

function populateMinutes() {
  // populate the minutes <select> with the 60 hours of each minute
  for(var i = 0; i <= 59; i++) {
    var option = document.createElement('option');
    option.textContent = (i < 10) ? ("0" + i) : i;
    minuteSelect.appendChild(option);
  }
}

// when the month or year <select> values are changed, rerun populateDays()
// in case the change affected the number of available days
yearSelect.onchange = function() {
  populateDays(monthSelect.value);
}

monthSelect.onchange = function() {
  populateDays(monthSelect.value);
}

//preserve day selection
var previousDay;

// update what day has been set to previously
// see end of populateDays() for usage
daySelect.onchange = function() {
  previousDay = daySelect.value;
} 
</script>

</div>

    <div class="row">
        <div class="col-lg-12">
          <div id="yearlychart" style="height: 400px; width: 95%; margin-left: auto; margin-right: auto; margin-bottom: 20px;"></div>
          </div>
        </div>
    </div>

</div>

</div>

</div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>