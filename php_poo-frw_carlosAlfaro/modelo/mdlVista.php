<?php
	require_once "./entidad/etdVista.php";
	class mdlVista extends etdVista {
		private $listaBlanca;
		protected function mdlVista(){
			$this->listaBlanca = [];
		}
		protected function vista_modelo($vistas){
			$this->listaBlanca = ["adminlist","adminsearch","admin","book","bookconfig","bookinfo","catalog","category","categorylist","client","clientlist","clientsearch","company","companylist","home","myaccount","mydata","provider","providerlist","search"];
			if(in_array($vistas, $this->listaBlanca)){
				if(is_file("./vista/contenidos/" . $vistas . "-view.php")){
					etdVista::setContenido($vistas);
				}else{
					etdVista::setContenido("login");
				}
			}elseif($vistas == "login"){
				etdVista::setContenido("login");
			}elseif($vistas == "index"){
				etdVista::setContenido("login");
			}else{
				etdVista::setContenido("404");
			}
			return etdVista::getContenido();
		}
	}