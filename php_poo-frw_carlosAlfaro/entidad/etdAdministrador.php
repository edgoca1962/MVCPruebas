<?php
	declare(strict_types = 1);
	class etdAdministrador{
		private $id;
		private $AdminDNI;
		private $AdminNombre;
		private $AdminApellido;
		private $AdminTelefono;
		private $AdminDireccion;
		private $CuentaCodigo;
		public function etdAdministrador(){}
		public function consultar_administrador_entidad (int $id, string $AdminDNI, string $AdminNombre, string $AdminApellido, string $AdminTelefono, string $AdminDireccion, string $CuentaCodigo){
			$this->id = $id;
			$this->AdminDNI = $AdminDNI;
			$this->AdminNombre = $AdminNombre;
			$this->AdminApellido = $AdminApellido;
			$this->AdminTelefono = $AdminTelefono;
			$this->AdminDireccion = $AdminDireccion;
			$this->CuentaCodigo = $CuentaCodigo;
		}
		public function insertar_administrador_entidad (string $AdminDNI, string $AdminNombre, string $AdminApellido, string $AdminTelefono, string $AdminDireccion, string $CuentaCodigo){
			$this->AdminDNI = $AdminDNI;
			$this->AdminNombre = $AdminNombre;
			$this->AdminApellido = $AdminApellido;
			$this->AdminTelefono = $AdminTelefono;
			$this->AdminDireccion = $AdminDireccion;
			$this->CuentaCodigo = $CuentaCodigo;
		}
		public function getId(){
			return $this->id;
		}
		public function setId(int $id){
			$this->id = $id;
		}
	    public function getAdminDNI(){
	        return $this->AdminDNI;
	    }
	    public function setAdminDNI(string $AdminDNI){
	        $this->AdminDNI = $AdminDNI;
	    }
	    public function getAdminNombre(){
	        return $this->AdminNombre;
	    }
	    public function setAdminNombre(string $AdminNombre){
	        $this->AdminNombre = $AdminNombre;
	    }
	    public function getAdminApellido(){
	        return $this->AdminApellido;
	    }
	    public function setAdminApellido(string $AdminApellido){
	        $this->AdminApellido = $AdminApellido;
	    }
	    public function getAdminTelefono(){
	        return $this->AdminTelefono;
	    }
	    public function setAdminTelefono(string $AdminTelefono){
	        $this->AdminTelefono = $AdminTelefono;
	    }
	    public function getAdminDireccion(){
	        return $this->AdminDireccion;
	    }
	    public function setAdminDireccion(string $AdminDireccion){
	        $this->AdminDireccion = $AdminDireccion;
	    }
	    public function getCuentaCodigo(){
	        return $this->CuentaCodigo;
	    }
	    public function setCuentaCodigo(string $CuentaCodigo){
	        $this->CuentaCodigo = $CuentaCodigo;
	    }
	    public function toString(){
	    	return "[" . $this->id . "]" . "[" . $this->AdminDNI . "]" . "[" . $this->AdminNombre . "]" . "[" . $this->AdminApellido . "]" . "[" . $this->AdminTelefono . "]" . "[" . $this->AdminDireccion . "]" . "[" . $this->CuentaCodigo . "]";
	    }
	    public function toArray(){
	    	return array($this->id, $this->AdminDNI, $this->AdminNombre, $this->AdminApellido, $this->AdminTelefono, $this->AdminDireccion, $this->CuentaCodigo);
	    }
}
