<div class="container">
   <div class="row">
      <!-- COLUMNA IZQUIERDA -->
      <div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">
         <!-- ARTÍCULOS -->
         <?php foreach ($controlador->get_atributo('datos_articulos') as $articulo) : ?>
            <div class="row">
               <div class="col-12 col-lg-5">
                  <a href="<?= $plantilla->get_atributo('ruta_dominio') . $articulo['ruta_amigable']; ?>">
                     <h5 class="d-block d-lg-none py-3"><?= $articulo['titulo_articulo']; ?></h5>
                  </a>
                  <a href="<?= $plantilla->get_atributo('ruta_dominio') . $articulo['ruta_amigable']; ?>"><img src="<?= $plantilla->get_atributo('ruta_img_articulos') . $articulo['portada_articulo']; ?>" alt="Lorem ipsum dolor sit amet" class="img-fluid" width="100%"></a>
               </div>
               <div class="col-12 col-lg-7 introArticulo">
                  <a href="<?= $plantilla->get_atributo('ruta_dominio') . $articulo['ruta_amigable']; ?>">
                     <h4 class="d-none d-lg-block"><?= $articulo['titulo_articulo']; ?></h4>
                  </a>
                  <p class="my-2 my-lg-5"><?= $articulo['descripcion_articulo']; ?></p>
                  <a href="<?= $plantilla->get_atributo('ruta_dominio') . $articulo['ruta_amigable']; ?>" class="float-right">Leer Más</a>
                  <div class="fecha" style="background-image: url(<?= $plantilla->get_atributo('ruta_img_blog'); ?>globo.jpg)"><?= $articulo['fecha_articulo']; ?></div>
               </div>
            </div>
            <hr class=" mb-4 mb-lg-5" style="border: 1px solid #79FF39">
         <?php endforeach ?>
      </div>
   </div>