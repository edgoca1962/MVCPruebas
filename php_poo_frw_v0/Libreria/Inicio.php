<?php
require_once("Configurar.php");

spl_autoload_register(function ($clase) {
    require_once('Libreria/' . $clase . ".php");
});
