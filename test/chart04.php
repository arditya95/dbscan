<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title></title>
    <script src="../dist\js\jquery.min.js"></script>
    <script src="../dist\canvasjs\canvasjs.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.getJSON("ajax_04.php", function (result) {
              var chart = new CanvasJS.Chart("chartContainer",
              {
                title:{
                  text: "DBScan"
              },
              axisX:{
                  title: "Timeline",
                  gridThickness: 1
              },
              axisY: {
                  title: "Frekuensi",
                  gridThickness: 1
              },
              data: [
              {
                  type: "scatter",
                  dataPoints: result
              }
              ]
          });
                chart.render();
            });
        });
    </script>
</head>
<body>
    <div id="chartContainer" style="width: 800px; height: 380px;"></div>
</body>
</html>
