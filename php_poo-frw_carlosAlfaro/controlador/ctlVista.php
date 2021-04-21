<?php
	require_once "./modelo/mdlVista.php";
	class ctlVista extends mdlVista {
		private $peticion;
		private $vista;
		public function ctlVista(){
			$this->peticion = "";
		}
		public function obtener_vistas_controlador(){
			if(isset($_GET['views'])){
				$this->peticion = explode("/", $_GET['views']);
				$this->vista = mdlVista::vista_modelo($this->peticion[0]);
			}else{
				$this->vista = "login";
			}
			return $this->vista;
		}
	}