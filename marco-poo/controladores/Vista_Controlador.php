<?php
class Vista_Controlador extends Vista_Modelo
{
	private $ruta;
	private $vista;
	public function __construct()
	{
		$this->ruta = NULL;
		$this->vista = NULL;
	}
	public function get_vista_controlador()
	{
		if (isset($_GET['vista'])) {
			$this->ruta = explode("/", $_GET['vista']);
			$this->vista = new Vista_Modelo();
			$this->vista->get_vista_modelo($this->ruta[0]);
			if ($this->vista == "login" || $this->vista == "404") {
				return $this->vista;
			} else {
			}
		} else {
			$this->vista = "login";
		}
		return $this->vista;
	}
}
