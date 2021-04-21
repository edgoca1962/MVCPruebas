<?php
class Core
{
    private $url;
    private $controlador;
    private $metodo;
    private $parametros;
    private $mensajes;
    private $alerta;
    public function __construct()
    {
        $this->mensajes = new Mensajes;
        $this->controlador = "Inicio";
        $this->metodo = "index";
        $this->parametros = "";

        $this->url = $this->getUrl();

        if (isset($this->url[0])) {
            if (file_exists("Controlador/" . ucwords($this->url[0]) . ".php")) {
                $this->controlador = ucwords($this->url[0]);
            } else {
                $this->mensajes->set_atributo('tipoMensaje', 'simple');
                $this->mensajes->set_atributo('titulo', 'Alerta');
                $this->mensajes->set_atributo('texto', 'Página no encontrada.');
                $this->mensajes->set_atributo('tipoAlerta', 'warning');
                $this->alerta = (string) $this->mensajes->procesa_mensaje();
            }
        }
        require_once "Controlador/" . $this->controlador . ".php";
        $this->controlador = new $this->controlador;
        if (!empty($this->alerta)) {
            $this->controlador->setAlerta($this->alerta);
        }
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
}
