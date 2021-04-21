<?php
class Ingreso extends IngresoModelo
{
    public function __construct()
    {
    }
    public function inicio($parametros = "")
    {
        $this->validarUsuario();
    }
    public function validarUsuario()
    {
        if (1 == 1) {
            include 'views/modules/inicio.php';
        } else {
            include 'views/modules/ingreso.php';
            echo 'Usuario y contraseña incorrectos' . '<br>';
        }
    }
}
