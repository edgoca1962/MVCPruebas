<?php
class Pagina4
{
   private $vista;
   private $alerta;

   public function __construct()
   {
      $this->vista = get_class($this) . ".php";
      $this->alerta = null;
   }
   public function get_atributo($atributo)
   {
      return $this->$atributo;
   }
   public function set_atributo($atributo, $valor)
   {
      $this->$atributo = $valor;
   }
   public function inicio($parametros = [])
   {
   }
}
