<?php
// header('Content-Type: application/json');
set_time_limit(0);
ini_set('memory_limit', '-1');// memory limit
require_once '../vendor/autoload.php';
require_once '../setting/koneksi.php';
use Phpml\Clustering\DBSCAN;

  // TODO: truncate
    $truncate = "TRUNCATE TABLE tb_cluster;";
    mysqli_query($con,$truncate);

  // TODO: dekalarasi dari variable eps dan minpts
    // $epsilon=2;
    // $minSamples=3;

$epsilon=$_POST['eps'];
$minSamples=$_POST['minpts'];
$start=$_POST['start'];
$end=$_POST['end'];

// TODO: SELECT data yang digunakan dalam dbscan
$points=array();
if (isset($_POST['submit'])) {
  if (!empty($_POST['start']) && !empty($_POST['end'])) {
    // echo "Start Date : $start <br> End Date : $end <br>";
    $sql_date="SELECT * FROM tb_point WHERE x_point BETWEEN '$start' AND '$end'";
    $all_record=mysqli_query($con,$sql_date);
    while ($row = mysqli_fetch_array($all_record)){
      $array_point = array("x_point" => $row['x_point'], "y_point" => $row['y_point']);
      array_push($points, $array_point);
    }
  }
  else {
    $sql="SELECT * FROM tb_point;";
    $all_record=mysqli_query($con,$sql);
    while ($row = mysqli_fetch_array($all_record)){
      $array_point = array("x_point" => $row['x_point'], "y_point" => $row['y_point']);
      array_push($points, $array_point);
    }
  }
  // TODO: menjalankan dbscan
  $dbscan = new DBSCAN($epsilon, $minSamples);
  $data = $dbscan->cluster($points);

  // TODO: dekalarasi variable
  $datas = array();
  $countlv1=1;

  // TODO: membongkar array
  foreach ($data as $data_lv1) {
    // echo "[CLUSTER] => $countlv1 <br>";
    $countlv2=1;
    foreach ($data_lv1 as $data_lv2) {
      $datas[] = $data_lv2;
      $datas = array('x_point'=>$data_lv2['x_point'],'y_point'=>$data_lv2['y_point']);

      // TODO: melakukan pemeriksaan pada data yang double
      $sql_cek="SELECT * FROM tb_cluster WHERE x_point='$data_lv2[x_point]' AND CAST(y_point AS DECIMAL) = CAST($data_lv2[y_point] AS DECIMAL) AND cluster_num='$countlv1';";
      // echo "$sql_cek <br>";
      $hasil_cek = mysqli_query($con,$sql_cek);
      $row_coun=mysqli_num_rows($hasil_cek);

      // TODO: jika data tidak doubel maka di input ke database
      if ($row_coun==0) {
        // print_r($data_lv2);
        // echo "[TITIK] => $countlv2 <br>";
        $sql_input="INSERT INTO tb_cluster (x_point, y_point, cluster_num) VALUES ('$data_lv2[x_point]', '$data_lv2[y_point]', '$countlv1');";
        // echo "$sql_input <br>";
        mysqli_query($con,$sql_input);
        $countlv2++;
      }
    }
    $countlv1++;
    // $out = array_values($data);
    // print json_encode($datas);
  }
}
else {
  // header('Location: ' . $_SERVER['HTTP_REFERER']);
}
exec('php -q gnuplot.php');
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
