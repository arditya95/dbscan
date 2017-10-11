<!-- jQuery Bootgrid-->
<!-- <script src="dist/bootgrid/jquery.bootgrid.fa.min.js" charset="utf-8"></script> -->
<!-- <script src="dist/bootgrid/jquery.bootgrid.min.js" charset="utf-8"></script> -->
<!-- jQuery -->
<script src="dist/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="dist/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap-datetimepicker -->
<script type="text/javascript" src="dist\bootstrap-datetimepicker\js\bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="dist\bootstrap-datetimepicker\js\locales\bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="dist/metisMenu/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="dist/bootstrap/js/sb-admin-2.js"></script>
 <!-- DataTables JavaScript -->
<script src="dist/datatables/js/jquery.dataTables.min.js"></script>
<script src="dist/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="dist/datatables-responsive/dataTables.responsive.js"></script>
<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
  $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
    });
</script>

<script>
  var muncul = 0;
  var formData = document.getElementById('form-data');
  $(document).ready(function() {
      $('#dataTables').DataTable({
          responsive: true
      });
  });
</script>
