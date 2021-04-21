<?php
class Administrador extends AdministradorModelo
{
	private $dni;
	private $nombre;
	private $apellido;
	private $telefono;
	private $direccion;
	private $foto;

	private $usuario;
	private $password1;
	private $password2;
	private $email;
	private $genero;
	private $privilegio;

	private $registros;
	private $url;
	private $parametros;

	private $alerta;
	private $consulta1;
	private $consulta2;
	private $ec;
	private $consulta3;
	private $consulta4;
	private $numero;
	private $codigo;
	private $clave;
	private $dataAC;
	private $dataAD;
	private $guardarCuenta;
	private $guardarAdmin;

	public function __construct()
	{
		parent::__construct();
		$this->url = new Controlador;
		$this->alerta = "";
		$this->registros = [];
	}

	public function index()
	{
		$this->parametros = [
			'page_id' => 6,
			'page_tag' => 'Administradores - Tienda Virtual',
			'page_title' => 'Administradores - Tienda Virtual',
			'page_name' => 'administrador',
			'mensaje' => '',
			'usuarios' => $this->registros,
			'alerta' => $this->alerta
		];
		$this->url->getVista('administrador', $this->parametros);
	}
	public function setAlerta($alerta)
	{
		$this->alerta = $alerta;
	}

	public function agregar_administrador_controlador()
	{
		$this->dni = mainModel::limpiar_cadena($_POST['dni-reg']);
		$this->nombre = mainModel::limpiar_cadena($_POST['nombre-reg']);
		$this->apellido = mainModel::limpiar_cadena($_POST['apellido-reg']);
		$this->telefono = mainModel::limpiar_cadena($_POST['telefono-reg']);
		$this->direccion = mainModel::limpiar_cadena($_POST['direccion-reg']);

		$this->usuario = mainModel::limpiar_cadena($_POST['usuario-reg']);
		$this->password1 = mainModel::limpiar_cadena($_POST['password1-reg']);
		$this->password2 = mainModel::limpiar_cadena($_POST['password2-reg']);
		$this->email = mainModel::limpiar_cadena($_POST['email-reg']);
		$this->genero = mainModel::limpiar_cadena($_POST['optionsGenero']);
		$this->privilegio = mainModel::limpiar_cadena($_POST['optionsPrivilegio']);

		if ($this->genero == "Masculino") {
			$this->foto = "Male3Avatar.png";
		} else {
			$this->foto = "Famle3Avatar.png";
		}
		if ($this->password1 != $this->password2) {
			$this->alerta = [
				"Alerta" => "simple",
				"Titulo" => "Ocurrió un error inesperado.",
				"Texto" => "Las contraseñas no coinciden.",
				"Tipo" => "error"
			];
		} else {
			$this->consulta1 = $this->consultaSimple("SELECT AdminDNI FROM admin WHERE AdminDNI = '$this->dni'");
			if ($this->consulta1->rowCount() >= 1) {
				$this->alerta = [
					"Alerta" => "simple",
					"Titulo" => "Ocurrió un error inesperado.",
					"Texto" => "El DNI ya se encuentra registrado.",
					"Tipo" => "error"
				];
			} else {
				if ($this->email != "") {
					$this->consulta2 = $this->consultaSimple("SELECT CuentaEmail FROM cuenta WHERE CuentaEmail = '$this->email'");
					$this->ec = $this->consulta2->rowCount();
				} else {
					$this->ec = 0;
				}
				if ($this->ec >= 1) {
					$this->alerta = [
						"Alerta" => "simple",
						"Titulo" => "Ocurrió un error inesperado.",
						"Texto" => "El email ya se encuentra registrado.",
						"Tipo" => "error"
					];
				} else {
					$this->consulta3 = $this->consultaSimple("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario = '$this->usuario'");
					if ($this->consulta3->rowCount() >= 1) {
						$this->alerta = [
							"Alerta" => "simple",
							"Titulo" => "Ocurrió un error inesperado.",
							"Texto" => "El usuario ya se encuentra registrado.",
							"Tipo" => "error"
						];
					} else {
						$this->consulta4 = $this->consultaSimple("SELECT id FROM cuenta");
						$this->numero = ($this->consulta4->rowCount()) + 1;
						$this->codigo = mainModel::generar_codigo_aleatorio("AC", 7, $this->numero);
						$this->clave = mainModel::encryption($this->password1);
						$this->dataAC = [
							"Codigo" => $this->codigo,
							"Privilegio" => $this->privilegio,
							"Usuario" => $this->usuario,
							"Clave" => $this->clave,
							"Email" => $this->email,
							"Estado" => "Activo",
							"Tipo" => "Administrador",
							"Genero" => $this->genero,
							"Foto" => $this->foto
						];
						$this->guardarCuenta = mainModel::agregar_cuenta($this->dataAC);
						if ($this->guardarCuenta->rowCount() >= 1) {
							$this->dataAD = [
								"DNI" => $this->dni,
								"Nombre" => $this->nombre,
								"Apellido" => $this->apellido,
								"Telefono" => $this->telefono,
								"Direccion" => $this->direccion,
								"Codigo" => $this->codigo
							];
							$this->guardarAdmin = administradorModelo::agregar_administrador_modelo($this->dataAD);
							if ($this->guardarAdmin->rowCount() >= 1) {
								$this->alerta = [
									"Alerta" => "limpiar",
									"Titulo" => "Administrador registrado",
									"Texto" => "El administrador se registró con éxito",
									"Tipo" => "success"
								];
							} else {
								mainModel::eliminar_cuenta($this->codigo);
								$this->alerta = [
									"Alerta" => "simple",
									"Titulo" => "Ocurrió un error inesperado.",
									"Texto" => "No se ha podido registrar el administrador",
									"Tipo" => "error"
								];
							}
						} else {
							$this->alerta = [
								"Alerta" => "simple",
								"Titulo" => "Ocurrió un error inesperado.",
								"Texto" => "No se ha podido registrar el administrador",
								"Tipo" => "error"
							];
						}
					}
				}
			}
		}
		return mainModel::sweet_alert($this->alerta);
	}
}
