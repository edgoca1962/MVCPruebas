<?php
class Plantilla extends PlantillaModelo

{
    private $controlador;
    private $metodo;
    private $parametros;

    public function __construct()
    {
        $this->controlador = "Inicio";
        $this->metodo = "inicio";
        $this->get_url();
        $this->get_datos();
    }
    public function inicio()
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
                            $this->set_atributo('parametros', trim($this->parametros, ','));
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
    public function get_datos()
    {
        if ($this->get_datos_modelo()) {

            $this->set_atributo('titulo_plantilla', $this->get_atributo_modelo('titulo'));
            $this->set_atributo('logo', $this->get_atributo_modelo('logo'));
            $this->set_atributo('icono', $this->get_atributo_modelo('icono'));
            $this->set_atributo('redes_sociales', $this->get_atributo_modelo('redes_sociales'));
            // $this->sobre_mi = $this->get_atributo_modelo('sobre_mi');
            // $this->sobre_mi_completo = $this->get_atributo_modelo('sobre_mi_completo');
            $this->set_atributo('ruta_contenidos', $this->get_atributo_modelo('ruta_contenidos'));
            $this->set_atributo('ruta_dominio', $this->get_atributo_modelo('ruta_dominio'));
            $this->set_atributo('ruta_img_anuncios', $this->get_atributo_modelo('ruta_img_anuncios'));
            $this->set_atributo('ruta_img_articulos', $this->get_atributo_modelo('ruta_img_articulos'));
            $this->set_atributo('ruta_img_banners', $this->get_atributo_modelo('ruta_img_banners'));
            $this->set_atributo('ruta_img_blog', $this->get_atributo_modelo('ruta_img_blog'));
            $this->set_atributo('ruta_img_categorias', $this->get_atributo_modelo('ruta_img_categorias'));
            $this->set_atributo('ruta_img_usrs', $this->get_atributo_modelo('ruta_img_usrs'));
            $this->set_atributo('ruta_css', $this->get_atributo_modelo('ruta_css'));
            $this->set_atributo('ruta_css_plugins', $this->get_atributo_modelo('ruta_css_plugins'));
            $this->set_atributo('ruta_js', $this->get_atributo_modelo('ruta_js'));
            $this->set_atributo('ruta_js_plugins', $this->get_atributo_modelo('ruta_js_plugins'));
            $this->set_atributo('categorias', $this->get_atributo_modelo('categorias'));
        }
    }
}
