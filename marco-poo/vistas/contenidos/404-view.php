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
	<div class="full-box cover container-404">
	  <div>
	    <p class="text-center"><i class="zmdi zmdi-mood-bad zmdi-hc-5x"></i></p>
	    <h1 class="text-center">ERROR 404</h1>
	    <p class="lead text-center">Página no encontrada</p>
	  </div>
	</div>	
	</section>
	<script src="<?php echo SERVERURL; ?>recursos/js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>