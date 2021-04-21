<?php
class OpinionesModelo extends BaseLibreria
{
    private $id;
    protected function get_atributo_modelo($atributo)
    {
        return $atributo;
    }
    protected function set_atributo_modelo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    protected function get_opiniones_articulo_modelo($tabla1, $tabla2, $id_articulo)
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT $tabla1.*,$tabla2.*,
            DATE_FORMAT($tabla1.fecha_opinion,'%d.%m.%Y') AS fecha_opinion,
            DATE_FORMAT($tabla1.fecha_respuesta,'%d.%m.%Y') AS fecha_respuesta
            FROM $tabla1 INNER JOIN $tabla2 
            ON $tabla1.id_administrador = $tabla2.id
            WHERE $tabla1.id_articulo = :valor
            ORDER BY $tabla1.fecha_opinion DESC"
        );
        $this->consulta_base_datos->execute([':valor' => $id_articulo]);
        $this->set_atributo_modelo('opiniones', $this->consulta_base_datos->fetchAll(PDO::FETCH_ASSOC));
        if (count($this->opiniones) > 0) {
            return true;
        } else {
            $this->set_atributo_modelo('opiniones', null);
            return false;
        }
    }
    protected function set_opinion_articulo_modelo($tabla)
    {
        $this->id_articulo = $this->get_atributo_modelo('id_articulo');
        $this->nombre_opinion = $this->get_atributo_modelo('nombre_opinion');
        $this->correo_opinion = $this->get_atributo_modelo('correo_opinion');
        $this->contenido_opinion = $this->get_atributo_modelo('contenido_opinion');
        $this->foto_opinion = $this->get_atributo_modelo('foto_opinion');
        $this->id_administrador = 1;
        $this->fecha_opinion = $this->get_atributo_modelo('fecha_opinion');

        $this->consultaBd = $this->conectar()->prepare(
            "INSERT INTO $tabla (id_articulo,nombre_opinion,correo_opinion,foto_opinion, contenido_opinion,id_administrador,fecha_opinion) 
            VALUES (:id_art,:nombre,:correo,:foto,:contenido,:id_adm,:fecha)"
        );
        $this->consultaBd->bindParam(':id_art', $this->id_articulo, PDO::PARAM_INT);
        $this->consultaBd->bindParam(':nombre', $this->nombre_opinion, PDO::PARAM_STR);
        $this->consultaBd->bindParam(':correo', $this->correo_opinion, PDO::PARAM_STR);
        $this->consultaBd->bindParam(':foto', $this->foto_opinion, PDO::PARAM_STR);
        $this->consultaBd->bindParam(':contenido', $this->contenido_opinion, PDO::PARAM_STR);
        $this->consultaBd->bindParam(':id_adm', $this->id_administrador, PDO::PARAM_INT);
        $this->consultaBd->bindParam(':fecha', $this->fecha_opinion, PDO::PARAM_STR);
        if ($this->consultaBd->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
