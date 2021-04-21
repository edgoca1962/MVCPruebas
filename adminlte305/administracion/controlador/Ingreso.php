<?php
class Ingreso extends IngresoModelo
{
    private $usuario;
    private $clave;
    private $alerta;
    private $mensaje;
    public function __construct()
    {
        $this->usuario = null;
        $this->clave = null;
        $this->mensaje = null;
        $this->alerta = new AlertasLibreria;
    }
    public function inicio($parametros = "")
    {
        session_start(['name' => 'SYS']);
        session_destroy();
        $this->getCredenciales();
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }
    public function getCredenciales()
    {
        if (isset($_POST['usuario']) && isset($_POST['clave'])) {
            $this->usuario = $_POST['usuario'];
            //Desencriptar clave para verificar la ingresada con crypt('clave', salt blowfish)
            $this->clave = $_POST['clave'];
            $this->getCredencialesModelo($this->usuario, $this->clave);
            //Usar preg_mach() para evitar injección de código malisioso.
            if ($this->usuario == $this->getAtributo('usuario') && $this->clave == $this->getAtributo('clave')) {
                session_start(['name' => 'SYS']);
                //incluir aqui otras variables de sesión que sean útilies para indentificar de manera más específica.
                $_SESSION['usuario_SYS'] = $this->getAtributo('usuario');
                $_SESSION['token'] = md5(uniqid(mt_rand(), true));

                header("Location: Inicio");
            } else {
                $this->alerta->setAtributo('tipoMensaje', 'simple');
                $this->alerta->setAtributo('titulo', 'Alerta');
                $this->alerta->setAtributo('texto', 'La combinación ingresada de usuario y contraseña no se encuentra registrada.');
                $this->alerta->setAtributo('tipoAlerta', 'error');
                $this->mensaje = $this->alerta->getAlerta();
            }
        }
    }
}
