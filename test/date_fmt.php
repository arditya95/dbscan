<?php
include_once '../setting/koneksi.php';
echo "1989-03-10 23:26:50 <br>";
$date=date_create("1989-03-10 23:26:50");
$new=date_format($date,"d-m-Y H:i:s");
$flot='0.432385';
echo "$new ";

$file = 'data.txt';

if (file_exists($file)) {
  if (!unlink($file))
    {
      echo ("Error deleting $file");
    }
  else
    {
      echo ("Deleted $file");
    }
} else {
  $current = file_get_contents($file);
    $sql_get_point=sprintf("SELECT x_point, y_point FROM tb_cluster");
    $hasil_get_point=mysqli_query($con,$sql_get_point);
    foreach ($hasil_get_point as $row) {
    $date=date_create($row['x_point']);
    $date_change=date_format($date,"d/m/Y H:i:s");
    echo "$date_change => $row[y_point] <br>";
    $data="$date_change $row[y_point]";
    $current .= "$data\n";
  }
  file_put_contents($file, $current, LOCK_EX);
}

$current = file_get_contents($file);
  $sql_get_point=sprintf("SELECT x_point, y_point FROM tb_cluster");
  $hasil_get_point=mysqli_query($con,$sql_get_point);
  foreach ($hasil_get_point as $row) {
  $date=date_create($row['x_point']);
  $date_change=date_format($date,"d/m/Y H:i:s");
  echo "$date_change => $row[y_point] <br>";
  $data="$date_change $row[y_point]";
  $current .= "$data\n";
}
file_put_contents($file, $current, LOCK_EX);
?>
