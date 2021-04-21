<?php
class Controlador
{
    public function __construct()
    {
    }
    public function getModelo($modelo)
    {
        if (file_exists("Modelo/" . $modelo . ".php")) {
            require_once "Modelo/" . $modelo . ".php";
            return new $modelo;
        } else {
            echo "Archivo Modelo no existe.";
        }
    }
    public function getVista($vista, $parametros = [])
    {
        if (file_exists("Vista/" . $vista . ".php")) {
            require_once "Vista/" . $vista . ".php";
        } else {
            echo "Archivo Vista no existe.";
        }
    }
}
