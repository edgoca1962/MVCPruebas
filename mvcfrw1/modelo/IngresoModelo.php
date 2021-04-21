<?php
class IngresoModelo
{
    private $usuario;
    private $clave;
    private $consultaBd;
    protected function __construct()
    {
        $this->usuario = null;
        $this->clave = null;
        $this->consultaBd = null;
    }
    protected function getAtributoModelo($atributo)
    {
        return $this->$atributo;
    }
    protected function setAtributoModelo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    protected function getUsuarioModelo($usuario, $modelo)
    {
        //Incluir aquí la consulta preparada SQL a la Base de Datos.
        $this->consultaBd = ['usuario' => 'Admin', 'clave' => 'Admin123'];
        //Validad si el usuario fue encontrado en la Base de Datos.
        $this->setAtributoModelo('usuario', $this->consultaBd['usuario']);
        $this->setAtributoModelo('clave', $this->consultaBd['clave']);
    }
}
