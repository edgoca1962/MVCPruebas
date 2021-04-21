<!-- Encabezado -->
<?php include('Vista/Plantilla/Encabezado_admin.php'); ?>
<!-- Cuerpo -->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> <?= $parametros['page_title']; ?></h1>
        </div>
    </div>
    <?php
    $digesto = password_hash("edwingonzálezcastillo105710341", PASSWORD_DEFAULT);
    echo $digesto . "<br>";
    if (password_verify('edwingonzálezcastillo105710341', '$2y$10$SPp6AWZc3mHxdNoAMV8fT.Io8Ao/kF4O6gLhIBNbTk7TmJAb7dV8y')) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }
    ?>
    <p><?= $parametros['mensaje']; ?></p>
</main>
<!-- Pie de página -->
<?php include('Vista/Plantilla/Pie_admin.php'); ?>