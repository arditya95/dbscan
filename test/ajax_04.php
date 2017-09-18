<?php
header('Content-Type: application/json');
include '../setting/koneksi.php';

$points=array();

$sql="SELECT * FROM tmp2;";
$all_record=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($all_record)){
  $array_point = array("x" => $row['x_point'], "y" => $row['y_point']);
  // $array_point = array($row['x_point'], $row['y_point']);
  array_push($points, $array_point);
}
// print_r($point);
echo json_encode($points, JSON_NUMERIC_CHECK);
?>
