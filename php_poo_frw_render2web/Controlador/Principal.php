<?php
class Principal extends Controlador
{
    public function __construct()
    {
    }
    public function index()
    {

        $this->parametros = [
            'titulo' => 'Título'
        ];
        $this->getVista('inicio', $this->parametros);
    }
}
