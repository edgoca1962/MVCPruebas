<?php
class Bitacora_Controlador extends Bitacora_Modelo
{
	private $id;
	private $BitacoraCodigo;
	private $BitacoraFecha;
	private $BitacoraHoraInicio;
	private $BitacoraHoraFinal;
	private $BitacoraTipo;
	private $BitacoraYear;
	private $CuentaCodigo;
	private $contarBitacora;
	private $bitacora;
	private $token;
	private $consecutivo;
	private $controladorPrincipal;
	private $insertarBitacora;
	private $encriptacion;
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
		$this->contarBitacora = NULL;
		$this->bitacora = NULL;
		$this->token = NULL;
		$this->consecutivo = NULL;
		$this->controladorPrincipal = NULL;
	}
	public function bitacora_iniciar_sesion_controlador($datos)
	{
		$this->set_atributo("BitacoraCodigo", $datos['BitacoraCodigo']);
		$this->set_atributo("BitacoraFecha", $this->BitacoraFecha);
		self::set_atributo("BitacoraHoraInicio", $this->BitacoraHoraInicio);
		self::set_atributo("BitacoraHoraFinal", "Ingresado");
		self::set_atributo("BitacoraTipo", $datos['CuentaTipo']);
		self::set_atributo("BitacoraYear", $this->BitacoraYear);
		self::set_atributo("CuentaCodigo", $datos['CuentaCodigo']);
		$this->insertarBitacora = self::agregar_bitacora_modelo();
		return $this->insertarBitacora;
	}
	public function bitacora_cierre_session_controlador()
	{
		session_start(['name' => 'SBP']);
		$this->encriptacion = new Encriptar_Libreria();
		$this->token = $this->encriptacion->desencriptar($_GET['Token']);
		if ($_SESSION['usuario_sbp'] != "" && $_SESSION['token_sbp'] == $this->token) {
			self::set_atributo("BitacoraCodigo", $_SESSION['BitacoraCodigo_sbp']);
			self::set_atributo("BitacoraHoraFinal", $this->BitacoraHoraFinal);
			$this->bitacora = self::bitacora_cierre_sesion_modelo();
			if ($this->bitacora->rowCount() == 1) {
				session_unset();
				session_destroy();
				$this->respuesta = "true";
			} else {
				$this->respuesta = "false";
			}
		} else {
			$this->respuesta = "false";
		}
		return $this->respuesta;
	}
}
