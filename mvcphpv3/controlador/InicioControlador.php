<?php
class InicioControlador extends InicioModelo
{
    public function __construct()
    {
    }
    public function inicio($parametros = "")
    {
        if (file_exists('vista/' . $parametros . '.php')) {
            require_once 'vista/' . $parametros . '.php';
        } else {
            echo 'inlcuir modulo de alertas';
        }
    }
}
