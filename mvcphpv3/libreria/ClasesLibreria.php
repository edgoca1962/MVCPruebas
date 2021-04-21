<?php
ini_set('display_errors', 1);
date_default_timezone_set("America/Costa_Rica");
define('SERVERURL', 'http://localhost/mvcphpv3/');

spl_autoload_register(function ($clase) {
    if (substr($clase, -6) == 'Modelo') {
        require_once('modelo/' . $clase . ".php");
    } else if (substr($clase, -11) == 'Controlador') {
        require_once('controlador/' . $clase . ".php");
    } else {
        require_once('libreria/' . $clase . ".php");
    }
});
