<?php
class PlantillaModelo extends BaseLibreria
{
   private $id;
   private $titulo;
   private $icono;
   private $logotipo;
   private $rutas_proyecto;

   private $consulta_base_datos;
   private $datos_rutas_proyecto;
   private $datos_componentes;

   protected function __construct()
   {
      $this->consulta_base_datos = null;
      $this->id = null;
      $this->datos_rutas_proyecto = null;
      $this->rutas_proyecto = null;
   }

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
      $this->consulta_base_datos = $this->conectar()->prepare("SELECT * FROM rutas_proyecto");
      $this->consulta_base_datos->execute();
      $this->datos_rutas_proyecto = $this->consulta_base_datos->fetchAll();
      $this->conexion = null;
      if (count($this->datos_rutas_proyecto) > 0) {
         $this->rutas_proyecto = $this->datos_rutas_proyecto;
         return true;
      } else {
         $this->rutas_proyecto = null;
         return false;
      }
   }
   protected function get_componentes_modelo()
   {
      $this->consulta_base_datos = $this->conectar()->prepare("SELECT componente, valor FROM elementos WHERE vista = :vista");
      $this->consulta_base_datos->bindParam(':vista', $this->vista, PDO::PARAM_STR);
      $this->consulta_base_datos->execute();
      $this->datos_componentes = $this->consulta_base_datos->fetchAll();
      $this->conexion = null;
      if (count($this->datos_componentes) > 0) {
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
