<?php
class Vista_Modelo
{
	private $listaBlanca;
	private $vista;
	public function __construct()
	{
		$this->listaBlanca = NULL;
		$this->vista = NULL;
	}
	protected function get_vista_modelo($vista)
	{
		$this->listaBlanca = ["adminlist", "adminsearch", "admin", "book", "bookconfig", "bookinfo", "catalog", "category", "categorylist", "client", "clientlist", "clientsearch", "company", "companylist", "home", "myaccount", "mydata", "provider", "providerlist", "search", "blanco"];
		if (in_array($vista, $this->listaBlanca)) {
			if (is_file("./vistas/contenidos/" . $vista . "-view.php")) {
				$this->vista = $vista;
			} else {
				$this->vista = "login";
			}
		} elseif ($vista == "login") {
			$this->vista = "login";
		} elseif ($vista == "index") {
			$this->vista = "login";
		} else {
			$this->vista = "404";
		}
		return $this->vista;
	}
}
