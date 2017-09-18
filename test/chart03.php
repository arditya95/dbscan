<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>

  <?php
  include '../setting/koneksi.php';
  $tahun=array();
  $bulan=array();
  $hari=array();
  $sql="SELECT * FROM tmp;";
  $all_record=mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($all_record)){
      // assumes dates are patterned 'yyyy-MM-dd hh:mm:ss'
      preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $row['x_point'], $match);
      $year = (int) $match[1];
      $month = (int) $match[2]; // convert to zero-index to match javascript's dates
      $day = (int) $match[3];
      $hours = (int) $match[4];
      $minutes = (int) $match[5];
      $seconds = (int) $match[6];
      // echo "$year-$month-$day $hours:$minutes:$seconds <br>";
      // echo '<script type="text/javascript">','function();','</script>';
      // array_push($point, $tmp['tahun'] = $year ,$tmp['bulan'] = $month,$tmp['hari'] = $day);
      array_push($tahun, $year);
      array_push($bulan, $month);
      array_push($hari, $day);
  }
  // print_r($tahun);
  // print_r($bulan);
  // print_r($hari);
  ?>


  <script type="text/javascript">
// <?php echo implode(',',$tahun); ?>
// <?php echo implode(',',$bulan); ?>
// <?php echo implode(',',$hari); ?>

var year = new Array(<?php $tahun ?>);
var month = new Array(<?php $bulan ?>);
var day = new Array(<?php $hari ?>);

  // year = new Array(<?php echo implode(',',$tahun); ?>);
  // month = new Array(<?php echo implode(',',$bulan); ?>);
  // day = new Array(<?php echo implode(',',$hari); ?>);

  window.onload = function () {
      var chart = new CanvasJS.Chart("chartContainer",
      {
        title:{
          text: "Simple Date-Time Chart"
      },
      axisX:{
          title: "timeline",
          gridThickness: 2
      },
      axisY: {
          title: "Downloads"
      },
      data: [
      {
          type: "area",
          dataPoints: [
              { x: new Date(year, month, day), y: 26}
          ]
      }
      ]
  });

      chart.render();
  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContainer" style="height: 300px; width: 100%;">
</div>
</body>
</html>
