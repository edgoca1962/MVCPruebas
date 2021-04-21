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
            include 'vista/modulo/inicio.php';
        } else {
            include 'vista/modulo/ingreso.php';
            echo 'Usuario y contraseña incorrectos' . '<br>';
        }
    }
}
