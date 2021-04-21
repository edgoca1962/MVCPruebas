<!--=====================================
CONTENIDO ARTÍCULO
======================================-->
<div class="container-fluid bg-white contenidoInicio py-2 py-md-4">
    <div class="container">
        <!-- BREADCRUMB -->
        <a href="categorias.html">
            <button class="d-block d-sm-none btn btn-info btn-sm mb-2">
            </button>
        </a>
        <ul class="breadcrumb bg-white p-0 mb-2 mb-md-4 breadArticulo">
            <li class="breadcrumb-item inicio"><a href="<?= $plantilla->get_atributo('ruta_dominio') . "Inicio"; ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= $plantilla->get_atributo('ruta_dominio') . "Categorias/inicio/" . $controlador->get_atributo('categoria'); ?>"><?= $controlador->get_atributo('descripcion_categoria'); ?></a></li>
            <li class="breadcrumb-item active"><?= $controlador->get_atributo('titulo_articulo') ?></li>
        </ul>
        <div class="row">
            <!-- COLUMNA IZQUIERDA -->
            <div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">
                <!-- ARTÍCULO 01 -->
                <div class="container">
                    <div class="d-flex">
                        <div class="fechaArticulo"><?= $controlador->get_atributo('fecha_articulo'); ?></div>
                        <h3 class="tituloArticulo text-right text-muted pl-3 pt-lg-2"><?= $controlador->get_atributo('titulo_articulo'); ?></h3>
                    </div>
                    <img src="<?= $plantilla->get_atributo('ruta_img_articulos') . $controlador->get_atributo('portada_articulo'); ?>" alt="Lorem ipsum dolor sit amet" class="img-fluid my-lg-3">
                    <p class="textoArticulo my-3"><?= $controlador->get_atributo('contenido_articulo'); ?></p>
                    <!-- COMPARTIR EN REDES -->
                    <div class="float-right my-3 btnCompartir">
                        <div class="btn-group text-secondary">
                            Si te gusto compartelo:
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn border-0 text-white" style="background: #1475E0">
                                <span class="fab fa-facebook pr-1"></span>
                                Facebook
                            </button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn border-0 text-white" style="background: #00A6FF">
                                <span class="fab fa-twitter pr-1"></span>
                                Twitter
                            </button>
                        </div>
                    </div>
                    <!-- AVANZAR - RETROCEDER -->
                    <div class="clearfix"></div>
                    <!-- ETIQUETAS -->
                    <div>
                        <h4>Etiquetas</h4>
                        <?php foreach ($controlador->get_atributo('palabras_claves') as $etiqueta) : ?>
                            <a href="#" class="btn btn-secondary btn-sm m-1"><?= $etiqueta ?></a>
                        <?php endforeach ?>
                    </div>
                    <div class="d-md-flex justify-content-between my-3 d-none">
                        <a href="articulos.html">Leer artículo anterior</a>
                        <a href="articulos.html">Leer artículo siguiente</a>
                    </div>
                    <!-- DESLIZADOR DE ARTÍCULOS -->
                    <section class="jd-slider deslizadorArticulos my-4">
                        <div class="slide-inner">
                            <ul class="slide-area">
                                <?php foreach ($controlador->get_atributo('articulos') as $articulo) : ?>
                                    <li class="px-3">
                                        <a href="<?= $plantilla->get_atributo('ruta_dominio') . $articulo['ruta_amigable']; ?>" class="text-secondary">
                                            <img src="<?= $plantilla->get_atributo('ruta_img_articulos') . $articulo['portada_articulo']; ?>" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                                            <h6 class="py-2"><?= $articulo['titulo_articulo']; ?></h6>
                                        </a>
                                        <p class="small"><?= substr($articulo['descripcion_articulo'], 50) . "..."; ?></p>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                            <a class="prev" href="#">
                                <i class="fas fa-angle-left text-muted"></i>
                            </a>
                            <a class="next" href="#">
                                <i class="fas fa-angle-right text-muted"></i>
                            </a>
                        </div>
                        <div class="controller">
                            <div class="indicate-area"></div>
                        </div>
                    </section>
                    <!-- BLOQUE DE OPINIONES -->
                    <h3 style="color:#8e4876">Opiniones</h3>
                    <hr style="border: 1px solid #79FF39">
                    <div class="row opiniones">
                        <?php if (count($controlador->get_atributo('opiniones_articulo')) > 0) : ?>
                            <?php foreach ($controlador->get_atributo('opiniones_articulo') as $key => $value) : ?>
                                <?php if ($value['aprobacion_opinion'] == 1) : ?>
                                    <div class="col-3 col-sm-4 col-lg-2 p-2">
                                        <img src="<?= $plantilla->get_atributo('ruta_img_usrs') . $value['foto_opinion']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-9 col-sm-8 col-lg-10 p-2 text-muted">
                                        <p><?= $value['contenido_opinion']; ?></p>
                                        <span class="small float-right"><?= $value['nombre_opinion'] . " | " . $value['fecha_opinion']; ?> </span>
                                    </div>
                                    <?php if (!empty($value['respuesta_opinion'])) : ?>
                                        <div class="col-9 col-sm-8 col-lg-10 p-2 text-muted">
                                            <p><?= $value['respuesta_opinion']; ?></p>
                                            <span class="small float-right"><?= $value['nombre_admin'] . " | " . $value['fecha_respuesta']; ?></span>
                                        </div>
                                        <div class="col-3 col-sm-4 col-lg-2 p-2">
                                            <img src="<?= $plantilla->get_atributo('ruta_img_usrs') . $value['foto_admin']; ?>" class="img-thumbnail">
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php else : ?>
                            <div class="col-9 col-sm-8 col-lg-10 p-2 text-muted">
                                <p>No hay opiniones sobre este artículo.</p>
                            </div>
                        <?php endif ?>
                    </div>

                    <hr style="border: 1px solid #79FF39">
                    <!-- FORMULARIO DE OPINIONES -->
                    <form action="<?= $plantilla->get_atributo('ruta_dominio') . $controlador->get_atributo('ruta_amigable'); ?>" method="post" enctype="multipart/form-data">
                        <label class="text-muted lead">¿Qué tal te pareció el artículo?</label>
                        <div class="row">
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="input-group-lg">
                                    <input type="text" class="form-control my-3" placeholder="Tu nombre" name="nombre_opinion" required>
                                    <input type="email" class="form-control my-3" placeholder="Tu email" name="correo_opinion" required>
                                </div>
                            </div>
                            <input type="file" name="fotoOpinion" class="d-none" id="fotoOpinion">
                            <label for="fotoOpinion" class="d-none d-md-block col-md-4 col-lg-3">
                                <img src="<?= $plantilla->get_atributo('ruta_img_usrs') . "subirFoto.png"; ?>" class="img-fluid mt-md-3 mt-xl-2 prevFotoOpinion">
                            </label>
                        </div>
                        <textarea name="ckeditor" id="ckeditor" cols="30" rows="10"></textarea>
                        <script>
                            CKEDITOR.replace('ckeditor');
                        </script>
                        <input type="submit" class="btn btn-dark btn-lg btn-block" value="Enviar">
                        <?php ?>
                    </form>
                    <!-- PUBLICIDAD -->
                    <?php foreach ($controlador->get_atributo('anuncios') as $value) : ?>
                        <img src="<?= $plantilla->get_atributo('ruta_img_anuncios') . $anuncio['codigo_anuncio']; ?>" class="img-fluid my-3 d-block d-md-none" width="100%">
                    <?php endforeach ?>
                </div>
            </div>
            <!-- COLUMNA DERECHA -->
            <div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">
                <!-- ARTÍCULOS RECIENTES -->
                <div class="my-4">
                    <h4>Artículos Recientes</h4>
                    <?php foreach ($controlador->get_atributo('articulos_destacados_recientes') as $value) : ?>
                        <div class="d-flex my-3">
                            <div class="w-100 w-xl-50 pr-3 pt-2">
                                <a href="<?= $plantilla->get_atributo('ruta_dominio') . $value['ruta_amigable']; ?>">
                                    <img src="<?= $plantilla->get_atributo('ruta_img_articulos') . $value['portada_articulo']; ?>" alt="<?= $value['titulo_articulo']; ?>" class="img-fluid">
                                </a>
                            </div>
                            <div>
                                <a href="<?= $plantilla->get_atributo('ruta_dominio') . $value['ruta_amigable']; ?>" class="text-secondary">
                                    <p class="small"><?= substr($value['descripcion_articulo'], 0, 50) . "..."; ?></p>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- PUBLICIDAD -->
                <?php foreach ($controlador->get_atributo('anuncios') as $value) : ?>
                    <div class="my-4">
                        <img src="<?= $plantilla->get_atributo('ruta_img_anuncios') . $value['codigo_anuncio'] ?>" class="img-fluid">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>