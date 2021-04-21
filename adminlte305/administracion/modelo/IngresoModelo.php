<?php
class IngresoModelo extends BaseLibreria
{
    private $usuario;
    private $clave;
    private $credenciales;
    protected function __construct()
    {
        $this->usuario = null;
        $this->clave = null;
    }
    protected function inicio()
    {
    }
    protected function setAtributo($atributo, $valor)
    {
        $this->$atributo = $this->$valor;
    }
    protected function getAtributo($atributo)
    {
        return $this->$atributo;
    }
    public function getCredencialesModelo($usuario, $clave)
    {
        /*         
        SE DEBE LIMPIAR LOS DATOS INGRESADOS POR EL USUARIO Y SE DEBE DESENCRIPTAR LA CLAVE DE USUARIO.
        $this->credenciales = $this->conectar()->prepare("SELECT * FROM bitacora WHERE usuario = :usuario AND clave = :clave");
        $this->credenciales->execute(['usuario' => $usuario, 'clave' => $clave]);
        return $this->credenciales->fetchAll(PDO::FETCH_OBJ);
        */
        $this->credenciales = ['usuario' => 'Admin', 'clave' => 'Admin'];
        $this->usuario = $this->credenciales['usuario'];
        $this->clave = $this->credenciales['clave'];
    }
}
