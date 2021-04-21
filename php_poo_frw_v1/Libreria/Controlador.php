<?php
class Controlador
{
    private $mensaje;
    private $alerta;
    private $error;
    public function __construct()
    {
        $this->alerta = "";
        $this->mensaje = new Mensajes;
    }
    public function getVista($vista, $parametros = [])
    {
        if (file_exists("Vista/" . $vista . ".php")) {
            require_once "Vista/" . $vista . ".php";
        } else {
            $this->mensaje->set_atributo('tipoMensaje', 'simple');
            $this->mensaje->set_atributo('titulo', 'Alerta');
            $this->mensaje->set_atributo('texto', 'Página no encontrada.');
            $this->mensaje->set_atributo('tipoAlerta', 'warning');
            $this->alerta = $this->mensaje->procesa_mensaje();
            require_once "Controlador/Inicio.php";
            $this->error = new Inicio;
            $this->error->setAlerta($this->alerta);
            $this->error->index();
        }
    }
    /* 
    public function getModelo($modelo)
    {
        if (file_exists("Modelo/" . $modelo . ".php")) {
            require_once "Modelo/" . $modelo . ".php";
            return new $modelo;
        } else {
            echo "Archivo Modelo no existe.";
        }
    }
    */
}
