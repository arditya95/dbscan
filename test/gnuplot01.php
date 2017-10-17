<?php
include_once '../setting/koneksi.php';
include ('../dist/GnuPlotPHP/GnuPlot.php');
use Gregwar\GnuPlot\GnuPlot;

$plot = new GnuPlot;
// $format = ('YYYY-MM-DD HH:MM:SS');
$format = ('%Y-%m-%d %H:%i:%s');

$sql_jum_cluster="SELECT MAX(cluster_num) AS cluster FROM tb_cluster";
$hasil_jum=mysqli_query($con,$sql_jum_cluster);
$row_jum=mysqli_fetch_array($hasil_jum);
$jum_cluster=$row_jum['cluster'];

$plot->setXLabel('X');
// $plot->setXTimeFormatString($format);
$plot->setXTimeFormat('%Y-%m-%d/%H:%i:%s');
$plot->setYLabel('Y');
$plot->setTitle(0, 'The curve');
  $sql_get_point=sprintf("SELECT x_point, y_point FROM tb_cluster WHERE cluster_num=1");
  $hasil_get_point=mysqli_query($con,$sql_get_point);
  foreach ($hasil_get_point as $row) {
    $plot->push('1989-03-10/08:07:01', $row['y_point']);
  }
$plot->display();
// $plot->writePng('coba01.png');
sleep(1000);
?>
