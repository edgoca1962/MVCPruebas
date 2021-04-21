<?php
class Bitacora_Modelo extends Conexion_Libreria
{
	private $id;
	private $BitacoraCodigo;
	private $BitacoraFecha;
	private $BitacoraHoraInicio;
	private $BitacoraHoraFinal;
	private $BitacoraTipo;
	private $BitacoraYear;
	private $CuentaCodigo;
	private $sql;
	private $bitacora;
	private $respuesta_cierre;
	public function __construct()
	{
		$this->id = NULL;
		$this->BitacoraCodigo = NULL;
		$this->BitacoraFecha = date("Y-m-d");
		$this->BitacoraHoraInicio = date("h:i:s a");
		$this->BitacoraHoraFinal = date("h:i:s a");
		$this->BitacoraTipo = NULL;
		$this->BitacoraYear = date("Y");
		$this->CuentaCodigo = NULL;
		$this->bitacora = NULL;
		$this->respuesta_cierre = NULL;
	}
	protected function set_atributo($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}
	protected function get_atributo($atributo)
	{
		return $this->$atributo;
	}
	protected function consulta_bitacora_modelo($atributo, $contenido)
	{
		$this->sql = $this->conectar_base_datos()->prepare("SELECT * FROM bitacora WHERE $atributo = :contenido");
		$this->$atributo = $this->get_atributo($atributo);
		$this->sql->bindParam(":contenido", $this->$atributo);
		$this->sql->execute();
		return $this->sql;
	}
	protected function eliminar_bitacora_modelo()
	{
		$this->sql = $this->conectar_base_datos()->prepare("DELETE FROM bitacora WHERE id = :id");
		$this->CuentaCodigo = $this->get_atributo("id");
		$this->sql->bindParam(":id", $this->id);
		$this->sql->execute();
		return $this->sql;
	}
	protected function agregar_bitacora_modelo()
	{
		$this->sql = $this->conectar_base_datos()->prepare("INSERT INTO bitacora(BitacoraCodigo,BitacoraFecha,BitacoraHoraInicio,BitacoraHoraFinal,BitacoraTipo,BitacoraYear,CuentaCodigo) VALUES(:Codigo,:Fecha,:HoraInicio,:HoraFinal,:Tipo,:Year,:Cuenta)");
		$this->BitacoraCodigo = $this->get_atributo("BitacoraCodigo");
		$this->BitacoraFecha = $this->get_atributo("BitacoraFecha");
		$this->BitacoraHoraInicio = $this->get_atributo("BitacoraHoraInicio");
		$this->BitacoraHoraFinal = $this->get_atributo("BitacoraHoraFinal");
		$this->BitacoraTipo = $this->get_atributo("BitacoraTipo");
		$this->BitacoraYear = $this->get_atributo("BitacoraYear");
		$this->CuentaCodigo = $this->get_atributo("CuentaCodigo");
		$this->sql->bindParam(":Codigo", $this->BitacoraCodigo);
		$this->sql->bindParam(":Fecha", $this->BitacoraFecha);
		$this->sql->bindParam(":HoraInicio", $this->BitacoraHoraInicio);
		$this->sql->bindParam(":HoraFinal", $this->BitacoraHoraFinal);
		$this->sql->bindParam(":Tipo", $this->BitacoraTipo);
		$this->sql->bindParam(":Year", $this->BitacoraYear);
		$this->sql->bindParam(":Cuenta", $this->CuentaCodigo);
		$this->sql->execute();
		return $this->sql;
	}
	protected function bitacora_cierre_sesion_modelo()
	{
		$this->sql = $this->conectar_base_datos()->prepare("UPDATE bitacora SET BitacoraHoraFinal = :Hora WHERE BitacoraCodigo = :Codigo");
		$this->BitacoraHoraFinal = $this->get_atributo("BitacoraHoraFinal");
		$this->BitacoraCodigo = $this->get_atributo("BitacoraCodigo");
		$this->sql->bindParam(":Hora", $this->BitacoraHoraFinal);
		$this->sql->bindParam(":Codigo", $this->BitacoraCodigo);
		$this->sql->execute();
		return $this->sql;
	}
}
