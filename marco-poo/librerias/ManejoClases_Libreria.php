<?php 
	date_default_timezone_set ("America/Costa_Rica");
	const SERVERURL = "http://localhost:8888/marco-poo/";
	const COMPANY = "PHP Marco POO";
	const DEBUG = 0;
	new ManejoClases_Libreria();
	class ManejoClases_Libreria{
		private $sufijo;
		private $directorio;
		private $ruta;
		public function __construct(){
			spl_autoload_register(array($this,'cargarClase'));
		}
		private function cargarClase($nombreClase){
			$this->sufijo = explode("_",$nombreClase);
			switch ($this->sufijo[1]) {
				case 'Ajax':
					$this->directorio = "./ajax/";
					break;
				case 'Controlador':
					$this->directorio = "./controladores/";
					break;
				case 'Entidad':
					$this->directorio = "./entidades/";
					break;
				case 'Modelo':
					$this->directorio = "./modelos/";
					break;
				case 'Vista':
					$this->directorio = "./vistas/";
					break;
				case 'Libreria':
					$this->directorio = "./librerias/";
					break;
				default:
					// require_once "./vista/contenidos/login-view.php"
					break;
			}		
			$this->ruta = $this->directorio . $nombreClase . ".php";
			if (file_exists($this->ruta)) {
				require_once $this->ruta;
			} else {
				echo "Archivo :" . $this->ruta . " no existe";
			}
		}
	}
