<?php
$plantilla = new Plantilla;
$controlador = $plantilla->get_atributo('nombre_controlador');
$metodo = $plantilla->get_atributo('metodo');
$parametros = $plantilla->get_atributo('parametros');
$controlador = new $controlador;
$controlador->{$metodo}($parametros);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $plantilla->get_atributo('ruta_css') . 'adminlte.min.css'; ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7a591c4a95.js" crossorigin="anonymous"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>Título</title>

</head>

<body class="hold-transition sidebar-mini">

    <!-- Main content -->
    <?php include "vistas/contenidos/" . $controlador->get_atributo('vista'); ?>
    <!-- /.content -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- JQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="<?= $plantilla->get_atributo("ruta_js") . 'adminlte.min.js'; ?>"></script>
    <!-- Porpios -->
    <script src="<?= $plantilla->get_atributo("ruta_js") . 'script.js'; ?>"></script>
    <script src="<?= $plantilla->get_atributo("ruta_js") . 'galeria_imagenes.js'; ?>"></script>
</body>

</html>