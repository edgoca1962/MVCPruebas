<?php
$controllerFile = 'Controllers/' . $controller . '.php';
if (file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->{$metodo}($params);
    } else {
        require_once("Controllers/Errores.php");
    }
} else {
    require_once("Controllers/Errores.php");
}
