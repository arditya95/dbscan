<?php
include_once '../setting/koneksi.php';
include ('../dist/GnuPlotPHP/GnuPlot.php');
use Gregwar\GnuPlot\GnuPlot;

$plot = new GnuPlot;
$format = ('%d/%m/%Y-%H:%M:%S');

$sql_jum_cluster="SELECT MAX(cluster_num) AS cluster FROM tb_cluster";
$hasil_jum=mysqli_query($con,$sql_jum_cluster);
$row_jum=mysqli_fetch_array($hasil_jum);
$jum_cluster=$row_jum['cluster'];

$plot->setYLabel('Frequency');
$plot->setXLabel('Time');
// $plot->setXRange('10/03/1989-08:17:38', '10/03/1989-08:04:47');


for ($i=0; $i <= $jum_cluster; $i++) {
  $plot->setTitle($i, "Cluster $i");
  $plot->setXTimeFormat($format);
  // $plot->setXTimeFormatString($format);
    $sql_get_point=sprintf("SELECT x_point, y_point FROM tb_cluster WHERE cluster_num=$i");
    $hasil_get_point=mysqli_query($con,$sql_get_point);
    foreach ($hasil_get_point as $row) {
      // $preg=preg_replace('/[ ]/', '/', $row['x_point']);

      $date=date_create($row['x_point']);
      $date_change=date_format($date,"d/m/Y-H:i:s");

      $plot->push($date_change, $row['y_point'], $i);
      echo "$date_change => $row[y_point] <br>";
    }
}
// $plot->writePng('coba01.png');

$plot->display();
sleep(1000);
?>
