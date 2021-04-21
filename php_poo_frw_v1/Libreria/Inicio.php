<?php
ini_set('display_errors', 1);
date_default_timezone_set("America/Costa_Rica");
define('SERVERURL', 'http://localhost/php_poo_frw_v1/');

spl_autoload_register(function ($clase) {
    if (substr($clase, -6) == 'Modelo') {
        require_once('./Modelo/' . $clase . ".php");
    } else {
        require_once('Libreria/' . $clase . ".php");
    }
});
