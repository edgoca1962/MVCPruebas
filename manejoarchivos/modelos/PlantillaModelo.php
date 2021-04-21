<?php
class PlantillaModelo extends BaseLibreria
{
    private $consulta_base_datos;
    private $id;
    private $rutas_proyecto;

    protected function get_atributo_modelo($atributo)
    {
        return $this->$atributo;
    }
    protected function set_atributo_modelo($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    protected function get_rutas_proyecto_modelo()
    {
        $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM rutas_proyecto ORDER BY id");
        $this->consulta_base_datos->execute();
        $this->set_atributo_modelo('rutas_proyecto', $this->consulta_base_datos->fetchAll());
        foreach ($this->rutas_proyecto as $ruta) {
            $this->datos_rutas_proyecto[$ruta['ruta_descripcion']] = $ruta["ruta"];
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
}
