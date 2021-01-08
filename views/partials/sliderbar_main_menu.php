<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="<?= $baseURL ?>/views/components/img/logo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Tienda de mascotas MUNDO ANIMAL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $baseURL ?>/views/components/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Tatiana Pineda</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= $baseURL; ?>/views/index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>
                <li class="nav-header">Modulos Principales</li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'persona') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'persona') ? 'active' : '' ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Persona
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/persona/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/persona/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'compra') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'compra') ? 'active' : '' ?>">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Compra
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/compra/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/compra/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'elemento') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'elemento') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Elemento
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/elemento/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/elemento/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'raza') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'raza') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Raza
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/raza/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/raza/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'servicio') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'servicio') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Servicio
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/servicio/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/servicio/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'articuloventa') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'articuloventa') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Articuloventa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/articuloventa/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/articuloventa/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'descripcion') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'descripcion') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Descripcion
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/descripcion/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/descripcion/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'inventario') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'inventario') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Inventario
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/inventario/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/inventario/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'mascota') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'mascota') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Mascota
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/mascota/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/mascota/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'venta') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'venta') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Venta
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/venta/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/venta/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= strpos($_SERVER['REQUEST_URI'],'cita') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= strpos($_SERVER['REQUEST_URI'],'cita') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-dolly"></i>
                        <p>
                            Cita
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/cita/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gestionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $baseURL ?>/views/modules/cita/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registrar</p>
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