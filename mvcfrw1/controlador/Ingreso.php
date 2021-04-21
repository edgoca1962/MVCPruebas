<?php
class Ingreso extends IngresoModelo
{
    private $usuario;
    private $clave;
    private $usuarioSesion;
    private $tokenSesion;
    private $alerta;
    private $mensaje;
    public function __construct()
    {
        $this->alerta = new AlertasLibreria;
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
            //Encriptar clave ingresada por el usuario para verificar la registrada en la base de datos utilizando crypt('clave', salt blowfish)
            $this->clave = $_POST['clave'];
            $this->getUsuarioModelo($this->usuario, $this->clave);
            //Usar preg_mach() para evitar injección de código malisioso.
            if ($this->usuario == $this->getAtributoModelo('usuario') && $this->clave == $this->getAtributoModelo('clave')) {
                //incluir aqui otras variables de sesión que sean útilies para indentificar de manera más específica.
                session_start();
                $_SESSION['usuarioSesion'] = $this->getAtributoModelo('usuario');
                $_SESSION['tokenSesion'] = md5(uniqid(mt_rand(), true));
                header("Location: " . SERVERURL . "Contenidouno");
            } else {
                $this->alerta->setAtributoAlerta('tipoMensaje', 'simple');
                $this->alerta->setAtributoAlerta('titulo', 'Alerta');
                $this->alerta->setAtributoAlerta('texto', 'La combinación ingresada de usuario y contraseña no se encuentra registrada.');
                $this->alerta->setAtributoAlerta('tipoAlerta', 'error');
                $this->mensaje = $this->alerta->getAlerta();
            }
        }
    }
}
