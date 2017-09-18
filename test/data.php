<?php
header('Content-Type: application/json');
include '../setting/koneksi.php';
$data = array();
$sql=sprintf("SELECT x_point, y_point FROM tmp;");
$all_record=mysqli_query($con,$sql);
foreach ($all_record as $row) {
	$data[] = $row;
}
print json_encode($data);
?>
