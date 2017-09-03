<?php
header('Content-Type: application/json');
require_once 'vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;
use Phpml\Clustering\DBSCAN;
use Phpml\Clustering\KMeans;
// $samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
// $labels = ['a', 'a', 'a', 'b', 'b', 'b'];
//
// $classifier = new KNearestNeighbors();
// $classifier->train($samples, $labels);
//
// echo $classifier->predict([3, 2]);
// return 'b'

$samples = [[1, 8], [8, 7], [1, 2], [7, 8], [2, 1], [8, 9]];

$dbscan = new DBSCAN($epsilon = 2, $minSamples = 3);
$dbscan->cluster($samples);
print_r($dbscan->cluster($samples));
// return [0=>[[1, 1], ...], 1=>[[8, 7], ...]]
?>
