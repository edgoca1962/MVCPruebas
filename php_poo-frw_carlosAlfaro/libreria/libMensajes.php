<?php
	class libMensajes{
		private $alerta;
	    public function libMensajes($datos){
	      if ($datos['Alerta']=="simple") {
	        $this->alerta="
	          <script>
	            swal(
	              '".$datos['Titulo']."',
	              '".$datos['Texto']."',
	              '".$datos['Tipo']."'
	            );
	          </script>
	        ";
	      } elseif ($datos['Alerta']=="recargar") {
	        $this->alerta="
	          <script>
	            swal({
	              title: '".$datos['Titulo']."',
	              text: '".$datos['Texto']."',
	              type: '".$datos['Tipo']."',
	              confirmButtonText: 'Aceptar'
	            }).then(function(){
	              location.reload();
	            });
	          </script>
	        ";
	      } elseif ($datos['Alerta']=="limpiar") {
	        $this->alerta="
	          <script>
	            swal({
	              title: '".$datos['Titulo']."',
	              text: '".$datos['Texto']."',
	              type: '".$datos['Tipo']."',
	              confirmButtonText: 'Aceptar'
	            }).then(function(){
	              $('.FormularioAjax')[0].reset();
	            });
	            </script>
	        ";
	      }
	      echo $this->alerta;
	    }
	}
