<?php
$plantilla = new Plantilla;
$controlador = $plantilla->get_atributo('controlador');
$metodo = $plantilla->get_atributo('metodo');
$parametros = $plantilla->get_atributo('parametros');
$controlador = new $controlador;
$controlador->{$metodo}($parametros);


/* 
if (!empty($metodo) && !empty($parametros)) {
    $controlador->{$metodo}($parametros);
} else {
    if (!empty($parametros)) {
        $controlador->{$metodo}();
    }
}
*/
// echo '<pre>';
// echo "Atributo vista del controlador : " . $controlador->get_atributo('vista');
// echo "<br>";
// print_r($controlador);
// echo "<br>";
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7a591c4a95.js" crossorigin="anonymous"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Plantilla</title>
</head>

<body>
    <?php include "vistas/contenidos/" . $controlador->get_atributo('vista'); ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="vistas/js/script.js"></script>

</body>

</html>