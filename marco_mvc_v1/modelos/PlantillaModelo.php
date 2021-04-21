<?php
class PlantillaModelo extends BaseLibreria
{
    private $conexion_base_datos;
    private $id;
    private $redes_sociales;
    private $categorias;

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
    protected function insertar_registro_modelo()
    {
        $this->id = $this->get_atributo_modelo('id');
        $this->conexion_base_datos = $this->conectar()->prepare(
            "INSERT INTO modelo (id) VALUES (:id)"
        );
        $this->conexion_base_datos->bindParam(':id', $this->id, PDO::PARAM_STR);
        if ($this->conexion_base_datos->execute()) {
            return true;
        } else {
            return false;
        }
    }
    protected function eliminar_registro_modelo()
    {
        $this->id = $this->get_atributo_modelo('id');
        $this->conexion_base_datos = $this->conectar()->prepare(
            "DELETE FROM modelo WHERE id = :valor"
        );
        $this->conexion_base_datos->bindParam(':id', $this->id, PDO::PARAM_STR);
        if ($this->conexion_base_datos->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
