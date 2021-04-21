<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>recursos/css/main.css">
		<!--===== Scripts -->
	<?php include "./vista/modulos/script.php"; ?>
</head>
<body>
	<?php 
		$contenidoPlantilla = new ctlVista();
		$contenido = $contenidoPlantilla->obtener_vistas_controlador();
		if($contenido == "login" || $contenido == "404"):
			require_once "./vista/contenidos/" . $contenido . "-view.php"; 
		else:
	?>
	<!-- SideBar -->
	<?php include "./vista/modulos/navlateral.php"; ?>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">

		<!-- NavBar -->
		<?php include "./vista/modulos/navbar.php"; ?>
		
		<!-- Content page -->
		<?php require_once "./vista/contenidos/" . $contenido . "-view.php"; ?>
	</section>
	<?php endif; ?>
	<script src="<?php echo SERVERURL; ?>recursos/js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>