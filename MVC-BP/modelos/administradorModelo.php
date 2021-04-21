<?php
	if ($peticionAjax) {
		require_once "../core/mainModel.php";
	}else {
		require_once "./core/mainModel.php";
	}	
	class administradorModelo extends mainModel{
		private $sql;
		protected function agregar_administrador_modelo($datos){
			$this->sql=mainModel::conectar()->prepare("INSERT INTO admin(AdminDNI,AdminNombre,AdminApellido,AdminTelefono,AdminDireccion,CuentaCodigo) VALUES(:DNI,:Nombre,:Apellido,:Telefono,:Direccion,:Codigo)");
			$this->sql->bindParam(":DNI",$datos['DNI']);
			$this->sql->bindParam(":Nombre",$datos['Nombre']);
			$this->sql->bindParam(":Apellido",$datos['Apellido']);
			$this->sql->bindParam(":Telefono",$datos['Telefono']);
			$this->sql->bindParam(":Direccion",$datos['Direccion']);
			$this->sql->bindParam(":Codigo",$datos['Codigo']);
			$this->sql->execute();
			return $this->sql;
		}
	}