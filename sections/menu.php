<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li><a href="<?php echo Utils::rootpath() . '/index.php'; ?>"><i class="fa fa-home"></i>
                    <span>Accueil</span></a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i> <span>Maintenance</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utils::rootpath() . '/edit_screen.php'; ?>"><i class="fa fa-desktop"></i>
                            <span>Écrans</span></a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-search"></i> <span>Recherche</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utils::rootpath() . '/search_screen.php'; ?>"><i class="fa fa-desktop"></i>
                            <span>Écrans</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Système</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utils::rootpath() . '/users.php'; ?>"><i class="fa fa-user-plus"></i> <span>Gestion des utilisateurs</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
</aside>