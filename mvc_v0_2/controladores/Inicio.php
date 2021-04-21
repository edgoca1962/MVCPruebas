<?php
class Inicio extends InicioModelo
{
   private $componente;
   private $palabras_claves;
   private $descripcion;
   private $titulo;
   private $datos_palabras_claves;
   private $datos_componentes;
   private $vista;
   public function __construct()
   {
      parent::__construct();
      $this->componente = null;
      $this->palabras_claves = null;
      $this->descripcion = null;
      $this->titulo = null;
      $this->datos_palabras_claves = null;
      $this->vista = get_class($this) . ".php";
      $this->datos_componentes = null;
   }
   public function inicio($parametros)
   {
      $this->get_componentes();
   }
   public function get_atributo($atributo)
   {
      return $this->$atributo;
   }
   public function set_atributo($atributo, $valor)
   {
      $this->$atributo = $valor;
   }
   public function get_componentes()
   {
      $this->set_atributo_modelo("vista", "Inicio");
      if ($this->get_componentes_modelo()) {
         $this->datos_componentes = $this->get_atributo_modelo("datos_componentes");
         foreach ($this->datos_componentes as $key) {
            $this->componente[$key["componente"]][] = $key["valor"];
         }
         $this->descripcion = $this->componente["descripcion"][0];
         $this->titulo = $this->componente["titulo"][0];
         $this->palabras_claves = $this->componente["palabras_claves"];
         for ($i = 0; $i < count($this->palabras_claves); $i++) {
            $this->datos_palabras_claves .= $this->palabras_claves[$i] . ",";
         }
         $this->palabras_claves = trim($this->datos_palabras_claves, ",");
      } else {
         $this->set_atributo("datos_componentes", null);
      }
      $this->conexion = null;
   }
}
