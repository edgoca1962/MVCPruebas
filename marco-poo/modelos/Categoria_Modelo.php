<?php
	class Categoria_Modelo extends Conexion_Libreria {
		private $id;
		private $CategoriaCodigo;
		private $CategoriaNombre;
		private $sql;
		public function __construct(){
			$this->id = NULL;
			$this->CategoriaCodigo = NULL;
			$this->CategoriaNombre = NULL;
		}
		protected function set_atributo($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		protected function get_atributo($atributo){
			return $this->$atributo;
		}
	    protected function consulta_categoria_modelo($atributo, $contenido){
			$this->sql=self::conectar_base_datos()->prepare("SELECT * FROM categoria WHERE $atributo = :contenido");
			$this->$atributo = $this->get_atributo($atributo);
			$this->sql->bindParam(":contenido", $this->$atributo);
			$this->sql->execute();
			return $this->sql;			
	    }
	    protected function eliminar_categoria_modelo() {
			$this->sql=self::conectar_base_datos()->prepare("DELETE FROM categoria WHERE id = :id");
			$this->CuentaCodigo = $this->get_atributo("id");
			$this->sql->bindParam(":id",$this->id);
			$this->sql->execute();
			return $this->sql;
	    }
		protected function agregar_categoria_modelo(){
			$this->sql = self::conectar_base_datos()->prepare("INSERT INTO categoria(CategoriaCodigo,CategoriaNombre) VALUES(:Codigo, :Nombre)");
			$this->CategoriaCodigo = $this->get_atributo("CategoriaCodigo");
			$this->CategoriaNombre = $this->get_atributo("CategoriaNombre");
			$this->sql->bindParam(":Codigo",$this->CategoriaCodigo);
			$this->sql->bindParam(":Nombre",$this->CategoriaNombre);
			$this->sql->execute();
			return $this->sql;
		}
	}