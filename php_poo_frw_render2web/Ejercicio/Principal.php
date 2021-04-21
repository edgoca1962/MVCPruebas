<?php
class Principal extends Controlador
{
    private $parametros;
    private $articulos;
    public function __construct()
    {
        $this->articuloModelo = $this->getModelo('Articulo');
    }
    public function index()
    {

        $this->articulos = $this->articuloModelo->obtenerArticulos();
        $this->parametros = [
            'titulo' => 'Título',
            'articulos' => $this->articulos
        ];
        $this->getVista('inicio', $this->parametros);
    }
}
