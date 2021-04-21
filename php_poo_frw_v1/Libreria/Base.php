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
    private $alerta;
    protected function __construct()
    {
        $this->host = 'localhost';
        $this->usuario = 'root';
        $this->clave = 'root';
        $this->nombre_base = 'biblioteca_publica';

        $this->dsn = 'mysql:host=' . $this->host . ";dbname=" . $this->nombre_base;
        $this->opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbh = new PDO($this->dsn, $this->usuario, $this->clave, $this->opciones);
            $this->dbh->exec('set names utf8');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    protected function consultaSimple($tabla)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM $tabla");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    protected function consultaCampo($tabla, $campo, $valor)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM $tabla WHERE $campo = $valor");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    /*  
    protected function sql($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
   protected function vincular($parametro, $valor, $tipo = null)
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
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }
    protected function ejecutar()
    {
        return $this->stmt->execute();
    }
    protected function registros()
    {
        $this->ejecutar();
        return $this->stmt->fetchALL(PDO::FETCH_OBJ);
    }
    protected function registro()
    {
        $this->ejecutar();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    protected function filas()
    {
        return $this->stmt->rowCount();
    }
 */
}
