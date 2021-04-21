<?php
require_once "./librerias/ClasesLibreria.php";
new ClasesLibreria;
require_once "./vistas/Plantilla.php";
/*
$datos = array(
    0 => array(
        "id" => 1,
        "titulo_articulo" => "El enigma del Creador",
        "descripcion_articulo" => "Este articulo trata de..."
    ),
    1 => array(
        "id" => 2,
        "titulo_articulo" => "La alabanza al Creador",
        "descripcion_articulo" => "Este articulo trata de..."
    ),
    2 => array(
        "id" => 3,
        "titulo_articulo" => "El Creador",
        "descripcion_articulo" => "Este articulo trata de..."
    )

);
$respuesta = json_encode($datos);

$inicio = new Inicio;
$inicio->busca_articulos("Lorem");
$datosInicio = $inicio->get_atributo('datos_articulos');
echo '<pre>';
// // echo json_encode($datos);
print_r($datos);
print_r($datosInicio);
echo '</pre>';
*/