<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title>DBScan</title>
     <?php require_once 'template/head.php'; ?>
   </head>
   <body>
      <div id="wrapper">
         <?php require_once 'template/navbar.php'; ?>
         <div id="page-wrapper">
            <!-- START -->
            <?php
            require_once 'setting/koneksi.php';
                if (!isset($_GET['d']) && !isset($_GET['p']) && !isset($_GET['kode'])) {
                    include ('master/index.php');
                } elseif (isset($_GET['kode'])) {
                  if ($_GET['kode']=="data_kingdom") {
                    require_once 'master/data/kingdom.php';
                  }
                  else {
                    if (!isset($_GET['d'])) {
                      $page = $_GET['p'];
                      $location = $page . ".php";
                    }else {
                      $page = $_GET['p'];
                      $dir = $_GET['d'];
                      $location = $dir . '/' . $page . ".php";
                    }
                    if (file_exists($location)) {
                      include $location;
                    } else {
                      include ('master/index.php');
                    }
                    // require_once 'master/data/kingdom.php';
                  }
                }
                else {
                  if (!isset($_GET['d'])) {
                    $page = $_GET['p'];
                    $location = $page . ".php";
                  }else {
                    $page = $_GET['p'];
                    $dir = $_GET['d'];
                    $location = $dir . '/' . $page . ".php";
                  }
                  if (file_exists($location)) {
                    include $location;
                  } else {
                    include ('master/index.php');
                  }
                  // require_once 'master/data/kingdom.php';
                }
             ?>
            <!-- END -->
         </div>
         </div>
      <?php require_once 'template/script.php'; ?>
      <?php require_once 'template/footer.php'; ?>
   </body>
</html>
