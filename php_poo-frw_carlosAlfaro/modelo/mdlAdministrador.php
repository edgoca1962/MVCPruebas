<?php
class mdlAdministrador
{
	private $AdminDNI;
	private $AdminNombre;
	private $AdminApellido;
	private $AdminTelefono;
	private $AdminDireccion;
	private $CuentaCodigo;
	private	$administradoresList;
	private $administradores;
	private $administrador;
	private $Administrador;
	private $sql;
	protected function consultar_administrador_modelo($consulta)
	{
		$this->administradoresList = [];
		$this->sql = $this->Conexion()->prepare($consulta);
		$this->sql->execute();
		foreach ($this->sql as $this->administrador) {
			$this->Administrador = new AdministradorEntidad();
			$this->Administrador->consultar_administrador_entidad(
				$this->administrador["id"],
				$this->administrador["AdminDNI"],
				$this->administrador["AdminNombre"],
				$this->administrador["AdminApellido"],
				$this->administrador["AdminTelefono"],
				$this->administrador["AdminDireccion"],
				$this->administrador["CuentaCodigo"]
			);
			array_push($this->administradoresList, $this->Administrador);
		}
		return $this->administradoresList;
	}
	protected function insertar_administrador_modelo(AdministradorEntidad $Administrador)
	{
		$this->sql = $this->Conexion()->prepare("
				INSERT INTO admin(AdminDNI,AdminNombre,AdminApellido,AdminTelefono,AdminDireccion,CuentaCodigo) 
				VALUES(:DNI,:Nombre,:Apellido,:Telefono,:Direccion,:Codigo)
				");
		$this->AdminDNI = $Administrador->getAdminDNI();
		$this->AdminNombre = $Administrador->getAdminNombre();
		$this->AdminApellido = $Administrador->getAdminApellido();
		$this->AdminTelefono = $Administrador->getAdminTelefono();
		$this->AdminDireccion = $Administrador->getAdminDireccion();
		$this->CuentaCodigo = $Administrador->getCuentaCodigo();
		$this->sql->bindParam(":DNI", $this->AdminDNI, PDO::PARAM_STR);
		$this->sql->bindParam(":Nombre", $this->AdminNombre, PDO::PARAM_STR);
		$this->sql->bindParam(":Apellido", $this->AdminApellido, PDO::PARAM_STR);
		$this->sql->bindParam(":Telefono", $this->AdminTelefono, PDO::PARAM_STR);
		$this->sql->bindParam(":Direccion", $this->AdminDireccion, PDO::PARAM_STR);
		$this->sql->bindParam(":Codigo", $this->CuentaCodigo, PDO::PARAM_STR);
		return $this->sql->execute();
	}
	protected function eliminar_administrador_modelo($codigo)
	{
		$sql = $this->Conectar()->prepare("DELETE FROM admin WHERE AdminDNI=:Codigo");
		$sql->bindParam(":Codigo", $codigo);
		$sql->execute();
		return $sql;
	}
}
