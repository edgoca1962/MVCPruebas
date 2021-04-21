<?php
class AdministradorModelo extends Base
{
	private $id;
	private $AdminDNI;
	private $AdminNombre;
	private $AdminApellido;
	private $AdminTelefono;
	private $AdminDireccion;
	private $CuentaCodigo;
	private $sql;
	public function __construct()
	{
		$this->conexion = NULL;
		$this->id = NULL;
		$this->AdminDNI = NULL;
		$this->AdminNombre = NULL;
		$this->AdminApellido = NULL;
		$this->AdminTelefono = NULL;
		$this->AdminDireccion = NULL;
		$this->CuentaCodigo = NULL;
		$this->sql = NULL;
		parent::__construct();
	}
	protected function set_atributo($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}
	protected function get_atributo($atributo)
	{
		return $this->$atributo;
	}
	protected function consulta_administrador_modelo($atributo, $contenido)
	{
		$this->sql = self::conectar_base_datos()->prepare("SELECT * FROM admin WHERE $atributo = :contenido");
		$this->$atributo = $this->get_atributo($atributo);
		$this->sql->bindParam(":contenido", $this->$atributo);
		$this->sql->execute();
		return $this->sql;
	}
	protected function eliminar_administrador_modelo()
	{
		$this->sql = self::conectar_base_datos()->prepare("DELETE FROM admin WHERE id = :id");
		$this->CuentaCodigo = $this->get_atributo("id");
		$this->sql->bindParam(":id", $this->id);
		$this->sql->execute();
		return $this->sql;
	}
	protected function agregar_administrador_modelo()
	{
		$this->sql = self::conectar_base_datos()->prepare("INSERT INTO admin(AdminDNI,AdminNombre,AdminApellido,AdminTelefono,AdminDireccion,CuentaCodigo) VALUES(:DNI,:Nombre,:Apellido,:Telefono,:Direccion,:Codigo)");
		$this->AdminDNI = $this->get_atributo("AdminDNI");
		$this->AdminNombre = $this->get_atributo("AdminNombre");
		$this->AdminApellido = $this->get_atributo("AdminApellido");
		$this->AdminTelefono = $this->get_atributo("AdminTelefono");
		$this->AdminDireccion = $this->get_atributo("AdminDireccion");
		$this->CuentaCodigo = $this->get_atributo("CuentaCodigo");
		$this->sql->bindParam(":DNI", $this->AdminDNi);
		$this->sql->bindParam(":Nombre", $this->AdminNombre);
		$this->sql->bindParam(":Apellido", $this->AdminApellido);
		$this->sql->bindParam(":Telefono", $this->AdminTelefono);
		$this->sql->bindParam(":Direccion", $this->AdminDireccion);
		$this->sql->bindParam(":Codigo", $this->CuentaCodigo);
		$this->sql->execute();
		return $this->sql;
	}
}
