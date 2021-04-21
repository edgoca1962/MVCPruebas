<?php
class Controlador extends ModeloModelo
{
    private $vista;
    private $alerta;
    public function __construct()
    {
        $this->vista = get_class($this) . ".php";
        $this->alerta = null;
    }
    public function inicio($parametros)
    {
    }
    public function get_atributo($atributo)
    {
        return $atributo;
    }
    public function set_atributo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
}
