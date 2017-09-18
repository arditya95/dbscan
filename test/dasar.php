<?php
include_once "setting\koneksi.php";

// TODO: MinPts: minimal banyak items dalam suatu cluster
$MinPts=3;
//MinPts

// TODO: Eps: nilai untuk jarak antar-items yang menjadi dasar pembentukan neighborhood dari suatu titik item.
$Eps=1.8;
//Eps

// TODO: titik awal
$x_0=4.5;
$y_0=4.5;
// titik awal

// TODO: titik akhir
$x_1=2;
$y_1=6;
// titik akhir

// TODO: Euclidean Distance (hitung jarak antara 2 titik)
$point=pow(($x_1-$x_0),2)+pow(($y_1-$y_0),2);
echo "$point <br>";
echo(sqrt($point));
// Euclidean Distance
?>
