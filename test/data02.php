<?php
  header('Content-Type: application/json');
  include_once '../setting/koneksi.php';
  $data = array();

  $sql_jum_cluster="SELECT MAX(cluster_num) AS cluster FROM tb_cluster";
  $hasil_jum=mysqli_query($con,$sql_jum_cluster);
  $row_jum=mysqli_fetch_array($hasil_jum);
  $jum_cluster=$row_jum['cluster'];
  // echo "Jumlah Cluster = $jum_cluster <br>";
  $no=1;
  // for ($i=1; $i <= $jum_cluster; $i++) {
    $sql_get_point=sprintf("SELECT x_point, y_point FROM tb_cluster WHERE cluster_num=1");
    $hasil_get_point=mysqli_query($con,$sql_get_point);
    foreach ($hasil_get_point as $row) {
    	$data[] = $row;
    }
    print json_encode($data);

    // while ($row_point=mysqli_fetch_array($hasil_get_point)) {
      // $point_x=$row_point['x_point'];
      // $point_y=$row_point['y_point'];
      // $cluster=$row_point['cluster_num'];
      // echo "No $no. $point_x = $point_y = Cluster = $cluster <br>";
      // $no++;
    // }
  // }
?>
