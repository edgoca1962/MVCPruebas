<?php
require_once("../librerias/BaseLibreria.php");
require_once("../modelos/InicioModelo.php");
require_once("../controladores/Inicio.php");

switch ($_POST['elemento']) {
    case 'formulario_ingreso':
        $inicio = new Inicio;
        $parametros = ["usuario" => $_POST['correo'], "clave" => $_POST['clave']];
        $inicio = $inicio->inicio($parametros);
        if ($inicio) {
            echo true;
        } else {
            echo false;
        }
        break;

    case 'boton_buscar':
        if (isset($_POST['btn-buscar']) && $_POST['btn-buscar'] != "") {
            $inicio = new Inicio;
            $inicio->busca_articulos($_POST['btn-buscar']);
            $datos_articulos = $inicio->get_atributo('datos_articulos');
            $datos = json_encode($datos_articulos);
            echo $datos;
        } else {
            echo null;
        }

        break;

    case 'articulos':
        $inicio = new Inicio;
        $datos_articulos = $inicio->get_atributo("datos_articulos");
        $datos = json_encode($datos_articulos);
        if (count($datos_articulos) > 0) {
            echo $datos;
        } else {
            echo false;
        }
        break;

    default:
        echo false;
        break;
}
