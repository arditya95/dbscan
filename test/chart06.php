<div id="chart" style="width: 100%"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://www.google.com/jsapi"></script>

<script>

// 3. This function fires when Google Charts has been fully loaded
function drawChart() {

  // 4. Retrieve the raw JSON data
  var jsonData = $.ajax({
    url: 'http://d.microbuilder.io:8080/test/temp',
    dataType: 'json',
  }).done(function (results) {

    // 5. Create a new DataTable (Charts expects data in this format)
    var data = new google.visualization.DataTable();

    // 6. Add two columns to the DataTable
    data.addColumn('datetime', 'Time');
    data.addColumn('number',   'Temp');

    // 7. Cycle through the records, adding one row per record
    results["packets"].forEach(function(packet) {
      data.addRow([
          (new Date(packet.timestamp)),
          parseFloat(packet.payloadString),
        ]);
    });

    // 8. Create a new line chart
    var chart = new google.visualization.LineChart($('#chart').get(0));

    // 9. Render the chart, passing in our DataTable and any config data
    chart.draw(data, {
      title:  'Ambient Temperature (/test/temp)',
      height: 150
    });

  });

}

// 1. Start loading Google Charts
google.load('visualization', '1', {
  packages: ['corechart']
});

// 2. Set a callback function to fire when loading is complete
google.setOnLoadCallback(drawChart);

</script>
