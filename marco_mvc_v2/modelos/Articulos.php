<?php
class ArticulosModelo extends BaseLibreria
{
    private $id_articulo;
    private $id_categoria;
    private $portada_articulo;
    private $titulo_articulo;
    private $descripcion_articulo;
    private $palabras_claves;
    private $contenido_articulo;
    private $vistas_articulo;
    private $fecha_articulo;

    private $banner;
    private $titulo_banner;
    private $descripcion_banner;
    private $titulo_categoria;
    private $descripcion_categoria;
    private $articulos;
    private $anuncios;
    private $opiniones;
    private $articulos_destacados_recientes;
    private $total_articulos;

    private $categorias;
    private $categoria;
    private $datos_categorias;
    private $datos_total_articulos;
    private $consulta_base_datos;
    private $datos_articulo;

    protected function get_atributo_modelo($atributo)
    {
        return $this->$atributo;
    }
    protected function set_atributo_modelo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    protected function get_articulo_modelo($tabla1, $tabla2, $id_articulo)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT $tabla1.*, $tabla2.*, CONCAT('Articulos/inicio/', $tabla2.id) AS ruta_amigable,
                DATE_FORMAT($tabla2.fecha_articulo,'%d.%m.%Y') AS fecha_articulo
                FROM $tabla1 INNER JOIN $tabla2 
                ON $tabla1.id = $tabla2.id_categoria
                WHERE $tabla2.id = :valor
                ORDER BY $tabla2.id DESC"
        );
        $this->consulta_base_datos->execute([":valor" => $id_articulo]);
        $this->set_atributo_modelo('datos_articulo', $this->consulta_base_datos->fetch());
        if (count($this->datos_articulo) > 0) {
            $this->set_atributo_modelo('id_articulo', $this->datos_articulo['id']);
            $this->set_atributo_modelo('id_categoria', $this->datos_articulo['id_categoria']);
            $this->set_atributo_modelo('categoria', $this->datos_articulo['ruta_categoria']);
            $this->set_atributo_modelo('portada_articulo', $this->datos_articulo['portada_articulo']);
            $this->set_atributo_modelo('titulo_articulo', $this->datos_articulo['titulo_articulo']);
            $this->set_atributo_modelo('descripcion_articulo', $this->datos_articulo['descripcion_articulo']);
            $this->set_atributo_modelo('palabras_claves', explode(",", $this->datos_articulo['p_claves_articulo']));
            $this->set_atributo_modelo('contenido_articulo', $this->datos_articulo['contenido_articulo']);
            $this->set_atributo_modelo('vistas_articulo', $this->datos_articulo['vistas_articulo']);
            $this->set_atributo_modelo('fecha_articulo', $this->datos_articulo['fecha_articulo']);
            return true;
        } else {
            return false;
        }
    }
    protected function get_anuncios_modelo()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM anuncios WHERE pagina_anuncio = :valor");
        $this->consulta_base_datos->execute([":valor" => 'articulos']);
        $this->set_atributo_modelo('anuncios', $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC));
        if (count($this->anuncios) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('anuncios', null);
            return false;
        }
    }
    protected function get_banner_modelo()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM banner WHERE pagina_banner = :valor");
        $this->consulta_base_datos->execute([":valor" => "interno"]);
        $this->set_atributo_modelo('banner', $this->consulta_base_datos->fetch(PDO::FETCH_ASSOC));
        $this->set_atributo_modelo('titulo_banner', $this->banner['titulo_banner']);
        $this->set_atributo_modelo('descripcion_banner', $this->banner['descripcion_banner']);
        if (count($this->banner) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('banner', null);
            $this->set_atributo_modelo('titulo_banner', null);
            $this->set_atributo_modelo('descripcion_banner', null);
            return false;
        }
    }
    protected function get_total_articulos_modelo($categoria, $tabla1, $tabla2)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT count(*) AS total_articulos
            FROM $tabla1 INNER JOIN $tabla2 
            ON $tabla1.id = $tabla2.id_categoria
            WHERE $tabla1.ruta_categoria = :valor"
        );
        $this->consulta_base_datos->execute([":valor" => $categoria]);
        $this->set_atributo_modelo('datos_total_articulos', $this->consulta_base_datos->fetch());
        if ($this->datos_total_articulos > 0) {
            $this->set_atributo_modelo('total_articulos', $this->datos_total_articulos['total_articulos']);
            return true;
        } else {
            $this->set_atributo_modelo('total_articulos', null);
            return false;
        }
    }
    protected function get_articulos_modelo($categoria, $tabla1, $tabla2, $desde, $cantidad)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT $tabla1.*, $tabla2.*, CONCAT('Articulos/inicio/', $tabla2.id) AS ruta_amigable,
            DATE_FORMAT($tabla2.fecha_articulo,'%d.%m.%Y') AS fecha_articulo
            FROM $tabla1 INNER JOIN $tabla2 
            ON $tabla1.id = $tabla2.id_categoria
            WHERE $tabla1.ruta_categoria = :valor
            ORDER BY $tabla2.id DESC LIMIT $desde, $cantidad"
        );
        $this->consulta_base_datos->execute([":valor" => $categoria]);
        $this->set_atributo_modelo('articulos', $this->consulta_base_datos->fetchall(PDO::FETCH_ASSOC));
        if (count($this->articulos) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('articulos', null);
            return false;
        }
    }
    protected function get_articulos_destacados_recientes_modelo($categoria, $tabla1, $tabla2)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT $tabla1.*, $tabla2.*, CONCAT('Articulos/inicio/', $tabla2.id) AS ruta_amigable,
            DATE_FORMAT($tabla2.fecha_articulo,'%d.%m.%Y') AS fecha_articulo
            FROM $tabla1 INNER JOIN $tabla2 
            ON $tabla1.id = $tabla2.id_categoria
            WHERE $tabla1.ruta_categoria = :valor
            ORDER BY $tabla2.vistas_articulo DESC LIMIT 0, 3"
        );
        $this->consulta_base_datos->execute([":valor" => $categoria]);
        $this->set_atributo_modelo('articulos_destacados_recientes', $this->consulta_base_datos->fetchall(PDO::FETCH_ASSOC));
        if (count($this->articulos_destacados_recientes) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('articulos_destacados_recientes', null);
            return false;
        }
    }
    protected function get_datos_categoria_modelo($categoria)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT id,titulo_categoria,descripcion_categoria,ruta_categoria AS r_cat,
            CONCAT('Categoria/inicio/', ruta_categoria) as ruta_categoria, 
            img_categoria,fecha_categoria 
            FROM categorias"
        );
        $this->consulta_base_datos->execute();
        $this->datos_categorias = $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC);
        if (count($this->datos_categorias) > 0) {
            foreach ($this->datos_categorias as $key => $value) {
                $this->categorias[$value['r_cat']] = $value;
            }
            $this->set_atributo_modelo('titulo_categoria', $this->categorias[$categoria]['titulo_categoria']);
            $this->set_atributo_modelo('descripcion_categoria', $this->categorias[$categoria]['descripcion_categoria']);
            return true;
        } else {
            return false;
        }
    }
}
