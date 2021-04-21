<?php
class Adminlist extends AdminlistModelo
{
    private $url;
    private $alerta;
    public function __construct()
    {
        parent::__construct();
        $this->url = new Controlador;
        $this->alerta = "";
    }

    public function index()
    {
        $this->parametros = [
            'page_id' => 6,
            'page_tag' => 'Lista de Administradores - Tienda Virtual',
            'page_title' => 'Lista de Administradores - Tienda Virtual',
            'page_name' => 'adminlist',
            'mensaje' => '',
            'usuarios' => $this->registros,
            'alerta' => $this->alerta
        ];
        $this->url->getVista('adminlist', $this->parametros);
    }
    public function setAlerta($alerta)
    {
        $this->alerta = $alerta;
    }
}
