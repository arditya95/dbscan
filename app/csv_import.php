<?php
set_time_limit(0);
require_once '../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $cvs_file_name=$_FILES['csv']['name'];
  $cvs_file_error=$_FILES['csv']['error'];
  $cvs_file_size=$_FILES['csv']['size'];
  $cvs_file_loc=$_FILES['csv']['tmp_name'];
  $ext = pathinfo($cvs_file_name, PATHINFO_EXTENSION);

if ($ext=='csv') {
  if (($handle = fopen("$cvs_file_loc", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        $data[0]=preg_replace('/[--]/',' ', $data[0]);
        $data[0]= date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $data[0])));
        $sql="INSERT INTO tb_point (x_point, y_point) VALUES ('$data[0]', '$data[1]')";
        mysqli_query($con,$sql);
        // echo "$sql <br>";
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
