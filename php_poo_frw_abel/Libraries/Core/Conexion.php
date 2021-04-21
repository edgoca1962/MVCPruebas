<?php
class Conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $db = "biblioteca_publica";
    private $connect;
    public function __construct()
    {
        $connectionString = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8";
        try {
            $this->connect = new PDO($connectionString, $this->user, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->connect = 'Error de conexión';
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function connect()
    {
        return $this->connect;
    }
}
