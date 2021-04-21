<?php
class Usuario extends UsuarioModelo
{
    private $alerta;
    private $registros;
    private $url;
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
            'page_id' => 5,
            'page_tag' => 'Usuarios - Tienda Virtual',
            'page_title' => 'Usuarios - Tienda Virtual',
            'page_name' => 'usuario',
            'mensaje' => '',
            'usuarios' => $this->registros,
            'alerta' => $this->alerta
        ];
        $this->url->getVista('usuario', $this->parametros);
    }
    public function setAlerta($alerta)
    {
        $this->alerta = $alerta;
    }
    public function registros()
    {
        $this->datos = [
            'tabla' => "bitacora",
            'campo' => 'BitacoraCodigo',
            'valor' => '"1"',
        ];

        $this->registros = $this->consultaCampo($this->datos['tabla'], $this->datos['campo'], $this->datos['valor']);

        if (count($this->registros) == 0) {
            $this->alerta->set_atributo('tipoMensaje', 'simple');
            $this->alerta->set_atributo('titulo', 'Alerta');
            $this->alerta->set_atributo('texto', 'No existen registros en la base de datos.');
            $this->alerta->set_atributo('tipoAlerta', 'warning');
            $this->alerta = (string) $this->alerta->procesa_mensaje();
        } else {
            $this->alerta = "";
        }
    }
}
