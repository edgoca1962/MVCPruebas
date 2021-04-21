<?php
  if ($peticionAjax) {
    require_once "../core/mainModel.php";
  }else {
    require_once "./core/mainModel.php";
  }
  class loginModelo extends mainModel {

    private $sql;
    private $Abitacora;
    private $respuesta;
    
  	protected function iniciar_sesion_modelo($datos) {
  		$this->sql = mainModel::conectar()->prepare("SELECT * FROM cuenta WHERE CuentaUsuario = :Usuario AND CuentaClave = :Clave AND CuentaEstado = 'Activo'" );
  		$this->sql->bindParam(':Usuario', $datos['Usuario']);
  		$this->sql->bindParam(':Clave', $datos['Clave']);
  		$this->sql->execute();
  		return $this->sql;
  	}
    protected function cerrar_sesion_modelo($datos){
      if ($datos['Usuario'] != "" && $datos['Token_S'] == $datos['Token']) {
        $this->Abitacora=mainModel::actualizar_bitacora($datos['Codigo'],$datos['Hora']);
        if ($this->Abitacora->rowCount()==1) {
          session_unset();
          session_destroy();
          $this->respuesta = "true";
        } else {
          $this->respuesta = "false";
        }
      } else {
        $this->respuesta = "false";
      }
      return $this->respuesta;
    }
  }