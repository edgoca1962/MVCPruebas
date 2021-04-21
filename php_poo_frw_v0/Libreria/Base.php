<?php
class Base
{
    private $host;
    private $usuario;
    private $clave;
    private $nombre_base;
    private $dsn;
    private $dbh;
    private $stmt;
    private $error;
    private $datos;
    public function __construct()
    {
        $this->host = DB_HOST;
        $this->usuario = DB_USUARIO;
        $this->clave = DB_CLAVE;
        $this->nombre_base = DB_NOMBRE;

        $this->dsn = 'mysql:host=' . $this->host . ";dbname=" . $this->nombre_base;
        $this->opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbh = new PDO($this->dsn, $this->usuario, $this->clave, $this->opciones);
            $this->dbh->exec('set names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function sql($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function vincular($parametro, $valor, $tipo = null)
    {
        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }
    public function ejecutar()
    {
        return $this->stmt->execute();
    }
    public function registros()
    {
        $this->ejecutar();
        return $this->stmt->fetchALL(PDO::FETCH_OBJ);
    }
    public function registro()
    {
        $this->ejecutar();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function filas()
    {
        return $this->stmt->rowCount();
    }
}
