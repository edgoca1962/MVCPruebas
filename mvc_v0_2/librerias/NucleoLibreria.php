<?php
date_default_timezone_set("America/Costa_Rica");
// "https://mvcfrw.fgh-online.com/";
class NucleoLibreria
{
    public function __construct()
    {
        spl_autoload_register(function ($clase) {
            if (substr($clase, -6) == 'Modelo') {
                require_once('./modelos/' . $clase . ".php");
            } else if (substr($clase, -8) == 'Libreria') {
                require_once('./librerias/' . $clase . ".php");
            } else {
                require_once('./controladores/' . $clase . ".php");
            }
        });
        $this->get_controlador();
    }
    public function get_controlador()
    {
        $controlador = "Inicio";
        $metodo = "inicio";
        $parametros = "";
        if (isset($_GET['url'])) {
            $url = trim($_GET['url']);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            if (file_exists("./controladores/" . ucwords($url[0]) . ".php")) {
                $controlador = ucwords($url[0]);
                $controlador = new $controlador;
                if (isset($url[1]) && !empty(trim($url[1]))) {
                    if (method_exists($controlador, $url[1])) {
                        $metodo = $url[1];
                        if (isset($url[2]) && !empty(trim($url[2]))) {
                            for ($i = 2; $i < count($url); $i++) {
                                $parametros .= $url[$i] . ',';
                            }
                            $parametros = explode(",", trim($parametros, ','));
                            $parametros = $parametros;
                        }
                    }
                }
            }
        }
        $plantilla = new Plantilla;
        $controlador = new $controlador;
        $controlador->{$metodo}($parametros);
        include_once "vistas/Plantilla.php";
    }
}
