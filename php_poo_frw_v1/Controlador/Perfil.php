<?php
class Perfil extends Controlador
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->parametros = [
            'page_id' => 3,
            'page_tag' => 'Perfil',
            'page_title' => 'Perfil',
            'page_name' => 'perfil',
            'mensaje' => 'Mensaje para Perfil.php',
            'contenido' => 'Perfil.php',
            'alerta' => ''
        ];
        $this->getVista('Perfil', $this->parametros);
    }
    public function setAlerta($alerta)
    {
        $this->alerta = $alerta;
    }
}
