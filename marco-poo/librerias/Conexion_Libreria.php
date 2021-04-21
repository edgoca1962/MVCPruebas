<?php
	class Conexion_Libreria{
		private $servidor;
		private $BaseDatos;
		private $usuario;
		private $clave;
		private $sgbd;
	 	private $conexion;
	 	private $datos;
    	private $numeroAleatorio;

	 	public function __construct(){
			$this->servidor = NULL;
			$this->BaseDatos = NULL;
			$this->usuario = NULL;
			$this->clave = NULL;
			$this->sgbd = NULL;
		 	$this->conexion = NULL;
		 	$this->datos = NULL;
		 	$this->numeroAleatorio = NULL;
	 	}
		protected function conectar_base_datos(){
			$this->servidor = "localhost";
			$this->BaseDatos = "BibliotecaPublica";
			$this->usuario = "root";
			$this->clave = "root";
			$this->sgbd = "mysql:host=" . $this->servidor . ";dbname=" . $this->BaseDatos . ";charset=utf8";	
			try {
				$this->conexion = new PDO($this->sgbd, $this->usuario, $this->clave);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
			return $this->conexion;
		}
		protected function conexion_consulta_simple($tabla){
			$this->sql=self::conectar_base_datos()->prepare("SELECT * FROM $tabla");
			$this->sql->execute();
			return $this->sql;			
		}
	    protected function genera_codigo_aleatorio($letra, $longitud){
	      for($i=1; $i<=$longitud; $i++){
	        $this->numeroAleatorio = rand(0,9);
	        $letra .= $this->numeroAleatorio;
	      }
	      return $letra;
	    }
	    protected function limpiar_cadena($cadena){
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