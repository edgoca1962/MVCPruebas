<?php
	class Cliente_Modelo extends Conexion_Libreria {
		private $id;
		private $ClienteDNI;
		private $ClienteNombre;
		private $ClienteApellido;
		private $ClienteTelefono;
		private $ClienteOcupacion;
		private $ClienteDireccion;
		private $CuentaCodigo;
		private $sql;
		public function __construct(){
			$this->id = NULL;
			$this->ClienteDNI = NULL;
			$this->ClienteNombre = NULL;
			$this->ClienteApellido = NULL;
			$this->ClienteTelefono = NULL;
			$this->ClienteOcupacion = NULL;
			$this->ClienteDireccion = NULL;
			$this->CuentaCodigo = NULL;
			$this->sql = NULL;
		}
		protected function set_atributo($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		protected function get_atributo($atributo){
			return $this->$atributo;
		}
	    protected function consulta_cliente_modelo($atributo, $contenido){
			$this->sql=self::conectar_base_datos()->prepare("SELECT * FROM cliente WHERE $atributo = :contenido");
			$this->$atributo = $this->get_atributo($atributo);
			$this->sql->bindParam(":contenido", $this->$atributo);
			$this->sql->execute();
			return $this->sql;			
	    }
	    protected function eliminar_cliente_modelo() {
			$this->sql=self::conectar_base_datos()->prepare("DELETE FROM cliente WHERE id = :id");
			$this->CuentaCodigo = $this->get_atributo("id");
			$this->sql->bindParam(":id",$this->id);
			$this->sql->execute();
			return $this->sql;
	    }
		protected function agregar_administrador_modelo(){
			$this->sql = self::conectar_base_datos()->prepare("INSERT INTO cliente(ClienteDNI,ClienteNombre,ClienteApellido,ClienteTelefono,ClienteOcupacion,ClienteDireccion,CuentaCodigo) VALUES(:DNI,:Nombre,:Apellido,:Telefono,:Ocupacion,:Direccion,:Codigo)");
			$this->ClienteDNI = $this->get_atributo("ClienteDNI");
			$this->ClienteNombre = $this->get_atributo("ClienteNombre");
			$this->ClienteApellido = $this->get_atributo("ClienteApellido");
			$this->ClienteTelefono = $this->get_atributo("ClienteTelefono");
			$this->ClienteOcupacion = $this->get_atributo("ClienteOcupacion");
			$this->ClienteDireccion = $this->get_atributo("ClienteDireccion");
			$this->CuentaCodigo = $this->get_atributo("CuentaCodigo");
			$this->sql->bindParam(":DNI",$this->ClienteDNi);
			$this->sql->bindParam(":Nombre",$this->ClienteNombre);
			$this->sql->bindParam(":Apellido",$this->ClienteApellido);
			$this->sql->bindParam(":Telefono",$this->ClienteTelefono);
			$this->sql->bindParam(":Ocupacion",$this->ClienteOcupacion);
			$this->sql->bindParam(":Direccion",$this->ClienteDireccion);
			$this->sql->bindParam(":Codigo",$this->CuentaCodigo);
			$this->sql->execute();
			return $this->sql;
		}
	}