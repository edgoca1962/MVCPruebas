<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Tienda Virtual">
    <!-- Twitter meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Edwin González">
    <meta name="theme-color" content="#009688">
    <link rel="shorcut icon" href="<?= SERVERURL; ?>recursos/imagen/logo.png">
    <title><?= $parametros['page_tag']; ?></title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>recursos/css/main.css">
    <script src="<?php echo SERVERURL; ?>Recursos/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>Recursos/css/sweetalert2.min.css" id="theme-styles">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?= SERVERURL; ?>Tablero" <a>Tienda Virtual</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="<?= SERVERURL; ?>Opciones"><i class="fa fa-cog fa-lg"></i> Opciones</a></li>
                    <li><a class="dropdown-item" href="<?= SERVERURL; ?>Perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                    <li><a class="dropdown-item" href="<?= SERVERURL; ?>Salir"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- User Menu-->
    <?php include('Vista/Plantilla/Nav_admin.php') ?>