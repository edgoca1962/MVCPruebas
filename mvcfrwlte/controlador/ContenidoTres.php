<?php
class ContenidoTres
{
    private $usuario;
    private $clave;
    private $controlador;
    private $mensaje;
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['usuarioSesion']) || !isset($_SESSION['tokenSesion'])) {
            $this->mensaje = "Usuario de sesión o token no están definidos.";
            // session_destroy();
            // header("Location: " . SERVERURL . "Ingreso");
        }
        $this->controlador = new ControladorLibreria;
        $this->usuario = null;
        $this->clave = null;
        $this->mensaje = null;
    }
    public function inicio($parametros = "")
    {
    }
    public function getAtributo($atributo)
    {
        return $this->$atributo;
    }
    public function setAtributo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }
}
