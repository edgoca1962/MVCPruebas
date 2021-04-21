<?php
ini_set('display_errors', 1);
date_default_timezone_set("America/Costa_Rica");
const SERVERURL = "http://localhost/mvcfrwlte/";
// const SERVERURL = "https://mvcfrw.fgh-online.com/";
class ClasesLibreria
{
    public function __construct()
    {
        spl_autoload_register(function ($clase) {
            if (substr($clase, -6) == 'Modelo') {
                require_once('./modelo/' . $clase . ".php");
            } else if (substr($clase, -8) == 'Libreria') {
                require_once('./libreria/' . $clase . ".php");
            } else {
                require_once('./controlador/' . $clase . ".php");
            }
        });
    }
}
