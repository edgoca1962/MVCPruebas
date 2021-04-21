<?php
date_default_timezone_set("America/Costa_Rica");
// "https://mvcfrw.fgh-online.com/";
class ClasesLibreria
{
    public function __construct()
    {
        spl_autoload_register(function ($clase) {
            if (substr($clase, -6) == 'Modelo') {
                require_once('./modelos/' . $clase . ".php");
            } else if (substr($clase, -8) == 'Libreria') {
                require_once('./librerias/' . $clase . ".php");
            } else {
                require_once('./controladores/' . $clase . ".php");
            }
        });
    }
}
