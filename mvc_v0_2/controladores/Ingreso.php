<?php
class Ingreso extends IngresoModelo
{
   private $vista;
   public function __construct()
   {
      $this->vista = get_class($this) . ".php";
   }
   public function inicio($parametros)
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
   public function getUsuario()
   {
      if (isset($_POST['usuario']) && isset($_POST['clave'])) {
         $this->usuario = $_POST['usuario'];
         $this->usuario = $this->controlador->getTextoLimpio($this->usuario);
         $this->clave = $_POST['clave'];
         $this->clave = $this->controlador->getTextoLimpio($this->clave);
         $this->getUsuarioModelo($this->usuario, $this->clave);
         if ($this->usuario == $this->getAtributoModelo('usuario') && crypt($this->clave, $this->getAtributoModelo('clave')) == $this->getAtributoModelo('clave')) {
            session_start();
            session_regenerate_id();
            $this->sesion->setAtributo('sesionId', session_id());
            $this->sesion->setAtributo('sesionUsuario', $this->getAtributoModelo('usuario'));
            $this->sesion->setAtributo('sesionUsuarioNombre', $this->getAtributoModelo('nombre'));
            $this->sesion->setAtributo('sesionFechaIngreso', $this->sesionFechaIngreso);
            $this->sesion->setAtributo('sesionHoraIngreso', $this->sesionHoraIngreso);
            $this->sesion->setAtributo('sesionHoraSalida', null);
            if ($this->sesion->setDatosSesion()) {
               $this->sesionUsuario = $this->sesion->getAtributo('sesionUsuario');
               $this->sesionUsuarioNombre = $this->sesion->getAtributo('sesionUsuarioNombre');
               header("Location: Inicio01");
            } else {
               $this->controlador->setAtributo('tiposcript', 'simple');
               $this->controlador->setAtributo('titulo', 'Alerta');
               $this->controlador->setAtributo('texto', 'No se pudo crear una nueva sesión');
               $this->controlador->setAtributo('tipoAlerta', 'error');
               $this->script = $this->controlador->getAlerta();
            }
         } else {
            $this->controlador->setAtributo('tiposcript', 'simple');
            $this->controlador->setAtributo('titulo', 'Alerta');
            $this->controlador->setAtributo('texto', 'La combinación ingresada de usuario y contraseña no se encuentra registrada.');
            $this->controlador->setAtributo('tipoAlerta', 'error');
            $this->script = $this->controlador->getAlerta();
         }
      } else {
         session_start();
         $this->sesion->setAtributo('sesionId', session_id());
         if ($this->sesion->getDatosSesion()) {
            $this->sesionHoraSalida = null;
            $this->sesion->actualizaDatosSesion();
         }
      }
   }
}
