<?php
	class Libro_Modelo extends Conexion_Libreria {
		private $id;
		private $LibroCodigo;
		private $LibroTitulo;
		private $LibroAutor;
		private $LibroPais;
		private $LibroYear;
		private $LibroEditorial;
		private $LibroEdicion;
		private $LibroPrecio;
		private $LibroStock;
		private $LibroUbicacion;
		private $LibroResumen;
		private $LibroImagen;
		private $LibroPDF;
		private $LibroDescarga;
		private $CategoriaCodigo;
		private $ProveedorCodigo;
		private $EmpresaCodigo;
		private $sql;
		public function __construct(){
			$this->id = NULL;
			$this->LibroTitulo = NULL;
			$this->LibroAutor = NULL;
			$this->LibroPais = NULL;
			$this->LibroYear = NULL;
			$this->LibroEditorial = NULL;
			$this->LibroEdicion = NULL;
			$this->LibroCodigo = NULL;
			$this->LibroPrecio = NULL;
			$this->LibroStock = NULL;
			$this->LibroUbicacion = NULL;
			$this->LibroResumen = NULL;
			$this->LibroImagen = NULL;
			$this->LibroPDF = NULL;
			$this->LibroDescarga = NULL;
			$this->CategoriaCodigo = NULL;
			$this->ProveedorCodigo = NULL;
			$this->EmpresaCodigo = NULL;
			$this->sql = NULL;
		}
		protected function set_atributo($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		protected function get_atributo($atributo){
			return $this->$atributo;
		}
	    protected function consulta_libro_modelo($atributo, $contenido){
			$this->sql=self::conectar_base_datos()->prepare("SELECT * FROM libro WHERE $atributo = :contenido");
			$this->$atributo = $this->get_atributo($atributo);
			$this->sql->bindParam(":contenido", $this->$atributo);
			$this->sql->execute();
			return $this->sql;			
	    }
	    protected function eliminar_libro_modelo() {
			$this->sql=self::conectar_base_datos()->prepare("DELETE FROM libro WHERE id = :id");
			$this->LibroCodigo = $this->get_atributo("id");
			$this->sql->bindParam(":id",$this->id);
			$this->sql->execute();
			return $this->sql;
	    }
		protected function agregar_cuenta_modelo(){
			$this->sql = self::conectar_base_datos()->prepare("INSERT INTO libro(LibroCodigo,LibroTitulo,LibroAutor,LibroPais,LibroYear,LibroEditorial,LibroEdicion,LibroPrecio,LibroStock,LibroUbicacion,LibroResumen,LibroImagen,LibroPDF,LibroDescarga,CategoriaCodigo,ProveedorCodigo,EmpresaCodigo) VALUES(:Codigo:Titulo,:Autor,:Pais,:Year,:Editorial,:Edicion,:Precio,:Stock;:Ubicacion,:Resumen,:Imagen,:PDF,:Descarga,:Categoria,:Proveedor,:Empresa)");
			$this->LibroCodigo = $this->get_atributo("LibroCodigo");
			$this->LibroTitulo = $this->get_atributo("LibroTitulo");
			$this->LibroAutor = $this->get_atributo("LibroAutor");
			$this->LibroPais = $this->get_atributo("LibroPais");
			$this->LibroYear = $this->get_atributo("LibroYear");
			$this->LibroEditorial = $this->get_atributo("LibroEditorial");
			$this->LibroEdicion = $this->get_atributo("LibroEdicion");
			$this->LibroPrecio = $this->get_atributo("LibroPrecio");
			$this->LibroStock = $this->get_atributo("LibroStock");
			$this->LibroUbicacion = $this->get_atributo("LibroUbicacion");
			$this->LibroResumen = $this->get_atributo("LibroResumen");
			$this->LibroImagen = $this->get_atributo("LibroImagen");
			$this->LibroPDF = $this->get_atributo("LibroPDF");
			$this->LibroDescarga = $this->get_atributo("LibroDescarga");
			$this->CategoriaCodigo = $this->get_atributo("CategoriaCodigo");
			$this->ProveedorCodigo = $this->get_atributo("ProveedorCodigo");
			$this->EmpresaCodigo = $this->get_atributo("EmpresaCodigo");
			$this->sql->bindParam(":Codigo",$this->LibroCodigo);
			$this->sql->bindParam(":Titulo",$this->LibroTitulo);
			$this->sql->bindParam(":Autor",$this->LibroAutor);
			$this->sql->bindParam(":Pais",$this->LibroPais);
			$this->sql->bindParam(":Year",$this->LibroYear);
			$this->sql->bindParam(":Editoria",$this->LibroEditorial);
			$this->sql->bindParam(":Edicion",$this->LibroEdicion);
			$this->sql->bindParam(":Precio",$this->LibroPrecio);
			$this->sql->bindParam(":Stock",$this->LibroStock);
			$this->sql->bindParam(":Ubicacion",$this->LibroUbicacion);
			$this->sql->bindParam(":Resumen",$this->LibroResumen);
			$this->sql->bindParam(":Imagen",$this->LibroImagen);
			$this->sql->bindParam(":PDF",$this->LibroPDF);
			$this->sql->bindParam(":Descarga",$this->LibroDescarga);
			$this->sql->bindParam(":Categoria",$this->CategoriaCodigo);
			$this->sql->bindParam(":Proveedor",$this->ProveedorCodigo);
			$this->sql->bindParam(":Empresa",$this->EmpresaCodigo);
			$this->sql->execute();
			return $this->sql;
		}
	}