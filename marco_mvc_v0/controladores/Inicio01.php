<?php
class Inicio extends InicioModelo
{
    private $vista;
    private $alerta;
    private $datos_articulos;
    private $tabla1;
    private $tabla2;
    private $desde;
    private $cantidad;
    private $rutas_proyecto;
    private $datos_rutas_proyecto;

    public function __construct()
    {
        $this->vista = get_class($this) . '.php';
        $this->alerta;
        $this->datos_articulos = null;

        $this->tabla1 = "categorias";
        $this->tabla2 = "articulos";
        $this->desde = 0;
        $this->cantidad = 5;
        $rutas_proyecto = null;
        $datos_rutas_proyecto = null;
    }
    public function inicio($parametros)
    {
        $this->get_articulos();
        if ($parametros["usuario"] == 'usuario@correo.com' && $parametros["clave"] == 'clave') {
            return true;
        } else {
            return false;
        }
    }
    public function get_atributo($atributo)
    {
        return $this->$atributo;
    }
    public function set_atributo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function busca_articulos($consulta)
    {
        if ($this->busca_articulos_modelo($consulta)) {
            $this->datos_articulos = $this->get_atributo_modelo(
                'datos_articulos'
            );
        } else {
            $this->datos_articulos = null;
        }
    }
    public function get_articulos()
    {
        if ($this->get_articulos_modelo($this->tabla1, $this->tabla2, $this->desde, $this->cantidad)) {
            $this->set_atributo('datos_articulos', $this->get_atributo_modelo("datos_articulos"));
            return true;
        } else {
            $this->set_atributo('datos_articulos', null);
            return false;
        }
    }
    public function get_rutas_proyecto()
    {
        if ($this->get_rutas_proyecto_modelo()) {
            $this->set_atributo('rutas_proyecto', $this->get_atributo_modelo("datos_rutas_proyecto"));
            return true;
        } else {
            $this->set_atributo('rutas_proyecto', null);
            return false;
        }
    }
}
