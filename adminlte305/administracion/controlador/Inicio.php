<?php
class Inicio extends InicioModelo
{
    private $mensaje;
    public function __construct()
    {
        $this->mensaje = null;
    }
    public function inicio($parametros = "")
    {
        session_start(['name' => 'SYS']);
        if (!isset($_SESSION['usuario_SYS']) || !isset($_SESSION['token'])) {
            session_destroy();
            header('Location: ingreso');
        } else {
            require_once "./vista/modulos/inicio.php";
        }
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }
}
