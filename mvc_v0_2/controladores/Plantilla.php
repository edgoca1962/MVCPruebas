<?php
class Plantilla extends PlantillaModelo
{
   private $rutas_proyecto;
   private $datos_rutas_proyecto;
   private $componente;
   private $datos_componentes;
   private $titulo;
   private $logo;
   private $icono;
   private $ruta_dominio;
   private $ruta_contenidos;
   private $ruta_css;
   private $ruta_js;
   private $ruta_img_banners;
   private $ruta_img_generales;
   private $ruta_img_usrs;


   public function __construct()
   {
      parent::__construct();
      $this->rutas_proyecto = null;
      $this->datos_rutas_proyecto = null;
      $this->componente = null;
      $this->datos_componentes = null;
      $this->titulo = null;
      $this->logo = null;
      $this->icono = null;
      $this->ruta_dominio = null;
      $this->ruta_contenidos = null;
      $this->ruta_css = null;
      $this->ruta_js = null;
      $this->ruta_img_banners = null;
      $this->ruta_img_generales = null;
      $this->ruta_img_usrs = null;
      $this->get_rutas_proyecto();
      $this->get_componentes();
   }
   public function inicio($parametros = null)
   {
   }
   public function get_atributo($atributo)
   {
      return $this->$atributo;
   }
   public function set_atributo($atributo, $valor)
   {
      $this->$atributo = $valor;
   }
   public function get_rutas_proyecto()
   {
      if ($this->get_rutas_proyecto_modelo()) {
         $this->rutas_proyecto = $this->get_atributo_modelo("rutas_proyecto");
         foreach ($this->rutas_proyecto as $key => $value) {
            $this->datos_rutas_proyecto[$value['ruta_descripcion']] = $value;
         }
         $this->rutas_proyecto = $this->datos_rutas_proyecto;
         /*
            $this->set_atributo('titulo_plantilla', $this->get_atributo_modelo('titulo'));
            $this->set_atributo('logo', $this->get_atributo_modelo('logo'));
            $this->set_atributo('icono', $this->get_atributo_modelo('icono'));
            */
         $this->set_atributo('ruta_dominio', $this->rutas_proyecto["dominio"]["ruta"]);
         $this->set_atributo('ruta_contenidos', $this->ruta_dominio . $this->rutas_proyecto["contenidos"]["ruta"]);
         $this->set_atributo('ruta_css', $this->ruta_dominio . $this->rutas_proyecto["css"]["ruta"]);
         $this->set_atributo('ruta_js', $this->ruta_dominio . $this->rutas_proyecto["js"]["ruta"]);
         $this->set_atributo('ruta_img_banners',  $this->ruta_dominio . $this->rutas_proyecto["img_banners"]["ruta"]);
         $this->set_atributo('ruta_img_generales', $this->ruta_dominio . $this->rutas_proyecto["img_generales"]["ruta"]);
         $this->set_atributo('ruta_img_usrs', $this->ruta_dominio . $this->rutas_proyecto["img_usrs"]["ruta"]);
      } else {
         $this->rutas_proyecto = null;
      }
      $this->conexion = null;
   }
   public function get_componentes()
   {
      $this->set_atributo_modelo("vista", "Plantilla");
      if ($this->get_componentes_modelo()) {
         $this->datos_componentes = $this->get_atributo_modelo("datos_componentes");
         foreach ($this->datos_componentes as $key) {
            $this->componente[$key["componente"]][] = $key["valor"];
         }
         $this->titulo = $this->componente["titulo"][0];
         $this->icono = $this->ruta_img_generales . $this->componente["icono"][0];
         $this->logo = $this->ruta_img_generales . $this->componente["logotipo"][0];
      } else {
      }
   }
}
