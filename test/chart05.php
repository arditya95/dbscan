<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['scatter']});
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var jsonData = $.ajax({
          url: "ajax_04.php",
          dataType: "json",
          async: false
          }).responseText;

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable();

      data.addColumn('number', 'x');
      data.addColumn('number', 'y');
      data.addRows(jsonData);


      // Instantiate and draw our chart, passing in some options.
      var options = {
        title: 'DBScan',
        hAxis: {title: 'x', minValue: 0, maxValue: 15},
        vAxis: {title: 'y', minValue: 0, maxValue: 15},
        legend: 'none'
      };

      var chart = new google.charts.Scatter(document.getElementById('chart_div'));
      chart.draw(data, google.charts.Scatter.convertOptions(options));

    }

    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
