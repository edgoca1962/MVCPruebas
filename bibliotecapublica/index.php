<?php
	require_once "./core/configGeneral.php";
	require_once "./controladores/vistasControlador.php";

	$plantilla = new vistasControlador();
	$plantilla->obtener_plantilla_controlador();

	/**
	 * /Applications/MAMP/bin/php/php7.3.8/conf/php.ini
	 */