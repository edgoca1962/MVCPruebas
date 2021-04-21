<?php
class Cuenta_Controlador extends Cuenta_Modelo
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
	private $encriptacion;
	private $inicioSesion;
	private $mensaje;
	private $bitacora;
	private $insertarBitacora;
	private $registro;
	private $registroBitacora;
	private $BitacoraCodigo;
	private $datos;
	private $url;
	private $urlInicio;
	private $respuesta_cierre;
	private $token;
	public function __construct()
	{
		$this->id = NULL;
		$this->CuentaCodigo = NULL;
		$this->CuentaPrivilegio = NULL;
		$this->CuentaUsuario = NULL;
		$this->CuentaClave = NULL;
		$this->CuentaEmail = NULL;
		$this->CuentaEstado = NULL;
		$this->CuentaTipo = NULL;
		$this->CuentaGenero = NULL;
		$this->CuentaFoto = NULL;
		$this->encriptacion = NULL;
		$this->inicioSesion = NULL;
		$this->mensaje = NULL;
		$this->bitacora = NULL;
		$this->insertarBitacora = NULL;
		$this->registro = NULL;
		$this->registroBitacora = NULL;
		$this->BitacoraCodigo = NULL;
		$this->datos = NULL;
		$this->url = NULL;
		$this->urlInicio = NULL;
		$this->respuesta_cierre = NULL;
		$this->token = NULL;
		$this->encriptacion = new Encriptar_Libreria();
		$this->mensaje = new Mensajes_Libreria();
	}

	public function cuenta_iniciar_sesion_controlador()
	{
		//Ejecutar limpiar cadena para quitar caracteres no deseados del usuario y la clave
		$this->set_atributo("CuentaUsuario", $_POST['usuario']);
		$this->CuentaClave = $this->encriptacion->encriptar($_POST['clave']);
		$this->set_atributo("CuentaClave", $this->CuentaClave);
		$this->inicioSesion = $this->cuenta_iniciar_sesion_modelo();
		if ($this->inicioSesion->rowCount() == 1) {
			$this->registro = $this->inicioSesion->fetch(PDO::FETCH_ASSOC);
			$this->set_atributo("CuentaTipo", $this->registro['CuentaTipo']);
			$this->CuentaTipo = $this->get_atributo("CuentaTipo");
			$this->set_atributo("CuentaCodigo", $this->registro['CuentaCodigo']);
			$this->CuentaCodigo = $this->get_atributo("CuentaCodigo");
			$this->set_atributo("CuentaUsuario", $this->registro['CuentaUsuario']);
			$this->CuentaUsuario = $this->get_atributo("CuentaUsuario");
			$this->set_atributo("CuentaPrivilegio", $this->registro['CuentaPrivilegio']);
			$this->CuentaPrivilegio = $this->get_atributo("CuentaPrivilegio");
			$this->set_atributo("CuentaFoto", $this->registro['CuentaFoto']);
			$this->CuentaFoto = $this->get_atributo("CuentaFoto");
			$this->BitacoraCodigo = Conexion_Libreria::genera_codigo_aleatorio("CB", 8);
			$this->bitacora = new Bitacora_Controlador();
			$this->datos = [
				"BitacoraCodigo" => $this->BitacoraCodigo,
				"CuentaTipo" => $this->CuentaTipo,
				"CuentaCodigo" => $this->CuentaCodigo
			];
			$this->insertarBitacora = $this->bitacora->bitacora_iniciar_sesion_controlador($this->datos);
			if ($this->insertarBitacora->rowCount() >= 1) {
				session_start(['name' => 'SBP']);
				$_SESSION['usuario_sbp'] = $this->CuentaUsuario;
				$_SESSION['tipo_sbp'] = $this->CuentaTipo;
				$_SESSION['privilegio_sbp'] = $this->CuentaPrivilegio;
				$_SESSION['foto_sbp'] = $this->CuentaFoto;
				$_SESSION['token_sbp'] = md5(uniqid(mt_rand(), true));
				$_SESSION['CuentaCodigo_spb'] = $this->CuentaCodigo;
				$_SESSION['BitacoraCodigo_sbp'] = $this->BitacoraCodigo;
				if ($this->CuentaUsuario == "Administrador") {
					$this->url = SERVERURL . "home/";
				} else {
					$this->url = SERVERURL . "catalog/";
				}
				$this->urlInicio = '<script> window.location = "' . $this->url . '"  </script>';
				return  $this->urlInicio;
			} else {
				$this->mensaje->set_atributo("tipoMensaje", "simple");
				$this->mensaje->set_atributo("titulo", "Ocurrió un error inesperado");
				$this->mensaje->set_atributo("texto", "No se ha podido iniciar sesión.");
				$this->mensaje->set_atributo("tipoAlerta", "error");
				return $this->mensaje->procesa_mensaje();
			}
		} else {
			$this->mensaje->set_atributo("tipoMensaje", "simple");
			$this->mensaje->set_atributo("titulo", "Ocurrió un error inesperado");
			$this->mensaje->set_atributo("texto", "El usuario y la contraseña no coinciden o la cuenta está desactivada.");
			$this->mensaje->set_atributo("tipoAlerta", "error");
			return $this->mensaje->procesa_mensaje();
		}
	}
	public function forzar_cierre_session_controlador()
	{
		session_destroy();
		return header("Location:" . SERVERURL . "login/");
	}
}
