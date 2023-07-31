<?php 
    
    include '../config/base.php';
    

?>


  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong><a href="<?= $base_url; ?>">Kalvari Sarpas </a>Copyright <?= date("Y");?>&copy;</strong>
    <div class="float-left d-none d-sm-inline-block">
      <b>Version</b> 0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $base_url;?>assets/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?= $base_url;?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= $base_url;?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= $base_url;?>assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src="<?= $base_url;?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= $base_url;?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= $base_url;?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= $base_url;?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $base_url;?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= $base_url;?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= $base_url;?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $base_url;?>assets/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= $base_url;?>assets/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= $base_url;?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= $base_url;?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $base_url;?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= $base_url;?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
       "responsive": true, "lengthChange": true, "autoWidth": true, "scrollCollapse": true, "scrollY": '58vh',
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "info": true,
      "responsive": true,
     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper col-md-6:eq(0)');
    });
</script>
<script type="text/javascript">
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'primary',
        title: 'Data Berhasil disimpan'
      })
    });
    });
</script>
</body>
</html>
