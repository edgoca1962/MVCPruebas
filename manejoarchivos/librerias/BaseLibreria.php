<?php
class BaseLibreria
{
    private $host;
    private $usuario;
    private $clave;
    private $nombre_base;
    private $conector;
    private $conexion;
    private $error;

    protected function __construct()
    {
        $this->host = null;
        $this->usuario = null;
        $this->clave = null;
        $this->nombre_base = null;
        $this->conector = null;
        $this->conexion = null;
        $this->error = null;
    }
    protected function conectar()
    {
        $this->host = 'localhost';
        $this->usuario = 'root';
        $this->clave = 'root';
        $this->nombre_base = 'blog_marco';
        $this->conector = 'mysql:host=' . $this->host . ";dbname=" . $this->nombre_base;
        $this->opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
            $this->conexion = new PDO($this->conector, $this->usuario, $this->clave, $this->opciones);
            return $this->conexion;
        } catch (PDOException $error) {
            $this->error = $error->getMessage();
        }
    }
}
