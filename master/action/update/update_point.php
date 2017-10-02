<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $x = $_POST['x'];
  $y = $_POST['y'];
  $id = $_POST['id'];
  $sql="UPDATE tmp SET x_point = '$x', y_point = '$y'
  WHERE id_kingdom = '$id';";
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
