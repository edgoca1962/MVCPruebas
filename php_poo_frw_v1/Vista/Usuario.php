<!-- Encabezado -->
<?php include('Vista/Plantilla/Encabezado_admin.php') ?>
<!-- Cuerpo -->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> <?= $parametros['page_title']; ?></h1>

        </div>
    </div>
    <p><?= $parametros['mensaje']; ?></p>
    <p>El número de registros consultados es <?= $parametros['mensaje']; ?></p>
    <ul>
        <?php foreach ($parametros['usuarios'] as $usuario) {  ?>
            <li>
                <?php echo $usuario->BitacoraCodigo;  ?>
            </li>
        <?php } ?>
    </ul>
</main>
<!-- Pie de página -->
<?php include('Vista/Plantilla/Pie_admin.php') ?>