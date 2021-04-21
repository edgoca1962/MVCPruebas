<?php
	class Mensajes_Libreria{
		private $tipoMensaje;
		private $titulo;
		private $texto;
		private $tipoAlerta;
		private $alerta;
		public function __construct(){
			$this->tipoMensaje = NULL;
			$this->titulo = NULL;
			$this->texto = NULL;
			$this->tipoAlerta = NULL;
			$this->alerta = NULL;
		}
		public function set_atributo($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		public function get_atributo($atributo){
			return $this->$atributo;
		}

	    public function procesa_mensaje(){
	    	$this->tipoMensaje = self::get_atributo("tipoMensaje");
	    	$this->titulo = self::get_atributo("titulo");
	    	$this->texto = self::get_atributo("texto");
	    	$this->tipoAlerta = self::get_atributo("tipoAlerta");
	      if ($this->tipoMensaje == "simple") {
	        $this->alerta="
	          <script>
	            swal(
	              '".$this->titulo."',
	              '".$this->texto."',
	              '".$this->tipoAlerta."'
	            );
	          </script>
	        ";
	      } elseif ($this->tipoMensaje == "recargar") {
	        $this->alerta="
	          <script>
	            swal({
	              title: '".$this->titulo."',
	              text: '".$this->texto."',
	              type: '".$this->tipoAlerta."',
	              confirmButtonText: 'Aceptar'
	            }).then(function(){
	              location.reload();
	            });
	          </script>
	        ";
	      } elseif ($this->tipoMensaje == "limpiar") {
	        $this->alerta="
	          <script>
	            swal({
	              title: '".$this->titulo."',
	              text: '".$this->texto."',
	              type: '".$this->tipoAlerta."',
	              confirmButtonText: 'Aceptar'
	            }).then(function(){
	              $('.FormularioAjax')[0].reset();
	            });
	            </script>
	        ";
	      }
	      return $this->alerta;
	    }
	}
