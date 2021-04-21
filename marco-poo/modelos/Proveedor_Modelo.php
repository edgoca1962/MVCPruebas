<?php
	class Proveedor_Modelo extends Conexion_Libreria {
		private $id;
		private $ProveedorCodigo;
		private $ProveedorNombre;
		private $ProveedorResponsable;
		private $ProveedorTelefono;
		private $ProveedorEmail;
		private $ProveedorDireccion;
		public function __construct(){
			$this->id = NULL;
			$this->ProveedorCodigo = NULL;
 			$this->ProveedorNombre = NULL;
			$this->ProveedorResponsable = NULL;
			$this->ProveedorTelefono = NULL;
			$this->ProveedorEmail = NULL;
			$this->ProveedorDireccion = NULL;
		}
		protected function set_atributo($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		protected function get_atributo($atributo){
			return $this->$atributo;
		}
	    protected function consulta_proveedor_modelo($atributo, $contenido){
			$this->sql=self::conectar_base_datos()->prepare("SELECT * FROM proveedor WHERE $atributo = :contenido");
			$this->$atributo = $this->get_atributo($atributo);
			$this->sql->bindParam(":contenido", $this->$atributo);
			$this->sql->execute();
			return $this->sql;			
	    }
	    protected function eliminar_proveedor_modelo() {
			$this->sql=self::conectar_base_datos()->prepare("DELETE FROM proveedor WHERE id = :id");
			$this->CuentaCodigo = $this->get_atributo("id");
			$this->sql->bindParam(":id",$this->id);
			$this->sql->execute();
			return $this->sql;
	    }
		protected function agregar_proveedor_modelo(){
			$this->sql = self::conectar_base_datos()->prepare("INSERT INTO proveedor(ProveedorCodigo,ProveedorNombre,ProveedorResponsable,ProveedorTelefono,ProveedorEmail,ProveedorDireccion) VALUES(:Codigo,:Nombre,:Responsable,:Telefono,:Email,:Direccion)");
			$this->ProveedorCodigo = $this->get_atributo("ProveedorCodigo");
			$this->ProveedorNombre = $this->get_atributo("ProveedorNombre");
			$this->ProveedorResponsable = $this->get_atributo("ProveedorResponsable");
			$this->ProveedorTelefono = $this->get_atributo("ProveedorTelefono");
			$this->ProveedorEmail = $this->get_atributo("ProveedorEmail");
			$this->ProveedorDireccion = $this->get_atributo("ProveedorDireccion");
			$this->sql->bindParam(":Codigo",$this->ProveedorCodigo);
			$this->sql->bindParam(":Nombre",$this->ProveedorNombre);
			$this->sql->bindParam(":Responsable",$this->ProveedorResponsable);
			$this->sql->bindParam(":Telefono",$this->ProveedorTelefono);
			$this->sql->bindParam(":Email",$this->ProveedorEmail);
			$this->sql->bindParam(":Direccion",$this->ProveedorDireccion);
			$this->sql->execute();
			return $this->sql;
		}
	}