<?php
class Inicio extends InicioModelo
{
    public function __construct()
    {
    }
    public function inicio($parametros = "")
    {
        require_once "vista/plantilla.php";
    }
}
