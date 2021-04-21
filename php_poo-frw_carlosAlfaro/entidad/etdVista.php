<?php
	class etdVista{
		private $contenido;
		protected function etdVista(){
			$this->contenido = "";
		}
	    protected function getContenido(){
	        return $this->contenido;
	    }
	    protected function setContenido($contenido){
	        $this->contenido = $contenido;
	    }
	}