<?php
	/*
	Mapea la url ingresada:
	1. Controlador
	2. Metodo
	3. Parámetro
	 */
	class Core{
		protected $controladorActual = 'paginas';
		protected $metodoActual = 'index';
		protected $parametros = [];

		public function __construct(){
			$url = $this->getUrl();
			if(file_exists('../app/controladores/' . ucwords($url[0]) . '.php')) {
				$this->controladorActual = ucwords($url[0]);
				unset($url[0]);
			}
			require_once '../app/controladores/' . $this->controladorActual . '.php';
			$this->controladorActual = new $this->controladorActual;
			
			if (isset($url[1])) {				
				if (method_exists($this->controladorActual, $url[1])) {
					$this->metodoActual = $url[1];
					unset($url[1]);
				}
			}
			$this->parametros = $url ? array_values($url) : [];
			call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
		}

		public function getUrl(){
			//echo $_GET['url'];
			if (isset($_GET['url'])) {
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}