<?php
	return new ajxAdministrador();
	class ajxAdministrador{
		private $insAdmin;
		public function ajxAdministrador(){
			return self::procesa_ajx_administrador();
		}
		private function procesa_ajx_administrador(){
			if (isset($_POST['dni-reg'])) {
				$this->insAdmin = new ctlAdministrador();
				if (isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && isset($_POST['usuario-reg'])) {
					return $this->insAdmin->agregar_administrador_controlador();
				}
			} else {
				session_start();
				session_destroy();
				return '<script> window.location.href="'.SERVERURL.'login/"</script>';
			}
		}		
	}