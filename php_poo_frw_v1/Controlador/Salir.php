<?php
class Salir extends Controlador
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->parametros = [
            'page_id' => 4,
            'page_tag' => 'Salir',
            'page_title' => 'Salir',
            'page_name' => 'salir',
            'mensaje' => 'Mensaje para Salir.php',
            'contenido' => 'Salir.php',
            'alerta' => ''
        ];
        $this->getVista('Salir', $this->parametros);
    }
    public function setAlerta($alerta)
    {
        $this->alerta = $alerta;
    }
}
