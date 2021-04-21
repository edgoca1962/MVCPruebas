<!-- Encabezado -->
<?php include('Vista/Plantilla/Encabezado_admin.php'); ?>
<!-- Cuerpo -->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> <?= $parametros['page_title']; ?></h1>
        </div>
    </div>
    <h1>Perfil</h1>
    <p><?= $parametros['mensaje']; ?></p>
</main>
<!-- Pie de página -->
<?php include('Vista/Plantilla/Pie_admin.php'); ?>