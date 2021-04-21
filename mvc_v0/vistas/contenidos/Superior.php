    <div class="wrapper">
       <!-- Navbar -->
       <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
             <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
             </li>
             <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= $plantilla->get_atributo('ruta_dominio') . 'Inicio'; ?>" class="nav-link">Inicio</a>
             </li>
             <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contacto</a>
             </li>
          </ul>

          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
             <!-- Messages Dropdown Menu -->
             <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                   <i class="far fa-comments"></i>
                   <sup>
                      <span class="badge badge-danger navbar-badge" style="top: -5px">3</span>
                   </sup>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                   <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                         <img src="vistas/img/usuarios/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                         <div class="media-body">
                            <h3 class="dropdown-item-title">
                               Brad Diesel
                               <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                         </div>
                      </div>
                      <!-- Message End -->
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                         <img src="vistas/img/usuarios/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                         <div class="media-body">
                            <h3 class="dropdown-item-title">
                               John Pierce
                               <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                         </div>
                      </div>
                      <!-- Message End -->
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item">
                      <!-- Message Start -->
                      <div class="media">
                         <img src="vistas/img/usuarios/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                         <div class="media-body">
                            <h3 class="dropdown-item-title">
                               Nora Silvester
                               <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                         </div>
                      </div>
                      <!-- Message End -->
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
             </li>
             <!-- Notifications Dropdown Menu -->
             <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                   <i class="far fa-bell"></i>
                   <sup>
                      <span class="badge badge-warning navbar-badge" style="top: -5px">15</span>
                   </sup>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                   <span class="dropdown-header">15 Notifications</span>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item">
                      <i class="fas fa-envelope mr-2"></i> 4 new messages
                      <span class="float-right text-muted text-sm">3 mins</span>
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item">
                      <i class="fas fa-users mr-2"></i> 8 friend requests
                      <span class="float-right text-muted text-sm">12 hours</span>
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item">
                      <i class="fas fa-file mr-2"></i> 3 new reports
                      <span class="float-right text-muted text-sm">2 days</span>
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
             </li>
             <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
             </li>
          </ul>
       </nav>
       <!-- /.navbar -->

       <!-- Main Sidebar Container -->
       <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="#" class="brand-link">
             <img src="vistas/img/generales/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
             <span class="brand-text font-weight-light">Plantilla MVC</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
             <!-- Sidebar user panel (optional) -->
             <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                   <img src="vistas/img/usuarios/avatar3.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                   <a href="#" class="d-block">Administradora Apellido</a>
                </div>
             </div>

             <!-- Sidebar Menu -->
             <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                   <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                            Menú principal
                            <i class="right fas fa-angle-left"></i>
                         </p>
                      </a>
                      <ul class="nav nav-treeview">
                         <li class="nav-item">
                            <a href="<?= $plantilla->get_atributo('ruta_dominio') . 'Inicio'; ?>" class="nav-link activar active">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Página de inicio</p>
                            </a>
                         </li>
                         <li class="nav-item">
                            <a href="<?= $plantilla->get_atributo('ruta_dominio') . 'GaleriaImagenes'; ?>" class="nav-link activar">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Galería de Imágenes</p>
                            </a>
                         </li>
                         <li class="nav-item">
                            <a href="<?= $plantilla->get_atributo('ruta_dominio') . 'Pagina2'; ?>" class="nav-link activar">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Página 2</p>
                            </a>
                         </li>
                         <li class="nav-item">
                            <a href="<?= $plantilla->get_atributo('ruta_dominio') . 'Pagina3'; ?>" class="nav-link activar">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Página 3</p>
                            </a>
                         </li>
                         <li class="nav-item">
                            <a href="<?= $plantilla->get_atributo('ruta_dominio') . 'Pagina4'; ?>" class="nav-link activar">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Página 4</p>
                            </a>
                         </li>
                         <li class="nav-item">
                            <a href="<?= $plantilla->get_atributo('ruta_dominio') . 'Pagina5'; ?>" class="nav-link activar">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Página 5</p>
                            </a>
                         </li>
                      </ul>
                   </li>
                </ul>
             </nav>
             <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
       </aside>

       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
             <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Content Management System</h1>
                   </div><!-- /.col -->
                   <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= $plantilla->get_atributo('ruta_dominio') . 'Inicio'; ?>">Inicio</a></li>
                      </ol>
                   </div><!-- /.col -->
                </div><!-- /.row -->
             </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->