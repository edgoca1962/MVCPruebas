<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>recursos/css/main.css">
		<!--===== Scripts -->
	<?php include "./vistas/modulos/script.php"; ?>
</head>
<body>
	<div class="full-box login-container cover">
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
	<script src="<?php echo SERVERURL; ?>recursos/js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
<?php 
	if (isset($_POST['usuario']) && isset($_POST['clave'])) {
		$cuenta = new Cuenta_Controlador();
		echo $cuenta->cuenta_iniciar_sesion_controlador();
	}
?>