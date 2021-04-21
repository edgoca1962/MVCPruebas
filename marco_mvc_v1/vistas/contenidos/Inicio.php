<?php
$pagina_actual = 1;
$primera_pagina = 0;
$ultima_pagina = 5;
$total_paginas = 12;
?>
<div class="container">
   <div class="row">
      <!-- COLUMNA IZQUIERDA -->
      <div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5" id="articulos">
         <!-- ARTÍCULOS -->

      </div>
   </div>
   <div class="row">
      <div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5" id="paginacion">
         <!-- Paginacion -->
         <nav aria-label="paginacion">
            <ul class="pagination justify-content-center">
               <li class="page-item <?= ($pagina_actual <= 1) ? 'disabled' : ''; ?>"><a class="page-link" href="#" pagina="1">Primera</a>
               </li>
               <li class="page-item <?= ($pagina_actual <= 1) ? 'disabled' : ''; ?>"><a class="page-link" href="#" pagina=<?= $pagina_actual - 1; ?> aria-label="Anterior"><span aria-hidden="true">&laquo;</span></a>
               </li>

               <?php for ($i = $primera_pagina; $i < $ultima_pagina; $i++) : ?>
                  <li class="page-item <?= ($pagina_actual == $i + 1) ? 'active' : ''; ?>">
                     <a class="page-link" href="#" pagina=<?= $i + 1; ?>><?= $i + 1; ?></a>
                  </li>
               <?php endfor ?>

               <li class="page-item <?= ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="#" pagina=<?= $pagina_actual + 1; ?> aria-label="Siguiente"><span aria-hidden="true">&raquo;</span> </a>
               </li>
               <li class="page-item <?= ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>"><a class="page-link" href="#" pagina=<?= $total_paginas; ?>>Última</a>
               </li>
            </ul>
         </nav>
      </div>
   </div>