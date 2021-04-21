<?php
	require_once "./modelos/vistasModelo.php";
	class vistasControlador extends vistasModelo{
		private $ruta;
		private $respuesta;
		public function obtener_plantilla_controlador(){
			return require_once "./vistas/plantilla.php";
		}
		public function obtener_vistas_controlador(){
			if(isset($_GET['views'])){
				$this->ruta=explode("/", $_GET['views']);
				$this->respuesta=vistasModelo::obtener_vistas_modelo($this->ruta[0]);
			}else{
				$this->respuesta="login";
			}
			return $this->respuesta;
		}
	}