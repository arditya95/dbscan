<style media="screen">
table, th, td {
  border: 1px solid black;
}
</style>

<?php
// header('Content-Type: application/json');
require_once '../vendor/autoload.php';
require_once '../setting/koneksi.php';
use Phpml\Clustering\DBSCAN;
    $epsilon=2;
    $minSamples=3;
    // $count=0;
    $points=array();
    $sql="SELECT * FROM tmp;";
    $all_record=mysqli_query($con,$sql);
    while ($row = mysqli_fetch_array($all_record)){
      $array_point = array("x" => $row['x_point'], "y" => $row['y_point']);
      array_push($points, $array_point);
      // $count++;
    }
    $dbscan = new DBSCAN($epsilon, $minSamples);
    $data = $dbscan->cluster($points);
    // print_r($data
    $countlv1=1;
    foreach ($data as $data_lv1) {
      echo "<br> [CLUSTER] => $countlv1 <br>";
      echo "<table>
              <tbody>
                <tr>
                  <th>No</th>
                  <th>X</th>
                  <th>Y</th>
                </tr>";
      $countlv1++;
      $countlv2=0;
      // print_r($lv1_data);
      foreach ($data_lv1 as $data_lv2) {
        // print_r($data_lv2);
        // echo "<br> [TITIK] => $countlv2 <br>";
        $countlv2++;
        // echo "X => " . $data_lv2['x'] . "<br>";
        // echo "Y => " . $data_lv2['y'] . "<br>";
        echo "
        <tr>
          <td>$countlv2</td>
          <td>$data_lv2[x]</td>
          <td>$data_lv2[y]</td>
        </tr>
      ";
      }
    echo "
    </tbody>
  </table>";}
?>
