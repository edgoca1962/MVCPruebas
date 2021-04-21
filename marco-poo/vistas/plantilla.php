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
	<!-- SideBar -->
	<?php include "./vistas/modulos/navlateral.php"; ?>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">

		<!-- NavBar -->
		<?php include "./vistas/modulos/navbar.php"; ?>
		
		<!-- Content page -->
		<?php
			include "./vistas/contenidos/" . $contenido . "-view.php" 
		 ?>
	</section>
	<?php include "./vistas/modulos/logoutScript.php"; ?>
	<script src="<?php echo SERVERURL; ?>recursos/js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>