<?php
class Cuenta_Modelo extends Conexion_Libreria
{
	private $id;
	private $CuentaCodigo;
	private $CuentaPrivilegio;
	private $CuentaUsuario;
	private $CuentaClave;
	private $CuentaEmail;
	private $CuentaEstado;
	private $CuentaTipo;
	private $CuentaGenero;
	private $CuentaFoto;
	private $sql;
	public function __construct()
	{
		$this->id = NULL;
		$this->CuentaPrivilegio = NULL;
		$this->CuentaUsuario = NULL;
		$this->CuentaClave = NULL;
		$this->CuentaEmail = NULL;
		$this->CuentaEstado = NULL;
		$this->CuentaTipo = NULL;
		$this->CuentaCodigo = NULL;
		$this->CuentaGenero = NULL;
		$this->CuentaFoto = NULL;
		$this->sql = NULL;
	}
	protected function set_atributo($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}
	protected function get_atributo($atributo)
	{
		return $this->$atributo;
	}
	protected function consulta_cuenta_modelo($atributo, $contenido)
	{
		$this->sql = self::conectar_base_datos()->prepare("SELECT * FROM cuenta WHERE $atributo = :contenido");
		$this->$atributo = $this->get_atributo($atributo);
		$this->sql->bindParam(":contenido", $this->$atributo);
		$this->sql->execute();
		return $this->sql;
	}
	protected function eliminar_cuenta_modelo()
	{
		$this->sql = self::conectar_base_datos()->prepare("DELETE FROM cuenta WHERE id = :id");
		$this->CuentaCodigo = $this->get_atributo("id");
		$this->sql->bindParam(":id", $this->id);
		$this->sql->execute();
		return $this->sql;
	}
	protected function agregar_cuenta_modelo()
	{
		$this->sql = self::conectar_base_datos()->prepare("INSERT INTO cuenta(CuentaCodigo,CuentaPrivilegio,CuentaUsuario,CuentaClave,CuentaEmail,CuentaEstado,CuentaTipo,CuentaGenero,CuentaFoto) VALUES(:Codigo:Privilegio,:Usuario,:Clave,:Email,:Estado,:Tipo,:Genero,:Foto)");
		$this->CuentaCodigo = $this->get_atributo("CuentaCodigo");
		$this->CuentaPrivilegio = $this->get_atributo("CuentaPrivilegio");
		$this->CuentaUsuario = $this->get_atributo("CuentaUsuario");
		$this->CuentaClave = $this->get_atributo("CuentaClave");
		$this->CuentaEmail = $this->get_atributo("CuentaEmail");
		$this->CuentaEstado = $this->get_atributo("CuentaEstado");
		$this->CuentaTipo = $this->get_atributo("CuentaTipo");
		$this->CuentaTipo = $this->get_atributo("CuentaGenero");
		$this->CuentaTipo = $this->get_atributo("CuentaFoto");
		$this->sql->bindParam(":Codigo", $this->CuentaCodigo);
		$this->sql->bindParam(":Privilegio", $this->CuentaPrivilegio);
		$this->sql->bindParam(":Usuario", $this->CuentaUsuario);
		$this->sql->bindParam(":Clave", $this->CuentaClave);
		$this->sql->bindParam(":Email", $this->CuentaEmail);
		$this->sql->bindParam(":Estado", $this->CuentaEstado);
		$this->sql->bindParam(":Tipo", $this->CuentaTipo);
		$this->sql->bindParam(":Genero", $this->CuentaGenero);
		$this->sql->bindParam(":Foto", $this->CuentaFoto);
		$this->sql->execute();
		return $this->sql;
	}
	protected function cuenta_iniciar_sesion_modelo()
	{
		$this->sql = self::conectar_base_datos()->prepare("SELECT * FROM cuenta WHERE CuentaUsuario = :Codigo AND CuentaClave = :Clave AND CuentaEstado = 'Activo'");
		$this->CuentaCodigo = $this->get_atributo("CuentaUsuario");
		$this->CuentaCodigo = $this->get_atributo("CuentaClave");
		$this->sql->bindParam(":Codigo", $this->CuentaUsuario);
		$this->sql->bindParam(":Clave", $this->CuentaClave);
		$this->sql->execute();
		return $this->sql;
	}
}
