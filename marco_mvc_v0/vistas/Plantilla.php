<?php
$plantilla = new Plantilla;
$controlador = $plantilla->get_atributo('controlador');
$metodo = $plantilla->get_atributo('metodo');
$parametros = $plantilla->get_atributo('parametros');
$controlador = new $controlador;
if (!empty($metodo) && !empty($parametros)) {
    $controlador->{$metodo}($parametros);
} else {
    if (!empty($parametros)) {
        $controlador->{$metodo}();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $controlador->get_atributo('descripcion_categoria'); ?>">
    <meta name="keywords" content="<?= $controlador->get_atributo('palabras_claves'); ?>">
    <title><?= $plantilla->get_atributo('titulo_plantilla') . " | " . $controlador->get_atributo('titulo_categoria') ?></title>
    <link rel="icon" href="<?= $plantilla->get_atributo('ruta_img_blog') ?>icono.jpg">
    <!--=====================================
	PLUGINS DE CSS
	======================================-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Chewy|Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <!-- JdSlider -->
    <!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
    <link rel="stylesheet" href="<?= $plantilla->get_atributo('ruta_css_plugins') ?>jquery.jdSlider.css">
    <link rel="stylesheet" href="<?= $plantilla->get_atributo('ruta_css') ?>style.css">
    <!--=====================================
	PLUGINS DE JS
	======================================-->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- JdSlider -->
    <!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
    <script src="<?= $plantilla->get_atributo('ruta_js_plugins') ?>jquery.jdSlider-latest.js"></script>
    <!-- pagination -->
    <!-- http://josecebe.github.io/twbs-pagination/ -->
    <script src="<?= $plantilla->get_atributo('ruta_js_plugins') ?>pagination.min.js"></script>
    <!-- scrollup -->
    <!-- https://markgoodyear.com/labs/scrollup/ -->
    <!-- https://easings.net/es# -->
    <script src="<?= $plantilla->get_atributo('ruta_js_plugins') ?>scrollUP.js"></script>
    <script src="<?= $plantilla->get_atributo('ruta_js_plugins') ?>jquery.easing.js"></script>
    <!-- CKEditor 4 -->
    <script src="vistas/js/ckeditor/ckeditor.js"></script>
</head>

<body>
    <!--=====================================
    CABECERA
    ======================================-->
    <header class="container-fluid">
        <div class="container p-0">
            <div class="row">
                <!-- LOGO -->
                <div class="col-10 col-sm-11 col-md-8 pt-1 pt-lg-3 p-xl-0">
                    <a href="<?= $plantilla->get_atributo('ruta_dominio'); ?>">
                        <img src="<?= $plantilla->get_atributo('ruta_img_blog') ?>logotipo-negativo.png" alt="Logo de Juanito Travel" class="img-fluid logotipo">
                    </a>
                </div>
                <!-- REDES SOCIALES -->
                <div class="d-none d-md-block col-md-2 redes">
                    <ul class="d-flex justify-content-end pt-3 mt-1">
                        <?php foreach ($plantilla->get_atributo('redes_sociales') as $red_social) : ?>
                            <li>
                                <a href="<?= $red_social['url']; ?>" target="_blank">
                                    <i class="<?= $red_social['icono']; ?> lead rounded-circle text-white mr-1"></i>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- BUSCADOR Y BOTÓN MENÚ -->
                <div class="col-2 col-sm-1 col-md-2 d-flex justify-content-end pt-3 mt-1">
                    <!-- BUSCADOR -->
                    <div class="d-none d-md-block pr-4 pr-lg-5 mt-1">
                        <i class="fas fa-search lead" data-toggle="collapse" data-target="#buscador"></i>
                    </div>
                    <!-- BOTÓN MENÚ -->
                    <div class="m-0 mt-sm-1 mt-md-0 pr-0 pr-sm-2 pr-lg-3">
                        <i class="fas fa-bars lead"></i>
                    </div>
                </div>
                <!-- ENTRADA DEL BUSCADOR -->
                <div id="buscador" class="collapse col-12">
                    <div class="input-group float-right w-50 pl-xl-5 pb-3">
                        <input type="text" class="form-control" placeholder="Buscar">
                        <div class="input-group-append">
                            <span class="input-group-text bg-primary border-0" style="cursor:pointer">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=====================================
    REDES SOCIALES PARA MÓVIL
    ======================================-->
    <div class="d-block d-md-none redes redesMovil p-0 bg-white w-100 pt-2">
        <ul class="d-flex justify-content-center p-0">
            <?php foreach ($plantilla->get_atributo('redes_sociales') as $red_social) : ?>
                <li>
                    <a href="<?= $red_social['url']; ?>" target="_blank">
                        <i class="<?= $red_social['icono']; ?> lead rounded-circle text-white mr-3 mr-sm-4"></i>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <!--=====================================
    BANNER
    ======================================-->
    <?php if ($controlador->get_atributo('nombre_controlador') == 'Inicio') : ?>
        <div class="bannerEstatico d-none d-md-block"></div>
        <section class="jd-slider fade-slider">
            <div class="slide-inner">
                <ul class="slide-area">
                    <?php foreach ($controlador->get_atributo('banner') as $banner_imagen) : ?>
                        <li>
                            <img src="<?= $plantilla->get_atributo('ruta_img_banners') . $banner_imagen['img_banner']; ?>" class="img-fluid">
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="controller d-none">
                <a class="auto" href="#">
                    <i class="fas fa-play fa-xs"></i>
                    <i class="fas fa-pause fa-xs"></i>
                </a>
                <div class="indicate-area"></div>
            </div>
        </section>
    <?php else : ?>
        <div class="bannerEstatico d-none d-md-block"></div>
        <section class="jd-slider fade-slider">
            <div class="slide-inner">
                <ul class="slide-area">
                    <li>
                        <div class="d-none d-md-block textoBanner">
                            <h1><?= $controlador->get_atributo('titulo_banner'); ?></h1>
                            <h5><?= $controlador->get_atributo('descripcion_banner'); ?></h5>
                        </div>
                        <img src="<?= $plantilla->get_atributo('ruta_img_banners') . $controlador->get_atributo('banner')['img_banner']; ?>" class="img-fluid">
                    </li>
                </ul>
            </div>
            <div class="controller d-none">
                <a class="auto" href="#">
                    <i class="fas fa-play fa-xs"></i>
                    <i class="fas fa-pause fa-xs"></i>
                </a>
                <div class="indicate-area"></div>
            </div>
        </section>
    <?php endif ?>
    <!--=====================================
    BUSCADOR PARA MÓVIL
    ======================================-->
    <div style="margin-top:90px" class="container-fluid d-block pb-3 d-md-none bg-white">
        <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Buscar">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>
    <!--=====================================
    MENU
    ======================================-->
    <div class="container-fluid menu">
        <a href="#" class="btnClose">X</a>
        <ul class="nav flex-column text-center">
            <?php foreach ($plantilla->get_atributo('categorias') as $dato_categoria) : ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= $plantilla->get_atributo('ruta_dominio') . $dato_categoria['ruta_categoria']; ?>"><?= $dato_categoria['descripcion_categoria']; ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <!--=====================================
    GRID DE CATEGORÍAS
    ======================================-->
    <div class="container-fluid py-2 py-md-5 bg-white grid">
        <div class="container p-0">
            <div class="d-flex">
                <div class="d-flex flex-column columna1">
                    <figure class="p-2 m-0 photo1" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['suramerica']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['suramerica']['img_categoria']; ?>)">
                        <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['suramerica']['titulo_categoria']; ?></p>
                    </figure>
                    <figure class="p-2 m-0 photo2" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['africa']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['africa']['img_categoria']; ?>)">
                        <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['africa']['titulo_categoria']; ?></p>
                    </figure>
                </div>
                <div class="d-flex flex-column flex-fill columna2">
                    <div class="d-block d-md-flex">
                        <figure class="p-2 m-0 flex-fill photo3" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['centroamerica']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['centroamerica']['img_categoria']; ?>)">
                            <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['centroamerica']['titulo_categoria']; ?></p>
                        </figure>
                        <figure class="p-2 m-0 flex-fill photo4" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['europa']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['europa']['img_categoria']; ?>)">
                            <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['europa']['titulo_categoria']; ?></p>
                        </figure>
                    </div>
                    <figure class="p-2 m-0 photo5" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['norteamerica']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['norteamerica']['img_categoria']; ?>)">
                        <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['norteamerica']['titulo_categoria']; ?></p>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <!--=====================================
    CONTENIDOS
    ======================================-->
    <?php include_once $plantilla->get_atributo('ruta_contenidos') . $controlador->get_atributo('vista'); ?>
    <!--=====================================
    FOOTER
    ======================================-->
    <footer class="container-fluid py-5 d-none d-md-block">
        <div class="container">
            <div class="row">
                <!-- GRID CATEGORÍAS FOOTER -->
                <div class="col-md-7 col-lg-6">
                    <div class="p-1 bg-white gridFooter">
                        <div class="container p-0">
                            <div class="d-flex">
                                <div class="d-flex flex-column columna1">
                                    <figure class="p-2 m-0 photo1" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['suramerica']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['suramerica']['img_categoria']; ?>)">
                                        <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['suramerica']['titulo_categoria']; ?></p>
                                    </figure>
                                    <figure class="p-2 m-0 photo2" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['africa']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['africa']['img_categoria']; ?>)">
                                        <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['africa']['titulo_categoria']; ?></p>
                                    </figure>
                                </div>
                                <div class="d-flex flex-column flex-fill columna2">
                                    <div class="d-block d-md-flex">
                                        <figure class="p-2 m-0 flex-fill photo3" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['centroamerica']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['centroamerica']['img_categoria']; ?>)">
                                            <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['centroamerica']['titulo_categoria']; ?></p>
                                        </figure>
                                        <figure class="p-2 m-0 flex-fill photo4" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['europa']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['europa']['img_categoria']; ?>)">
                                            <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['europa']['titulo_categoria']; ?></p>
                                        </figure>
                                    </div>
                                    <figure class="p-2 m-0 photo5" vinculo="<?= $plantilla->get_atributo('ruta_dominio') . $plantilla->get_atributo('categorias')['norteamerica']['ruta_categoria']; ?>" style="background-image:url(<?= $plantilla->get_atributo('ruta_img_categorias') . $plantilla->get_atributo('categorias')['norteamerica']['img_categoria']; ?>)">
                                        <p class="text-uppercase p-1 p-md-2 p-xl-1 small"><?= $plantilla->get_atributo('categorias')['norteamerica']['titulo_categoria']; ?></p>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-1 col-xl-2"></div>
                <!-- NEWLETTER -->
                <div class="col-md-5 col-lg-5 col-xl-4 pt-5">
                    <h6 class="text-white">Inscríbete en nuestro newletter:</h6>
                    <div class="input-group my-4">
                        <input type="text" class="form-control" placeholder="Ingresa tu Email">
                        <div class="input-group-append">
                            <span class="input-group-text bg-dark text-white">Inscribirse</span>
                        </div>
                    </div>
                    <div class="p-0 w-100 pt-2">
                        <ul class="d-flex justify-content-left p-0">
                            <?php foreach ($plantilla->get_atributo('redes_sociales') as $red_social) : ?>
                                <li>
                                    <a href="<?= $red_social['url']; ?>" target="_blank">
                                        <i class="<?= $red_social['icono']; ?> lead rounded-circle text-white mr-1"></i>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?= $controlador->get_atributo('alerta') ?>
    <script src="<?= $plantilla->get_atributo('ruta_js'); ?>script.js"></script>
</body>

</html>