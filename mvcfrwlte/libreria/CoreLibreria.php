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
        $this->parametros = null;
        if (isset($_GET['url'])) {
            $this->url = trim($_GET['url']);
            $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
            $this->url = explode("/", $this->url);
            if (isset($this->url[0])) {
                if (file_exists("./controlador/" . ucwords($this->url[0]) . ".php")) {
                    $this->controlador = ucwords($this->url[0]);
                    $this->contenido = $this->controlador;
                    session_start();
                    $this->controlador = new $this->controlador;
                    if (isset($this->url[1]) && $this->url[1] != "") {
                        if (method_exists($this->controlador, $this->url[1])) {
                            $this->metodo = trim($this->url[1]);
                            if (isset($this->url[2])) {
                                if ($this->url[2] != "") {
                                    for ($i = 2; $i < count($this->url); $i++) {
                                        $this->parametros .= $this->url[$i] . ',';
                                    }
                                    $this->parametros = trim($this->parametros, ',');
                                    $this->controlador->{$this->metodo}($this->parametros);
                                } else {
                                    $this->controlador->{$this->metodo}($this->parametros);
                                }
                            }
                        } else {
                            $this->controlador->{$this->metodo}($this->parametros);
                        }
                    } else {
                        $this->controlador->{$this->metodo}($this->parametros);
                    }
                } else {
                    session_start();
                    session_destroy();
                    header("Location: " . SERVERURL . "Ingreso");
                }
            }
        } else {
            session_start();
            session_destroy();
            header("Location: " . SERVERURL . "Ingreso");
        }
    }
    public function getContenido()
    {
        return $this->contenido;
    }
    public function getMensaje()
    {
        return  $this->controlador->getMensaje();
    }
}
