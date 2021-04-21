<?php
class Plantilla extends PlantillaModelo
{
    private $url;
    private $nombre_controlador;
    private $controlador;
    private $metodo;
    private $parametros;
    private $rutas_proyecto;
    private $datos_rutas_proyecto;
    private $titulo_plantilla;
    private $logo;
    private $icono;
    private $ruta_dominio;
    private $ruta_contenidos;
    private $ruta_css;
    private $ruta_js;
    private $ruta_img_banners;
    private $ruta_img_general;
    private $ruta_img_usrs;


    public function __construct()
    {
        $this->url = null;
        $this->nombre_controlador = "Inicio";
        $this->controlador = "Inicio";
        $this->metodo = "inicio";
        $this->parametros = null;
        $this->rutas_proyecto = null;
        $this->datos_rutas_proyecto = null;
        $this->titulo_plantilla = null;
        $this->logo = null;
        $this->icono = null;
        $this->ruta_dominio = null;
        $this->ruta_contenidos = null;
        $this->ruta_css = null;
        $this->ruta_js = null;
        $this->ruta_img_banners = null;
        $this->ruta_img_general = null;
        $this->ruta_img_usrs = null;
        $this->get_url();
        $this->get_rutas_proyecto();
    }
    public function inicio($parametros = null)
    {
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
            if (file_exists("./controladores/" . ucwords($this->url[0]) . ".php")) {
                $this->set_atributo('nombre_controlador', ucwords($this->url[0]));
                if (isset($this->url[1]) && !empty(trim($this->url[1]))) {
                    $this->controlador = new $this->nombre_controlador;
                    if (method_exists($this->controlador, $this->url[1])) {
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
                $this->set_atributo('nombre_controlador', 'Inicio');
            }
        } else {
            $this->set_atributo('nombre_controlador', 'Inicio');
        }
    }
    public function get_rutas_proyecto()
    {
        if ($this->get_rutas_proyecto_modelo()) {
            $this->rutas_proyecto = $this->get_atributo_modelo("rutas_proyecto");
            foreach ($this->rutas_proyecto as $key => $value) {
                $this->datos_rutas_proyecto[$value['ruta_descripcion']] = $value;
            }
            $this->rutas_proyecto = $this->datos_rutas_proyecto;
            /*
            $this->set_atributo('titulo_plantilla', $this->get_atributo_modelo('titulo'));
            $this->set_atributo('logo', $this->get_atributo_modelo('logo'));
            $this->set_atributo('icono', $this->get_atributo_modelo('icono'));
            */
            $this->set_atributo('ruta_dominio', $this->rutas_proyecto["dominio"]["ruta"]);
            $this->set_atributo('ruta_contenidos', $this->ruta_dominio . $this->rutas_proyecto["contenidos"]["ruta"]);
            $this->set_atributo('ruta_css', $this->ruta_dominio . $this->rutas_proyecto["css"]["ruta"]);
            $this->set_atributo('ruta_js', $this->ruta_dominio . $this->rutas_proyecto["js"]["ruta"]);
            $this->set_atributo('ruta_img_banners',  $this->ruta_dominio . $this->rutas_proyecto["img_banners"]["ruta"]);
            $this->set_atributo('ruta_img_genral', $this->ruta_dominio . $this->rutas_proyecto["img_generales"]["ruta"]);
            $this->set_atributo('ruta_img_usrs', $this->ruta_dominio . $this->rutas_proyecto["img_usrs"]["ruta"]);
        } else {
            $this->rutas_proyecto = null;
        }
    }
}
