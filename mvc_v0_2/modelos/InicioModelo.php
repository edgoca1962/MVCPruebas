<?php
class InicioModelo extends BaseLibreria
{
   private $vista;
   private $componente;
   private $palabras_clave;
   private $descripcion;
   private $titulo;
   private $datos_componentes;
   private $consulta_base_datos;

   protected function __construct()
   {
      $this->vista = null;
      $this->componente = null;
      $this->palabras_clave = null;
      $this->descripcion = null;
      $this->titulo = null;
      $this->datos_componentes = null;
      $this->consulta_base_datos = null;
   }
   protected function get_atributo_modelo($atributo)
   {
      return $this->$atributo;
   }
   protected function set_atributo_modelo($atributo, $valor)
   {
      $this->$atributo = $valor;
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
}
