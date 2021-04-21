<?php
if ($peticionAjax) {
	require_once "../modelos/loginModelo.php";
} else {
	require_once "./modelos/loginModelo.php";
}
class loginControlador extends loginModelo
{

	private $usuario;
	private $clave;
	private $datosLogin;
	private $datosCuenta;
	private $row;
	private $fechaActual;
	private $yearActual;
	private $horaActual;
	private $consulta1;
	private $numero;
	private $codigoB;
	private $datosBitacora;
	private $insertarBitacora;
	private $url;
	private $urllocation;
	private $alerta;
	private $token;
	private $hora;
	private $datos;

	public function iniciar_sesion_controlador()
	{
		$this->usuario = mainModel::limpiar_cadena($_POST['usuario']);
		$this->clave = mainModel::limpiar_cadena($_POST['clave']);
		$this->clave = mainModel::encryption($this->clave);
		$this->datosLogin = [
			"Usuario" => $this->usuario,
			"Clave" => $this->clave
		];
		$this->datosCuenta = loginModelo::iniciar_sesion_modelo($this->datosLogin);
		if ($this->datosCuenta->rowCount() == 1) {
			$this->row = $this->datosCuenta->fetch();
			$this->fechaActual = date("Y-m-d");
			$this->yearActual = date("Y");
			$this->horaActual = date("h:i:s a");
			$this->consulta1 = mainModel::ejecutar_consulta_simple("SELECT id FROM bitacora");
			$numero = ($this->consulta1->rowCount()) + 1;
			$codigoB = mainModel::generar_codigo_aleatorio("CB", 7, $numero);
			$this->datosBitacora = [
				"Codigo" => $codigoB,
				"Fecha" => $this->fechaActual,
				"HoraInicio" => $this->horaActual,
				"HoraFinal" => 'Sin registro',
				"Tipo" => $this->row['CuentaTipo'],
				"Year" => $this->yearActual,
				"Cuenta" => $this->row['CuentaCodigo']
			];
			$this->insertarBitacora = mainModel::guardar_bitacora($this->datosBitacora);
			if ($this->insertarBitacora->rowCount() >= 1) {
				session_start(['name' => 'SBP']);
				$_SESSION['usuario_sbp'] = $this->row['CuentaUsuario'];
				$_SESSION['tipo_sbp'] = $this->row['CuentaTipo'];
				$_SESSION['privilegio_sbp'] = $this->row['CuentaPrivilegio'];
				$_SESSION['foto_sbp'] = $this->row['CuentaFoto'];
				$_SESSION['token_sbp'] = md5(uniqid(mt_rand(), true));
				$_SESSION['codigo_cuenta_sbp'] = $this->row['CuentaCodigo'];
				$_SESSION['codigo_bitacora_sbp'] = $codigoB;
				if ($this->row['CuentaTipo'] == "Administrador") {
					$this->url = SERVERURL . "home/";
				} else {
					$this->url = SERVERURL . "catalog/";
				}
				return $this->urllocation = '<script> window.location="' . $this->url . '" </script>';
			} else {
				$this->alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado.",
					"Texto" => "No se ha podido iniciar sesión.",
					"Tipo" => "error"
				];
			}
		} else {
			$this->alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado.",
				"Texto" => "El usuario y la contraseña no son correctos o la cuenta está inactiva.",
				"Tipo" => "error"
			];
			return mainModel::sweet_alert($this->alerta);
		}
	}
	public function cerrar_sesion_controlador()
	{
		session_start(['name' => 'SBP']);
		$this->token = mainModel::decryption($_GET['Token']);
		$this->hora = date("h:i:s a");
		$this->datos = [
			"Usuario" => $_SESSION['usuario_sbp'],
			"Token_S" => $_SESSION['token_sbp'],
			"Token" => $this->token,
			"Codigo" => $_SESSION['codigo_bitacora_sbp'],
			"Hora" => $this->hora
		];
		return loginModelo::cerrar_sesion_modelo($this->datos);
	}
	public function forzar_cierre_sesion_controlador()
	{
		session_destroy();
		return header("Location: " . SERVERURL . "login/");
	}
}
