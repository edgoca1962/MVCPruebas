<div class="container">
   <div class="row">
      <div class="col-12">
         <?php
         $datos_controlador = [
            "titulo_categoria" => $controlador->get_atributo('titulo_categoria'),
            "descripcion_categoria" => $controlador->get_atributo('descripcion_categoria'),
            "palabras_claves" => $controlador->get_atributo('palabras_claves'),
            "anuncios" => $controlador->get_atributo('anuncios'),
            "banner" => $controlador->get_atributo('banner'),
            "articulos" => $controlador->get_atributo('articulos'),
            "articulos_destacados_recientes" => $controlador->get_atributo('articulos_destacados_recientes'),
         ];
         echo "<pre>";
         print_r($datos_controlador);
         echo "</pre>";
         ?>
      </div>
   </div>
</div>