<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 Maquetada</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/7a591c4a95.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= SERVERURL; ?>vista/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= SERVERURL; ?>vista/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= SERVERURL; ?>vista/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= SERVERURL; ?>vista/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= SERVERURL; ?>vista/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= SERVERURL; ?>vista/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= SERVERURL; ?>vista/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Formatos para pantalla ingreso -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link rel="stylesheet" href="<?= SERVERURL; ?>vista/dist/css/Ingreso.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <?php
        $modulo = new CoreLibreria;
        $contenido = $modulo->getContenido();
        $mensaje = $modulo->getMensaje();
        include_once "./vista/contenidos/" . $contenido . ".php";
        ?>
        <div> <?= $mensaje; ?> </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- jQuery -->
  <script src="<?= SERVERURL; ?>vista/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= SERVERURL; ?>vista/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= SERVERURL; ?>vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= SERVERURL; ?>vista/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= SERVERURL; ?>vista/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= SERVERURL; ?>vista/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= SERVERURL; ?>vista/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= SERVERURL; ?>vista/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= SERVERURL; ?>vista/plugins/moment/moment.min.js"></script>
  <script src="<?= SERVERURL; ?>vista/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= SERVERURL; ?>vista/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= SERVERURL; ?>vista/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= SERVERURL; ?>vista/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= SERVERURL; ?>vista/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= SERVERURL; ?>vista/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= SERVERURL; ?>vista/dist/js/demo.js"></script>
</body>

</html>