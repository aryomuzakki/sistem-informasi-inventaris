
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      Copyright &copy; 2021 <strong>DILo Medan</strong> | All rights reserved.
    </footer>
  
  </div>
  <!-- ./wrapper -->

  <style>
    .spinner {
      background-color: rgba(0, 0, 0, .6);
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      user-select: none;
      z-index: 1100;
    }
  </style>

  <div class="spinner">
    Sedang melakukan export . . .
    <i class="fas fa-spinner"></i>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
  
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url() ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables -->
  <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <!-- DataTables Responsive -->
  <script src="<?= base_url() ?>public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>public/dist/js/adminlte.js"></script>
  
  <!-- Sweet Alert -->
  <script src="<?= base_url() ?>public/plugins/sweetalert/js/sweetalert.min.js"></script>

  <!-- Toastr -->
  <script src="<?= base_url() ?>public/plugins/toastr/toastr.min.js"></script>

  <!-- Select2 -->
  <script src="<?= base_url() ?>public/plugins/select2/js/select2.full.min.js"></script>

  <!-- Chart JS -->
  <script type="text/javascript" src='<?=base_url('public/plugins/chart.js/Chart.min.js')?>'></script>

  <!-- page script -->
  <?php $this->load->view('theme/script') ?>

</body>

</html>