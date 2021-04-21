<?php
require_once("../librerias/BaseLibreria.php");
require_once("../modelos/InicioModelo.php");
require_once("../controladores/Inicio.php");


if (isset($_FILES["archivo"]["name"][0])) {
   $inicio = new Inicio;
   $inicio->set_atributo("datos_archivo", $_FILES["archivo"]);
   $respuesta = $inicio->agregar_imagen();
} else {
   $respuesta = ["flag" => 1, "respuesta" => "No se pueden leer los datos"];
}
echo json_encode($respuesta);
