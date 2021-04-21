<?php
class CoreLibreria
{
    private $url;
    private $controlador;
    private $metodo;
    private $parametros;
    private $contenido;
    public function __construct()
    {
        $this->controlador = "Ingreso";
        $this->metodo = "inicio";
        $this->parametros = "";

        $this->url = $this->getUrl();

        if (isset($this->url[0])) {
            if (file_exists("Controlador/" . ucwords($this->url[0]) . ".php")) {
                $this->controlador = ucwords($this->url[0]);
            }
        }
        $this->contenido = $this->controlador;
        $this->controlador = new $this->controlador;
        if (isset($this->url[1])) {
            if (method_exists($this->controlador, $this->url[1])) {
                $this->metodo = $this->url[1];
            }
        }
        if (isset($this->url[2])) {
            if ($this->url[2] != "") {
                for ($i = 2; $i < count($this->url); $i++) {
                    $this->parametros .= $this->url[$i] . ',';
                }
                $this->parametros = trim($this->parametros, ',');
            }
        }
        $this->controlador->{$this->metodo}($this->parametros);
    }
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $this->url = trim($_GET['url']);
            $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
            $this->url = explode("/", $this->url);
        }
        return $this->url;
    }
    public function getContenido()
    {
        return $this->contenido;
    }
    public function getMensaje()
    {
        return  $this->controlador->getMensaje();
    }
    public function cerrarSesion()
    {
        session_destroy();
        return header('Location: Inicio');
    }
}
