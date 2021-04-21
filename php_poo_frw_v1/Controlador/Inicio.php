<?php
class Inicio extends Controlador
{
    private $alerta;
    public function __construct()
    {
        $this->alerta = "";
    }
    public function index()
    {
        $this->parametros = [
            'page_id' => 1,
            'page_tag' => 'Inicio',
            'page_title' => 'Inicio',
            'page_name' => 'inicio',
            'mensaje' => 'Mensaje para Inicio.php',
            'contenido' => 'Inicio.php',
            'alerta' => $this->alerta
        ];
        $this->getVista('Inicio', $this->parametros);
    }
    public function setAlerta($alerta)
    {
        $this->alerta = $alerta;
    }
}
