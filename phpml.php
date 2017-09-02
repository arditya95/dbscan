<?php
include 'vendor\autoload.php';
use Phpml\Classification\KNearestNeighbors;
use Phpml\Clustering\DBSCAN;

$samples = [[1, 1], [8, 7], [1, 2], [7, 8], [2, 1], [8, 9]];

$dbscan = new DBSCAN($epsilon = 2, $minSamples = 3);
$dbscan->cluster($samples);

 ?>
