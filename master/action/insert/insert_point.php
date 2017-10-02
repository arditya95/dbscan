<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $x = $_POST['x'];
  $y = $_POST['y'];
  $deskripsi = $_POST['deskripsi'];
  $sql="INSERT INTO tmp (x_point, y_point) VALUES ('$x','$y');";
  mysqli_query($con,$sql);
  if($sql)
  {
    echo "<script language=javascript>
    alert('Data Berhasil Disimpan');
    location.href='../../../route.php?kode=data_point';</script>";
  }
  else
  {
    echo"<script language=javascript> alert ('Gagal Tambah Data');history.back();</script>";
  }
}
// header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
