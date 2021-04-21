<?php
class PlantillaModelo extends BaseLibreria
{
    private $titulo;
    private $logo;
    private $icono;

    private $categorias;
    private $redes_sociales;
    private $ruta_contenidos;
    private $ruta_css;
    private $ruta_dominio;
    private $ruta_js;
    private $ruta_css_plugins;
    private $ruta_js_plugins;
    private $ruta_img_anuncios;
    private $ruta_img_articulos;
    private $ruta_img_banners;
    private $ruta_img_blog;
    private $ruta_img_categorias;
    private $ruta_img_usrs;

    private $sobre_mi;
    private $sobre_mi_completo;

    private $datos_categorias;
    private $rutas_proyecto;
    private $datos_blog;
    private $consulta_base_datos;

    protected function get_atributo_modelo($atributo)
    {
        return $this->$atributo;
    }
    protected function set_atributo_modelo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    protected function get_datos_modelo()
    {
        if ($this->get_datos_blog()) {
            if ($this->get_redes_sociales()) {
                if ($this->rutas_proyecto()) {
                    if ($this->get_categorias()) {
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
    }
    protected function get_datos_blog()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM blog WHERE id = :valor");
        $this->consulta_base_datos->execute([":valor" => 3]);
        $this->datos_blog = $this->consulta_base_datos->fetch(PDO::FETCH_ASSOC);
        if (count($this->datos_blog) > 0) {
            $this->set_atributo_modelo('titulo', $this->datos_blog['titulo']);
            $this->set_atributo_modelo('logo', $this->datos_blog['logo']);
            $this->set_atributo_modelo('icono', $this->datos_blog['icono']);
            // $this->set_atributo_modelo('sobre_mi',$this->datos_blog[0]['sobre_mi']);
            // $this->set_atributo_modelo('sobre_mi_completo',$this->datos_blog[0]['sobre_mi_completo']);
            return true;
        } else {
            return false;
        }
    }
    protected function get_redes_sociales()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM redes_sociales");
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('redes_sociales', $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC));
        if (count($this->redes_sociales) > 0) {
            return true;
        } else {
            return false;
        }
    }
    protected function rutas_proyecto()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM rutas_proyecto ORDER BY id");
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('rutas_proyecto', $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC));
        if (count($this->rutas_proyecto) > 0) {
            $this->set_atributo_modelo('ruta_dominio', $this->rutas_proyecto[0]["ruta"]);
            $this->set_atributo_modelo('ruta_css', $this->ruta_dominio . $this->rutas_proyecto[1]["ruta"]);
            $this->set_atributo_modelo('ruta_js', $this->ruta_dominio . $this->rutas_proyecto[2]["ruta"]);
            $this->set_atributo_modelo('ruta_contenidos', $this->rutas_proyecto[3]["ruta"]);
            $this->set_atributo_modelo('ruta_css_plugins', $this->ruta_dominio . $this->rutas_proyecto[4]["ruta"]);
            $this->set_atributo_modelo('ruta_js_plugins', $this->ruta_dominio . $this->rutas_proyecto[5]["ruta"]);
            $this->set_atributo_modelo('ruta_img_anuncios', $this->ruta_dominio . $this->rutas_proyecto[6]["ruta"]);
            $this->set_atributo_modelo('ruta_img_articulos', $this->ruta_dominio . $this->rutas_proyecto[7]["ruta"]);
            $this->set_atributo_modelo('ruta_img_banners', $this->ruta_dominio . $this->rutas_proyecto[8]["ruta"]);
            $this->set_atributo_modelo('ruta_img_blog', $this->ruta_dominio . $this->rutas_proyecto[9]["ruta"]);
            $this->set_atributo_modelo('ruta_img_categorias', $this->ruta_dominio . $this->rutas_proyecto[10]["ruta"]);
            $this->set_atributo_modelo('ruta_img_usrs', $this->ruta_dominio . $this->rutas_proyecto[11]["ruta"]);
            return true;
        } else {
            return false;
        }
    }
    protected function get_categorias()
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT id,titulo_categoria,descripcion_categoria,ruta_categoria AS r_cat,
            CONCAT('Categorias/inicio/', ruta_categoria) as ruta_categoria, 
            img_categoria,fecha_categoria 
            FROM categorias"
        );
        $this->consulta_base_datos->execute();
        $this->datos_categorias = $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC);
        if (count($this->datos_categorias) > 0) {
            foreach ($this->datos_categorias as $key => $value) {
                if ($value['r_cat'] != "Inicio") {
                    $this->categorias[$value['r_cat']] = $value;
                }
            }
            return true;
        } else {
            return false;
        }
    }
}
