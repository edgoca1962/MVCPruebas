<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>vista/css/main.css">
    <!--===== Scripts -->
    <script src="<?php echo SERVERURL; ?>vista/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo SERVERURL; ?>vista/js/sweetalert2.min.js"></script>
    <script src="<?php echo SERVERURL; ?>vista/js/bootstrap.min.js"></script>
    <script src="<?php echo SERVERURL; ?>vista/js/material.min.js"></script>
    <script src="<?php echo SERVERURL; ?>vista/js/ripples.min.js"></script>
    <script src="<?php echo SERVERURL; ?>vista/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>

<body>
    <style>
        #inicio {
            background-color: gray;
        }
    </style>
    <div class="full-box login-container cover" id="inicio">
        <form action="" method="POST" autocomplete="off" class="logInForm">
            <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
            <!-- <div class="img-div"><img src="././recursos/assets/img/semilla.jpg" id="img-semilla"></div> -->
            <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
            <div class="form-group label-floating">
                <label class="control-label" for="UserName">Usuario</label>
                <input required="" class="form-control" id="UserName" name="usuario" type="text" style="color: #FFF;">
                <p class="help-block">Escribe el usuario</p>
            </div>
            <div class="form-group label-floating">
                <label class="control-label" for="UserPass">Contraseña</label>
                <input required="" class="form-control" id="UserPass" name="clave" type="password" style="color: #FFF;">
                <p class="help-block">Escribe la contraseña</p>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
            </div>
        </form>
    </div>
    <script src="<?php echo SERVERURL; ?>vista/js/main.js"></script>
    <script>
        $.material.init();
    </script>
</body>

</html>