<?php
require_once '../setting/koneksi.php';
if (($handle = fopen("backup\data.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $data[0]=preg_replace('/[--]/',' ', $data[0]);
      $data[0]= date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data[0])));
      $sql="INSERT INTO tmp (x_point, y_point) VALUES ('$data[0]', '$data[1]')";
      mysqli_query($con,$sql);
    }
    fclose($handle);
    // mysql_close($con);
}
?>
