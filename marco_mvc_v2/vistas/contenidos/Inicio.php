    <!--=====================================
    CONTENIDO INICIO
    ======================================-->
    <div class="container-fluid bg-white contenidoInicio pb-4">
        <div class="container">

            <!-- BREADCRUMB -->
            <?php if ($controlador->get_atributo('nombre_controlador') == 'Categorias') : ?>
                <ul class="breadcrumb bg-white p-0 mb-2 mb-md-4">
                    <li class="breadcrumb-item inicio"><a href="<?= $plantilla->get_atributo('ruta_dominio'); ?>Inicio">Inicio</a></li>
                    <li class="breadcrumb-item active"><?= $controlador->get_atributo('descripcion_categoria'); ?></li>
                </ul>
            <?php endif ?>
            <div class="row">
                <!-- COLUMNA IZQUIERDA -->
                <div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">
                    <!-- ARTÍCULOS -->
                    <?php foreach ($controlador->get_atributo('articulos') as $articulo) : ?>
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
                    <!-- Paginacion -->
                    <nav aria-label="paginacion">
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?= ($controlador->get_atributo('pagina_actual') <= 1) ? 'disabled' : ''; ?>"><a class="page-link" href="<?= $plantilla->get_atributo('ruta_dominio') . $controlador->get_atributo('ruta_amigable_paginacion'); ?>1">Primera</a>
                            </li>
                            <li class="page-item <?= ($controlador->get_atributo('pagina_actual') <= 1) ? 'disabled' : ''; ?>"><a class="page-link" href="<?= $plantilla->get_atributo('ruta_dominio') . $controlador->get_atributo('ruta_amigable_paginacion') . ($controlador->get_atributo('pagina_actual') - 1); ?>" aria-label="Anterior"><span aria-hidden="true">&laquo;</span></a>
                            </li>

                            <?php for ($i = $controlador->get_atributo("primera_pagina"); $i < $controlador->get_atributo("ultima_pagina"); $i++) : ?>
                                <li class="page-item <?= ($controlador->get_atributo('pagina_actual') == $i + 1) ? 'active' : ''; ?>">
                                    <a class="page-link" href="<?= $plantilla->get_atributo('ruta_dominio') . $controlador->get_atributo('ruta_amigable_paginacion') . ($i + 1); ?>"><?= $i + 1; ?></a>
                                </li>
                            <?php endfor ?>

                            <li class="page-item <?= ($controlador->get_atributo('pagina_actual') >= $controlador->get_atributo('total_paginas')) ? 'disabled' : ''; ?>">
                                <a class="page-link" href="<?= $plantilla->get_atributo('ruta_dominio') . $controlador->get_atributo('ruta_amigable_paginacion') . ($controlador->get_atributo('pagina_actual') + 1); ?>" aria-label="Siguiente"><span aria-hidden="true">&raquo;</span> </a>
                            </li>
                            <li class="page-item <?= ($controlador->get_atributo('pagina_actual') >= $controlador->get_atributo('total_paginas')) ? 'disabled' : ''; ?>"><a class="page-link" href="<?= $plantilla->get_atributo('ruta_dominio') . $controlador->get_atributo('ruta_amigable_paginacion') . $controlador->get_atributo('total_paginas'); ?>">Última</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- COLUMNA DERECHA -->
                <div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">

                    <?php if ($controlador->get_atributo('nombre_controlador') == 'Inicio') : ?>
                        <!-- SOBRE MI -->
                        <div class="sobreMi">
                            <h4>Sobre Mi</h4>
                            <img src="<?= $plantilla->get_atributo('ruta_img_blog') ?>sobreMi.jpg" alt="Lorem ipsum dolor sit amet" class="img-fluid my-1">
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p>
                        </div>
                    <?php else : ?>
                        <!-- ETIQUETAS -->
                        <div>
                            <h4>Etiquetas</h4>
                            <?php foreach (explode(",", $controlador->get_atributo('palabras_claves')) as $etiqueta) : ?>
                                <a href="#" class="btn btn-secondary btn-sm m-1"><?= $etiqueta ?></a>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <!-- Artículos destacados -->
                    <div class="my-4">
                        <h4>Artículos Destacados</h4>
                        <?php foreach ($controlador->get_atributo('articulos_destacados_recientes') as $articulo) : ?>
                            <div class="d-flex my-3">
                                <div class="w-100 w-xl-50 pr-3 pt-2">
                                    <a href="<?= $plantilla->get_atributo('ruta_dominio') . $articulo['ruta_amigable']; ?>">
                                        <img src="<?= $plantilla->get_atributo('ruta_img_articulos') . $articulo['portada_articulo'] ?>" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                                    </a>
                                </div>
                                <div>
                                    <a href="<?= $plantilla->get_atributo('ruta_dominio') . $articulo['ruta_amigable']; ?>" class="text-secondary">
                                        <p class="small"><?= substr($articulo['contenido_articulo'], 0, 50) . "..." ?></p>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!-- PUBLICIDAD -->
                        <?php foreach ($controlador->get_atributo('anuncios') as $anuncio) : ?>
                            <div class="my-4">
                                <img src="<?= $plantilla->get_atributo('ruta_img_anuncios') . $anuncio['codigo_anuncio'] ?>" class="img-fluid">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>