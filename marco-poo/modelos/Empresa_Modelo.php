<?php
	class Empresa_Modelo extends Conexion_Libreria {
		private $id;
		private $EmpresaCodigo;
		private $EmpresaNombre;
		private $EmpresaTelefono;
		private $EmpresaEmail;
		private $EmpresaDireccion;
		private $EmpresaDirector;
		private $EmpresaMoneda;
		private $EmpresaYear;
		private $sql;
		public function __construct(){
			$this->id = NULL;
			$this->EmpresaCodigo = NULL;
			$this->EmpresaNombre = NULL;
			$this->EmpresaTelefono = NULL;
			$this->EmpresaEmail = NULL;
			$this->EmpresaDireccion = NULL;
			$this->EmpresaDirector = NULL;
			$this->EmpresaMoneda = NULL;
			$this->EmpresaYear = NULL;
			$this->sql = NULL;
		}
		protected function set_atributo($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		protected function get_atributo($atributo){
			return $this->$atributo;
		}
	    protected function consulta_empresa_modelo($atributo, $contenido){
			$this->sql=self::conectar_base_datos()->prepare("SELECT * FROM empresa WHERE $atributo = :contenido");
			$this->$atributo = $this->get_atributo($atributo);
			$this->sql->bindParam(":contenido", $this->$atributo);
			$this->sql->execute();
			return $this->sql;			
	    }
	    protected function eliminar_empresa_modelo() {
			$this->sql=self::conectar_base_datos()->prepare("DELETE FROM empresa WHERE id = :id");
			$this->EmpresaCodigo = $this->get_atributo("id");
			$this->sql->bindParam(":id",$this->id);
			$this->sql->execute();
			return $this->sql;
	    }
		protected function agregar_empresa_modelo(){
			$this->sql = self::conectar_base_datos()->prepare("INSERT INTO empresa(EmpresaCodigo,EmpresaNombre,EmpresaTelefono,EmpresaEmail,EmpresaDireccion,EmpresaDirector,EmpresaMoneda,EmpresaYear) VALUES(:Codigo:Nombre,:Telefono,:Email,:Direccion,:Director,:Moneda,:Year)");
			$this->EmpresaCodigo = $this->get_atributo("EmpresaCodigo");
			$this->EmpresaNombre = $this->get_atributo("EmpresaNombre");
			$this->EmpresaTelefono = $this->get_atributo("EmpresaTelefono");
			$this->EmpresaEmail = $this->get_atributo("EmpresaEmail");
			$this->EmpresaDireccion = $this->get_atributo("EmpresaDireccion");
			$this->EmpresaDirector = $this->get_atributo("EmpresaDirector");
			$this->EmpresaMoneda = $this->get_atributo("EmpresaMoneda");
			$this->EmpresaMoneda = $this->get_atributo("EmpresaYear");
			$this->sql->bindParam(":Codigo",$this->EmpresaCodigo);
			$this->sql->bindParam(":Nombre",$this->EmpresaNombre);
			$this->sql->bindParam(":Telefono",$this->EmpresaTelefono);
			$this->sql->bindParam(":Email",$this->EmpresaEmail);
			$this->sql->bindParam(":Direccion",$this->EmpresaDireccion);
			$this->sql->bindParam(":Director",$this->EmpresaDirector);
			$this->sql->bindParam(":Moneda",$this->EmpresaMoneda);
			$this->sql->bindParam(":Year",$this->EmpresaYear);
			$this->sql->execute();
			return $this->sql;
		}		
	}