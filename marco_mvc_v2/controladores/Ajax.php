<?php
class Prueba
{
    private $usuario;
    private $clave;
    public function __construc()
    {
    }
    public function inicio($usuario, $clave)
    {
        if ($this->get_credenciales($usuario, $clave)) {
            return true;
        } else {
            return false;
        }

        return false;
    }
    public function get_credenciales($usuario, $clave)
    {

        if ($usuario == 'usuario@correo.com' && $clave == "clave") {
            return true;
        } else {
            return false;
        }
    }
}

if ($_POST['formulario'] == "ingreso") {
    $prueba = new Prueba();
    $prueba = $prueba->inicio($_POST['correo'], $_POST['clave']);
    if ($prueba) {
        echo true;
    } else {
        echo false;
    }
} else {
    echo false;
}
