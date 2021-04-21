<?php
class InicioModelo extends BaseLibreria
{
    private $consulta_base_datos;
    private $id;
    private $tabla;
    private $datos_articulos;
    private $ruta_img_articulos;
    private $rutas_proyecto;
    private $datos_rutas_proyecto;

    protected function get_atributo_modelo($atributo)
    {
        return $this->$atributo;
    }
    protected function set_atributo_modelo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    protected function insertar_registro_modelo()
    {
        $this->id = $this->get_atributo_modelo('id');
        $this->consulta_base_datos = $this->conectar()->prepare(
            "INSERT INTO $this->tabla VALUES (:id)"
        );
        $this->consulta_base_datos->bindParam(':id', $this->id, PDO::PARAM_INT);
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
            "DELETE FROM $this->tabla WHERE id = :valor"
        );
        $this->consulta_base_datos->bindParam(':id', $this->id, PDO::PARAM_INT);
        if ($this->consulta_base_datos->execute()) {
            return true;
        } else {
            return false;
        }
    }
    protected function busca_articulos_modelo($consulta)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT id, titulo_articulo, descripcion_articulo FROM articulos WHERE titulo_articulo LIKE '%$consulta%' or descripcion_articulo LIKE '$consulta%' ORDER BY id LIMIT 0,5"
        );
        $this->consulta_base_datos->execute();
        $this->datos_articulos = $this->consulta_base_datos->fetchAll();
        if (count($this->datos_articulos) > 0) {
            return true;
        } else {
            return false;
        }
    }
    protected function get_articulos_modelo($tabla1, $tabla2, $desde, $cantidad)
    {
        $this->get_rutas_proyecto_modelo();
        $this->ruta_img_articulos = $this->datos_rutas_proyecto['dominio2'] . $this->datos_rutas_proyecto['img_articulos'];
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT $tabla1.*, $tabla2.*, CONCAT('vistas/img/articulos', portada_articulo) AS portada_articulo,
            DATE_FORMAT($tabla2.fecha_articulo,'%d.%m.%Y') AS fecha_articulo
            FROM $tabla1 INNER JOIN $tabla2 
            ON $tabla1.id = $tabla2.id_categoria
            ORDER BY $tabla2.id DESC LIMIT $desde, $cantidad"
        );
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('datos_articulos', $this->consulta_base_datos->fetchall());
        if (count($this->datos_articulos) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('articulos', null);
            return false;
        }
    }
    protected function get_rutas_proyecto_modelo()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT ruta_descripcion, ruta FROM rutas_proyecto ORDER BY id");
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('rutas_proyecto', $this->consulta_base_datos->fetchall());
        if (count($this->rutas_proyecto) > 0) {
            foreach ($this->rutas_proyecto as $ruta) {
                $this->datos_rutas_proyecto[$ruta['ruta_descripcion']] = $ruta["ruta"];
            }
            return true;
        } else {
            $this->set_atributo_modelo('datos_rutas_proyecto', null);
            return false;
        }
    }
}
