<?php
require_once '../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $ext = pathinfo($_POST['csv'], PATHINFO_EXTENSION);
  // echo "$ext";
if ($ext=='csv') {
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
    $message = 'Data yang berhasil disimpan';
    echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"../index.php\");
    </SCRIPT>";
  }
  else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}
?>
