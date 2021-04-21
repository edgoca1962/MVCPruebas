<?php 
	date_default_timezone_set ("America/Costa_Rica");
	const SERVERURL = "http://localhost:8888/poo-frw/";
	const COMPANY = "PHP Marco POO";
	class ManejoClases{
		private $sufijo;
		private $directorio;
		private $ruta;
		public function ManejoClases(){
			spl_autoload_register(array($this,'cargarClase'));
		}
		function cargarClase($nombreClase){
			$this->sufijo = strtolower( substr( $nombreClase,strlen(trim($nombreClase)) - 3, 3 ));
			switch ($this->sufijo) {
				case 'ajx':
					$this->directorio = "./ajax/";
					break;
				case 'ctl':
					$this->directorio = "./controlador/";
					break;
				case 'etd':
					$this->directorio = "./entidad/";
					break;
				case 'mdl':
					$this->directorio = "./modelo/";
					break;
				case 'vta':
					$this->directorio = "./vista/";
					break;
				case 'lib':
					$this->directorio = "./libreria/";
					break;
				default:
					// require_once "./vista/contenidos/login-view.php"
					break;
			}		
			$this->ruta = $this->directorio . $nombreClase . ".php";
			require_once $this->ruta;
		}
	}
