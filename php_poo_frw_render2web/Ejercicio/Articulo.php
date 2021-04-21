<?php
class Articulo
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }
    public function obtenerArticulos()
    {
        $this->db->sql("SELECT * FROM bitacora");
        return $this->db->registros();
    }
}
