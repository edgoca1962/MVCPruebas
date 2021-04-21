<?php
class InicioModelo extends BaseLibreria
{
    private $id;
    private $consulta_base_datos;
    private $rutas_proyecto;

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
    protected function modifica_registro_modelo()
    {
        $this->id = $this->get_atributo_modelo('id');
        $this->consulta_base_datos = $this->conectar()->prepare(
            "UPDATE tabla SET campo1='modificación', campo2='modificacion', campo3='modificacion' WHERE id = :valor"
        );
        $this->consulta_base_datos->bindParam(':id', $this->id, PDO::PARAM_STR);
        if ($this->consulta_base_datos->execute()) {
            return true;
        } else {
            return false;
        }
    }
    protected function get_rutas_proyecto_modelo()
    {
        $this->consulta_base_datos = $this->conectar()->prepare(
            "SELECT * FROM rutas_proyecto"
        );
        $this->consulta_base_datos->execute();
        $this->rutas_proyecto = $this->consulta_base_datos->fetchall();
        if (count($this->rutas_proyecto) > 0) {
            return true;
        } else {
            $this->rutas_proyecto = null;
            return false;
        }
    }
}
