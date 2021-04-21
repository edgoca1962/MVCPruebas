<?php
class Opciones extends Controlador
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->parametros = [
            'page_id' => 2,
            'page_tag' => 'Opciones',
            'page_title' => 'Opciones',
            'page_name' => 'opciones',
            'mensaje' => 'mensaje para Opciones.php',
            'contenido' => 'Opciones.php',
            'alerta' => ''
        ];
        $this->getVista('Opciones', $this->parametros);
    }
    public function setAlerta($alerta)
    {
        $this->alerta = $alerta;
    }
}
