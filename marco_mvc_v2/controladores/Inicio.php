<?php
class Inicio extends InicioModelo
{
    private $banner;
    private $titulo_categoria;
    private $descripcion_categoria;
    private $palabras_claves;

    private $articulos;
    private $anuncios;
    private $articulos_destacados_recientes;
    private $total_articulos;

    private $tabla1;
    private $tabla2;
    private $ruta_amigable_paginacion;
    private $pagina_actual;
    private $primera_pagina;
    private $ultima_pagina;
    private $total_paginas;
    private $desde;
    private $cantidad;
    private $vista;
    private $alerta;

    public function __construct()
    {
        $this->banner = null;
        $this->titulo_categoria = null;
        $this->descripcion_categoria = null;
        $this->palabras_claves = null;

        $this->articulos = null;
        $this->anuncios = null;
        $this->articulos_destacados_recientes = null;

        $this->tabla1 = "categorias";
        $this->tabla2 = "articulos";
        $this->ruta_amigable_paginacion = "Inicio/inicio/";
        $this->total_articulos = null;
        $this->pagina_actual = 1;
        $this->primera_pagina = 0;
        $this->ultima_pagina = 5;
        $this->total_paginas = null;
        $this->desde = 0;
        $this->cantidad = 5;
        $this->vista = get_class($this) . ".php";
        $this->alerta = null;

        $this->inicio($this->pagina_actual);
    }
    public function get_atributo($atributo)
    {
        return $this->$atributo;
    }
    public function set_atributo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function inicio($parametros)
    {

        if ($this->get_datos_categoria()) {
            if ($this->get_palabras_claves()) {
                if ($this->get_anuncios()) {
                    if ($this->get_banner()) {
                        if ($this->get_articulos($parametros)) {
                            if ($this->get_articulos_destacados_recientes()) {
                                return true;
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function get_datos_categoria()
    {
        if ($this->get_datos_categoria_modelo()) {
            $this->set_atributo('titulo_categoria', $this->get_atributo_modelo("titulo_categoria"));
            $this->set_atributo('descripcion_categoria', $this->get_atributo_modelo("descripcion_categoria"));
            return true;
        } else {
            $this->set_atributo('titulo_categoria', null);
            $this->set_atributo('descripcion_categoria', null);
            return false;
        }
    }
    public function get_palabras_claves()
    {
        if ($this->get_palabras_claves_modelo()) {
            $this->set_atributo('palabras_claves', $this->get_atributo_modelo('palabras_claves'));
            return true;
        } else {
            $this->set_atributo('palabras_claves', null);
            return false;
        }
    }
    public function get_anuncios()
    {
        if ($this->get_anuncios_modelo()) {
            $this->set_atributo('anuncios', $this->get_atributo_modelo('anuncios'));
            return true;
        } else {
            $this->set_atributo('anuncios', null);
            return false;
        }
    }
    public function get_banner()
    {
        if ($this->get_banner_modelo()) {
            $this->set_atributo('banner', $this->get_atributo_modelo('banner'));
            return true;
        } else {
            $this->banner = null;
            return false;
        }
    }
    public function get_total_articulos()
    {
        if ($this->get_total_articulos_modelo($this->tabla2)) {
            $this->set_atributo('total_articulos', $this->get_atributo_modelo("total_articulos"));
            return true;
        } else {
            $this->set_atributo('total_articulos', null);
            return false;
        }
    }
    public function get_articulos($pagina)
    {
        $this->get_total_articulos();
        $this->set_atributo('pagina_actual', $pagina);
        $this->set_atributo('total_paginas', ceil($this->total_articulos / $this->cantidad));
        $this->set_atributo('desde', ($pagina - 1) * $this->cantidad);

        if ($this->pagina_actual > 5 && $this->pagina_actual <= $this->total_paginas) {
            $this->set_atributo('primera_pagina', $this->pagina_actual - 5);
            $this->set_atributo('ultima_pagina', $this->pagina_actual);
        } else {
            $this->set_atributo('primera_pagina', 0);
            $this->set_atributo('ultima_pagina', 5);
        }

        if ($this->get_articulos_modelo($this->tabla1, $this->tabla2, $this->desde, $this->cantidad)) {
            $this->set_atributo('articulos', $this->get_atributo_modelo("articulos"));
            return true;
        } else {
            $this->set_atributo('articulos', null);
            return false;
        }
    }
    public function get_articulos_destacados_recientes()
    {
        if ($this->get_articulos_destacados_recientes_modelo($this->tabla1, $this->tabla2)) {
            $this->set_atributo('articulos_destacados_recientes', $this->get_atributo_modelo('articulos_destacados_recientes'));
            return true;
        } else {
            $this->set_atributo('articulos_destacados_recientes', null);
            return false;
        }
    }
}
