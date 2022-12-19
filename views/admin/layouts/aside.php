<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
        <img src="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text text-center font-weight-light">F.A.C.T.U.R.E</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block">RAMANANA Thierry</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <a href="<?= $router->url("admin_mois") ?>" class="nav-link active">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Mois</p>
                    </a>
                </li>
                
                <li class="nav-item has-treeview menu-open">
                    <a href="<?= $router->url("admin_sous_compteur") ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Sous Compteurs</p>
                    </a>
                </li>
                
                <li class="nav-item has-treeview menu-open">
                    <a href="<?= $router->url("admin_utilisateur") ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
