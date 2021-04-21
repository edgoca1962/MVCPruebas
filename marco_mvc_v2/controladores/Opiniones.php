<?php
class Opiniones extends OpinionesModelo
{
    private $id;
    private $id_articulo;
    private $nombre_opinion;
    private $correo_opinion;
    private $foto_opinion;
    private $contenido_opinion;
    private $id_administrador;
    private $respuesta_opinion;
    private $aprobacion_opinion;
    private $fecha_opinion;
    private $fecha_respuesta;

    private $tabla1;
    private $tabla2;

    public function __construct()
    {
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
    public function get_opiniones_articulo($id)
    {
    }
    public function set_opinion_articulo()
    {
        $this->set_atributo_modelo('id_articulo', null);
        $this->set_atributo_modelo('nombre_opinion', null);
        $this->set_atributo_modelo('correo_opinion', null);
        $this->set_atributo_modelo('contenido_opinion', null);
        $this->set_atributo_modelo('foto_opinion', null);
        $this->set_atributo_modelo('id_administrador', 1);
        $this->set_atributo_modelo('fecha_opinion', null);
    }
}
