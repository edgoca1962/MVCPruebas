<?php
	class mdlConexion{
	 	private $conexion;
	 	private $datos;
		public function mdlConexion(){
			try {
				$this->conexion = new PDO(SGBD, USER, PASS);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
			return $this->baseDatos;
		}
		public function set_datos(){
			$this->datos = $this->conexion->prepare($sql);
			$this->datos->execute();
		}
		public function get_datos($sql){
			$this->datos = $this->conexion->prepare($sql);
			return $this->datos->execute();
		}
	}