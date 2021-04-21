<?php
	require_once "./librerias/ManejoClases_Libreria.php";
	if (isset($_GET['Token'])) {
		$bitacora = new Bitacora_Controlador();
		echo $bitacora->bitacora_cierre_session_controlador();
	} else {
		session_start();
		session_destroy();
		echo '<script> window.location.href="' . SERVERURL . 'login/" </script>';
	}
?>