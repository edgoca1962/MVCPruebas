<?php
$modulo = new CoreLibreria;
$contenido = $modulo->getContenido();
$mensaje = $modulo->getMensaje();
include_once "vista/modulos/" . $contenido . ".php";
?>
<div>
  <?= $mensaje; ?>
</div>