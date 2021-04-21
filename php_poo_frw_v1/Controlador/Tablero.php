<?php
class Tablero extends Controlador
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->parametros = [
            'page_id' => 6,
            'page_tag' => 'Tablero - Tienda Virtual',
            'page_title' => 'Tablero - Tienda Virtual',
            'page_name' => 'tablero',
            'mensaje' => 'Mensaje para Tablero.php',
            'contenido' => 'Tablero.php',
            'alerta' => ''
        ];
        $this->getVista('Tablero', $this->parametros);
    }
    public function setAlerta($alerta)
    {
        $this->alerta = $alerta;
    }
}
