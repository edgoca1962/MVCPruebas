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
    private $datos_rutas_proyecto;
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
            if ($this->rutas_proyecto()) {
                return true;
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
            return true;
        } else {
            return false;
        }
    }
    protected function rutas_proyecto()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM rutas_proyecto ORDER BY id");
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('rutas_proyecto', $this->consulta_base_datos->fetchAll());
        foreach ($this->rutas_proyecto as $ruta) {
            $this->datos_rutas_proyecto[$ruta['ruta_descripcion']] = $ruta["ruta"];
        }
        if (count($this->rutas_proyecto) > 0) {
            $this->set_atributo_modelo('ruta_dominio', $this->datos_rutas_proyecto["dominio2"]);
            $this->set_atributo_modelo('ruta_css', $this->ruta_dominio . $this->datos_rutas_proyecto["css"]);
            $this->set_atributo_modelo('ruta_js', $this->ruta_dominio . $this->datos_rutas_proyecto["js"]);
            $this->set_atributo_modelo('ruta_contenidos', $this->datos_rutas_proyecto["contenidos"]);
            $this->set_atributo_modelo('ruta_css_plugins', $this->ruta_dominio . $this->datos_rutas_proyecto["css_plugins"]);
            $this->set_atributo_modelo('ruta_js_plugins', $this->ruta_dominio . $this->datos_rutas_proyecto["js_plugins"]);
            $this->set_atributo_modelo('ruta_img_anuncios', $this->ruta_dominio . $this->datos_rutas_proyecto["img_anuncios"]);
            $this->set_atributo_modelo('ruta_img_articulos', $this->ruta_dominio . $this->datos_rutas_proyecto["img_articulos"]);
            $this->set_atributo_modelo('ruta_img_banners', $this->ruta_dominio . $this->datos_rutas_proyecto["img_banners"]);
            $this->set_atributo_modelo('ruta_img_blog', $this->ruta_dominio . $this->datos_rutas_proyecto["img_blog"]);
            $this->set_atributo_modelo('ruta_img_categorias', $this->ruta_dominio . $this->datos_rutas_proyecto["img_categorias"]);
            $this->set_atributo_modelo('ruta_img_usrs', $this->ruta_dominio . $this->datos_rutas_proyecto["img_usrs"]);
            return true;
        } else {
            return false;
        }
    }
    protected function insertar_registro_modelo()
    {
        $this->id = $this->get_atributo_modelo('id');
        $this->consulta_base_datos = $this->conectar()->prepare(
            "INSERT INTO modelo (id) VALUES (:id)"
        );
        $this->consulta_base_datos->bindParam(':id', $this->id, PDO::PARAM_STR);
        if ($this->consulta_base_datos->execute()) {
            return true;
        } else {
            return false;
        }
    }
    protected function eliminar_registro_modelo()
    {
        $this->id = $this->get_atributo_modelo('id');
        $this->consulta_base_datos = $this->conectar()->prepare(
            "DELETE FROM modelo WHERE id = :valor"
        );
        $this->consulta_base_datos->bindParam(':id', $this->id, PDO::PARAM_STR);
        if ($this->consulta_base_datos->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
