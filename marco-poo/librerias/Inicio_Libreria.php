<?php
class Inicio_Libreria
{
	private $vista;
	private $contenido;
	private $ingreso;
	private $encripta;
	public function __construct()
	{
		$this->vista = new Vista_Controlador();
		$contenido = $this->vista->get_vista_controlador();
		if ($contenido == "login" || $this->contenido == "404") {
			require_once "./vistas/contenidos/" . $this->contenido . "-view.php";
		} else {
			session_start(['name' => 'SBP']);
			$this->ingreso = new Cuenta_Controlador();
			if (!isset($_SESSION['token_sbp']) || !isset($_SESSION['usuario_sbp'])) {
				$this->ingreso->forzar_cierre_session_controlador();
			} else {
				// $this->encripta = new Encriptar_Libreria();
				require_once "./vistas/plantillaPrueba.php";
			}
		}
	}
}
