<?php
include '../setting/koneksi.php';
$sql="SELECT * FROM tmp;";
$all_record=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($all_record)){
    // assumes dates are patterned 'yyyy-MM-dd hh:mm:ss'
    preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $row['x_point'], $match);
    $year = (int) $match[1];
    $month = (int) $match[2]; // convert to zero-index to match javascript's dates
    $day = (int) $match[3];
    $hours = (int) $match[4];
    $minutes = (int) $match[5];
    $seconds = (int) $match[6];
    echo "$year-$month-$day $hours:$minutes:$seconds <br>";
}
?>
