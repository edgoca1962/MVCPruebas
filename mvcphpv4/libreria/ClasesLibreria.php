<?php
ini_set('display_errors', 1);
date_default_timezone_set("America/Costa_Rica");
define('SERVERURL', 'http://localhost/mvcphpv3/');

spl_autoload_register(function ($clase) {
    if (substr($clase, -6) == 'Modelo') {
        require_once('modelo/' . $clase . ".php");
    } else if (substr($clase, -8) == 'Libreria') {
        require_once('libreria/' . $clase . ".php");
    } else {
        require_once('controlador/' . $clase . ".php");
    }
});
