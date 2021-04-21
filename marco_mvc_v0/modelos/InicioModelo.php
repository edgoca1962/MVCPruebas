<?php
class InicioModelo extends BaseLibreria
{
    private $banner;
    private $titulo_categoria;
    private $descripcion_categoria;
    private $palabras_claves;
    private $articulos;
    private $anuncios;
    private $articulos_destacados_recientes;
    private $total_articulos;

    private $categorias;
    private $datos_categorias;
    private $datos_palabras_claves;
    private $datos_total_articulos;
    private $consulta_base_datos;

    protected function get_atributo_modelo($atributo)
    {
        return $this->$atributo;
    }
    protected function set_atributo_modelo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    protected function get_palabras_claves_modelo()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM palabras_claves WHERE id_categoria = :valor");
        $this->consulta_base_datos->execute([":valor" => 7]);
        $this->datos_palabras_claves = $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC);
        if (count($this->datos_palabras_claves) > 0) {
            foreach ($this->datos_palabras_claves as $key => $value) {
                $this->palabras_claves .= $value['palabra_clave'] . ", ";
            }
            $this->set_atributo_modelo('palabras_claves', trim($this->palabras_claves, ", "));
            return true;
        } else {
            $this->set_atributo_modelo('palabras_claves', null);
            return false;
        }
    }
    protected function get_anuncios_modelo()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM anuncios WHERE pagina_anuncio = :valor");
        $this->consulta_base_datos->execute([":valor" => "Inicio"]);
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
        $this->consulta_base_datos->execute([":valor" => "Inicio"]);
        $this->set_atributo_modelo('banner', $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC));
        if (count($this->banner) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('banner', null);
            return false;
        }
    }
    protected function get_total_articulos_modelo($tabla)
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT count(*) AS total_articulos FROM $tabla");
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('datos_total_articulos', $this->consulta_base_datos->fetch());
        if ($this->datos_total_articulos > 0) {
            $this->set_atributo_modelo('total_articulos', $this->datos_total_articulos['total_articulos']);
            return true;
        } else {
            $this->set_atributo_modelo('total_articulos', null);
            return false;
        }
    }
    protected function get_articulos_modelo($tabla1, $tabla2, $desde, $cantidad)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT $tabla1.*, $tabla2.*, CONCAT('Articulos/inicio/', $tabla2.id) AS ruta_amigable,
            DATE_FORMAT($tabla2.fecha_articulo,'%d.%m.%Y') AS fecha_articulo
            FROM $tabla1 INNER JOIN $tabla2 
            ON $tabla1.id = $tabla2.id_categoria
            ORDER BY $tabla2.id DESC LIMIT $desde, $cantidad"
        );
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('articulos', $this->consulta_base_datos->fetchall(PDO::FETCH_ASSOC));
        if (count($this->articulos) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('articulos', null);
            return false;
        }
    }
    protected function get_articulos_destacados_recientes_modelo($tabla1, $tabla2)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT $tabla1.*, $tabla2.*, CONCAT('Articulos/inicio/', $tabla2.id) AS ruta_amigable,
            DATE_FORMAT($tabla2.fecha_articulo,'%d.%m.%Y') AS fecha_articulo
            FROM $tabla1 INNER JOIN $tabla2 
            ON $tabla1.id = $tabla2.id_categoria
            ORDER BY $tabla2.vistas_articulo DESC LIMIT 0, 3"
        );
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('articulos_destacados_recientes', $this->consulta_base_datos->fetchall(PDO::FETCH_ASSOC));
        if (count($this->articulos_destacados_recientes) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('articulos_destacados_recientes', null);
            return false;
        }
    }
    protected function get_datos_categoria_modelo()
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT id,titulo_categoria,descripcion_categoria,ruta_categoria AS r_cat,
            CONCAT('Categoria/inicio/', ruta_categoria) as ruta_categoria, 
            img_categoria,fecha_categoria 
            FROM categorias
            WHERE ruta_categoria = :valor"
        );
        $this->consulta_base_datos->execute([":valor" => "Inicio"]);
        $this->datos_categorias = $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC);
        if (count($this->datos_categorias) > 0) {
            foreach ($this->datos_categorias as $key => $value) {
                $this->categorias[$value['r_cat']] = $value;
            }
            $this->set_atributo_modelo('titulo_categoria', $this->categorias['Inicio']['titulo_categoria']);
            $this->set_atributo_modelo('descripcion_categoria', $this->categorias['Inicio']['descripcion_categoria']);
            return true;
        } else {
            return false;
        }
    }
}
