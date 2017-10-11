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
						<form class="form-horizontal" action="app\get.php" method="post">
								<div class="container-fluid">
									<div class="form-group">
										<label for="eps">Eps : </label>
										<input type="number" class="form-control" name="eps" min="0" required autofocus onkeypress="return isNumberKey(event)">
									</div>
									<div class="form-group">
										<label for="minpts">MinPts : </label>
										<input type="number" class="form-control" name="minpts" min="0" required autofocus onkeypress="return isNumberKey(event)">
									</div>
									<div class="form-group">
										<label for="dtp_input1" class="control-label">Start Date :</label>
                  	<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                      	<input class="form-control" size="16" type="text" value="" readonly>
                      	<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
  					          	<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                  	</div>
  				        	<input type="hidden" name="start" id="dtp_input1" value=""/>
									</div>
									<div class="form-group">
										<label for="dtp_input2" class="control-label">End Date :</label>
                  	<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input2">
                      	<input class="form-control" size="16" type="text" value="" readonly>
                      	<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
  					          	<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                  	</div>
  				        	<input type="hidden" name="end" id="dtp_input2" value=""/>
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
						<form class="form-horizontal" action="app\csv_import.php" method="post" enctype="multipart/form-data">
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
<script>
	function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;
			return true;
	}
</script>
