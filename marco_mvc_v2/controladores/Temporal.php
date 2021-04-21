<?php

class Temporal
{
    public function insertar_registros()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=blog_travels', 'root', 'root');
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        for ($i = 54; $i < 55; $i++) {
            $registro = $i;
            $sql = "INSERT INTO opiniones(id_articulo, nombre_opinion, correo_opinion, foto_opinion, contenido_opinion, id_administrador, respuesta_opinion, aprobacion_opinion, fecha_opinion, fecha_respuesta) SELECT $registro, nombre_opinion, correo_opinion, foto_opinion, contenido_opinion, id_administrador, respuesta_opinion, aprobacion_opinion, fecha_opinion, fecha_respuesta FROM opiniones WHERE id_articulo = 55";
            $consulta = $pdo->prepare($sql);
            $consulta->execute();
            echo "se ingresó el registro :" . $registro . "\n";
        }
    }
}
