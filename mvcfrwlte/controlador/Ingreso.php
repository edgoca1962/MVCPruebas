<?php
class Ingreso extends IngresoModelo
{
    private $usuario;
    private $clave;
    private $usuarioSesion;
    private $tokenSesion;
    private $controlador;
    private $mensaje;
    public function __construct()
    {
        $this->controlador = new ControladorLibreria;
        $this->usuario = null;
        $this->clave = null;
        $this->mensaje = null;
    }
    public function inicio()
    {
        $this->getUsuario();
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
    public function getUsuario()
    {
        if (isset($_POST['usuario']) && isset($_POST['clave'])) {
            $this->usuario = $_POST['usuario'];
            $this->usuario = $this->controlador->getTextoLimpio($this->usuario);
            $this->clave = $_POST['clave'];
            $this->clave = $this->controlador->getTextoLimpio($this->clave);
            $this->getUsuarioModelo($this->usuario, $this->clave);
            if ($this->usuario == $this->getAtributoModelo('usuario') && crypt($this->clave, $this->getAtributoModelo('clave')) == $this->getAtributoModelo('clave')) {
                //incluir aqui otras variables de sesión que sean útilies para indentificar de manera más específica.
                session_start();
                $_SESSION['usuarioSesion'] = $this->getAtributoModelo('usuario');
                $_SESSION['tokenSesion'] = md5(uniqid(mt_rand(), true));
                header("Location: " . SERVERURL . "Inicio");
            } else {
                $this->controlador->setAtributoAlerta('tipoMensaje', 'simple');
                $this->controlador->setAtributoAlerta('titulo', 'Alerta');
                $this->controlador->setAtributoAlerta('texto', 'La combinación ingresada de usuario y contraseña no se encuentra registrada.');
                $this->controlador->setAtributoAlerta('tipoAlerta', 'error');
                $this->mensaje = $this->controlador->getAlerta();
            }
        }
    }
}
