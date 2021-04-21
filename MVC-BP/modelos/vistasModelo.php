<?php
	class vistasModelo{
		private $listaBlanca;
		private $contenido;
		protected function obtener_vistas_modelo($vistas){
			$this->listaBlanca=["adminlist","adminsearch","admin","book","bookconfig","bookinfo","catalog","category","categorylist","client","clientlist","clientsearch","company","companylist","home","myaccount","mydata","provider","providerlist","search"];
			if(in_array($vistas, $this->listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$this->contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$this->contenido="login";
				}
			}elseif($vistas=="login"){
				$this->contenido="login";
			}elseif($vistas=="index"){
				$this->contenido="login";
			}else{
				$this->contenido="404";
			}
			return $this->contenido;
		}
	}
