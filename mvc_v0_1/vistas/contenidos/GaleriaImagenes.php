<?php include "vistas/contenidos/Superior.php"; ?>
<div class="card">
   <div class="card-header">
      <h4>Galería de Imágenes</h4>
      <p>Arrastre una imágen o click para seleccionar imágen. La imágen debe ser de 1600x600, no ser mayor a 2MB y debe tener el formato JPG o PNG.</p>
   </div>
   <div class="card-body">
      <div class="row" id="galeria">
         <div class="col-lg-3 col-md-4 col-xs-6" orden="0">
            <a href="#" class="d-block mb-4 h-100">
               <span><i class="fas fa-trash-alt card-img-overlay text-center eliminar" style="font-size: 60px; color: white; visibility: hidden;"></i></span>
               <img src="<?= $controlador->get_atributo("ruta_img_banners") . "IMG_1785.jpg" ?>" alt="" class="img-fluid img-thumbnail">
            </a>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6" orden="1">
            <a href="#" class="d-block mb-4 h-100">
               <span><i class="fas fa-trash-alt card-img-overlay text-center eliminar" style="font-size: 60px; color: white; visibility: hidden;"></i></span>
               <img src="<?= $controlador->get_atributo("ruta_img_banners") . "IMG_2118.jpg" ?>" alt="" class="img-fluid img-thumbnail">
            </a>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6" orden="2">
            <a href="#" class="d-block mb-4 h-100">
               <span><i class="fas fa-trash-alt card-img-overlay text-center eliminar" style="font-size: 60px; color: white; visibility: hidden;"></i></span>
               <img src="<?= $controlador->get_atributo("ruta_img_banners") . "IMG_2251.jpg" ?>" alt="" class="img-fluid img-thumbnail">
            </a>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6" orden="3">
            <a href="#" class="d-block mb-4 h-100">
               <span><i class="fas fa-trash-alt card-img-overlay text-center eliminar" style="font-size: 60px; color: white; visibility: hidden;"></i></span>
               <img src="<?= $controlador->get_atributo("ruta_img_banners") . "IMG_4854.jpg" ?>" alt="" class="img-fluid img-thumbnail">
            </a>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6" orden="4">
            <a href="#" class="d-block mb-4 h-100">
               <span><i class="fas fa-trash-alt card-img-overlay text-center eliminar" style="font-size: 60px; color: white; visibility: hidden;"></i></span>
               <img src="<?= $controlador->get_atributo("ruta_img_banners") . "IMG_5291.jpg" ?>" alt="" class="img-fluid img-thumbnail">
            </a>
         </div>
         <div class="col-lg-3 col-md-4 col-xs-6" orden="5">
            <a href="#" class="d-block mb-4 h-100">
               <span><i class="fas fa-trash-alt card-img-overlay text-center eliminar" style="font-size: 60px; color: white; visibility: hidden;"></i></span>
               <img src="<?= $controlador->get_atributo("ruta_img_banners") . "IMG_7297.jpg" ?>" alt="" class="img-fluid img-thumbnail">
            </a>
         </div>
      </div>
   </div>
</div>
<div class="card-footer text-muted">
   <button class="btn btn-warning" id="btn-ordenar"><i class="fas fa-sort-amount-down-alt"></i>Ordenar</button>
   <button class="btn btn-danger" id="btn-eliminar"><i class="fas fa-trash-alt"></i> Eliminar</button>
</div>
<?php include "vistas/contenidos/Inferior.php"; ?>