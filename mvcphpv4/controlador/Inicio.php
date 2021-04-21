<?php
class Inicio extends InicioModelo
{
    public function __construct()
    {
    }
    public function inicio($parametros = "")
    {
        require_once "views/plantilla.php";
        /* 
        if (file_exists('vista/' . $parametros . '.php')) {
            require_once 'vista/' . $parametros . '.php';
        } else {
            echo 'inlcuir modulo de alertas';
        }
 */
    }
}
