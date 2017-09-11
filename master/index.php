<?php
	require_once 'setting\koneksi.php';
?>
<head>
	<title>DBScan</title>
</head>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><i class="fa fa-dashboard"></i> Dashboard</h1>
	</div>
</div>
	<div class="row">
		<!-- Row 1 -->
		<!-- Column 1 -->
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <label>Proses DBScan</label>
        </div>
          <div class="panel-body">
						<form class="form-horizontal" action="app\dbscan.php" method="post">
								<div class="container-fluid">
									<div class="form-group">
										<label for="eps">Eps : </label>
										<input type="text" class="form-control" name="eps" required autofocus>
									</div>
									<div class="form-group">
										<label for="minpts">MinPts : </label>
										<input type="text" class="form-control" name="minpts" required autofocus>
									</div>
								</div>
								<input class="btn btn-primary" type="submit" name="submit" value="Proses" autofocus>
							</form>
          </div>
      </div>
    </div>
		<!-- Column 1 -->
		<!-- Column 2 -->
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<label>Import CVS</label>
				</div>
					<div class="panel-body">
						<form class="form-horizontal" action="app\csv_import.php" method="post">
								<div class="container-fluid">
									<div class="form-group">
                    <label for="csv">File CSV</label>
                    <input type="file" name="csv" required>
                  </div>
								</div>
								<input class="btn btn-primary" type="submit" name="submit" value="Proses" autofocus>
							</form>
					</div>
			</div>
		</div>
		<!-- Column 2 -->
		<!-- Row 1 -->
