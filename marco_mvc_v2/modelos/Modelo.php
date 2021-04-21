<?php
class ModeloModelo extends BaseLibreria
{
    private $conexion_base_datos;
    private $id;

    protected function get_atributo_modelo($atributo)
    {
        return $atributo;
    }
    protected function set_atributo_modelo($atributo, $valor)
    {
        $this->$atributo = $valor;
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
