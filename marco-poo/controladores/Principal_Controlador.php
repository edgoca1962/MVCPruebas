<?php 
    class Principal_Controlador{
    	private $numeroAleatorio;
	    public function genera_codigo_aleatorio($letra, $longitud, $numero){
	      for($i=1; $i<=$longitud; $i++){
	        $this->numeroAleatorio = rand(0,9);
	        $letra .= $this->numeroAleatorio;
	      }
	      return $letra . $numero;
	    }
	    public function limpiar_cadena($cadena){
	      $cadena=trim($cadena);
	      $cadena=stripslashes($cadena);
	      $cadena=str_ireplace("<script>","",$cadena);
	      $cadena=str_ireplace("</script>","",$cadena);
	      $cadena=str_ireplace("<script src","",$cadena);
	      $cadena=str_ireplace("<script type=","",$cadena);
	      $cadena=str_ireplace("SELECT * FROM","",$cadena);
	      $cadena=str_ireplace("DELETE FROM","",$cadena);
	      $cadena=str_ireplace("INSERT INTO","",$cadena);
	      $cadena=str_ireplace("--","",$cadena);
	      $cadena=str_ireplace("^","",$cadena);
	      $cadena=str_ireplace("[","",$cadena);
	      $cadena=str_ireplace("]","",$cadena);
	      $cadena=str_ireplace("==","",$cadena);
	      $cadena=str_ireplace(";","",$cadena);
	      return $cadena;
	    }    	
    }
