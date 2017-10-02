<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <label>Data Point</label>
  </div>
  <div class="panel-body">
      <table id="dataTables" class="table table-striped table-bordered table-hover">
        <thead>
          <th style="text-align:center;" class="text-uppercase">No</th>
          <th style="text-align:center;" class="text-uppercase">Point X</th>
          <th style="text-align:center;" class="text-uppercase">Point Y</th>
        </thead>
          <tbody class="table table-striped table-bordered table-hover">
            <?php
              // include_once '../../../setting/koneksi.php';
              $no=1;
              $query = "SELECT * FROM tmp;";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:center;'>$row[x_point]</td>
                   <td style='text-align:center;'>$row[y_point]</td>
                </tr>
                ";
                $no++;
              }
            ?>
          </tbody>
      </table>
  </div>
</div>
<!-- Animalia -->
