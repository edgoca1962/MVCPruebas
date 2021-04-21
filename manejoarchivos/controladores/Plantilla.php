<?php
class Plantilla extends PlantillaModelo
{
    private $controlador;
    private $metodo;
    private $parametros;
    private $rutas_proyecto;

    public function __construct()
    {
        $this->controlador = "Inicio";
        $this->metodo = "inicio";
        $this->parametros = null;
        $this->rutas_proyecto = null;
    }
    public function inicio()
    {
        $this->get_url();
        $this->get_rutas_proyecto();
    }
    public function get_atributo($atributo)
    {
        return $this->$atributo;
    }
    public function set_atributo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function get_url()
    {
        if (isset($_GET['url'])) {
            $this->url = trim($_GET['url']);
            $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
            $this->url = explode("/", $this->url);
            if (file_exists("./controllers/" . ucwords($this->url[0]) . ".php")) {
                $this->set_atributo('nombre_controlador', ucwords($this->url[0]));
                if (isset($this->url[1]) && !empty(trim($this->url[1]))) {
                    $this->controlador = new $this->nombre_controlador;
                    if (method_exists($this->controlador, $this->url[1])) {
                        $this->set_atributo('controlador', $this->nombre_controlador);
                        $this->set_atributo('metodo', trim($this->url[1]));
                        if (isset($this->url[2]) && !empty(trim($this->url[2]))) {
                            for ($i = 2; $i < count($this->url); $i++) {
                                $this->parametros .= $this->url[$i] . ',';
                            }
                            $this->parametros = explode(",", trim($this->parametros, ','));
                            $this->set_atributo('parametros', $this->parametros);
                        } else {
                            $this->set_atributo('parametros', null);
                        }
                    } else {
                        $this->set_atributo('metodo', 'inicio');
                    }
                } else {
                    $this->set_atributo('metodo', 'inicio');
                }
            } else {
                $this->set_atributo('controlador', 'Inicio');
            }
        } else {
            $this->set_atributo('controlador', 'Inicio');
        }
    }
    public function get_rutas_proyecto()
    {
        if ($this->get_rutas_proyecto_modelo()) {
            $this->rutas_proyecto = $this->get_atributo_modelo('rutas_proyecto');
        } else {
            $this->rutas_proyecto = null;
        }
    }
}
