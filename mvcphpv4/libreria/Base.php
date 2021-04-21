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
    protected function conectar()
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
            return $this->dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    protected function consultaSimple($tabla)
    {
        $this->stmt = $this->conectar()->prepare("SELECT * FROM $tabla");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    protected function consultaCampo($tabla, $campo, $valor)
    {
        $this->stmt = $this->conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :valor");
        $this->stmt->execute(["$campo" => $valor]);
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    protected function eliminaRegistro($tabla, $id)
    {
        $this->stmt = $this->dbh->prepare("DELETE FROM $tabla WHERE id = :valor");
        $this->stmt->execute(['id' => $id]);
        return $this->stmt;
    }
}
