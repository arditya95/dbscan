<?php
header('Content-Type: application/json');
require_once '../vendor/autoload.php';
require_once '../setting/koneksi.php';
use Phpml\Clustering\DBSCAN;

if (isset($_POST['submit'])) {
  if (empty($_POST['eps']) || empty($_POST['minpts'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  else {
    $epsilon=$_POST['eps'];
    $minSamples=$_POST['minpts'];

    $point=array();

    $sql="SELECT * FROM tmp;";
    $all_record=mysqli_query($con,$sql);
    while ($row = mysqli_fetch_array($all_record)){
      // echo "[X => $row[x_point]]" . "[Y => $row[y_point]]" ."<br>";
      array_push($point,[$row['x_point'],$row['y_point']]);
    }
    // print_r($point);

    $dbscan = new DBSCAN($epsilon, $minSamples);
    $dbscan->cluster($point);
    print_r($dbscan->cluster($point));
  }
}
?>
