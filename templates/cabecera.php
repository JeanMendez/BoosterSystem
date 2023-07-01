<?php 
$url_base="http://localhost/boostersystem/";
?>
<header class="main-header">
    <!-- Logo -->
    <a href="../inicio.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="#" alt="" width="40px"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="../img/logo.png" alt="" height="50px"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
              
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <small class="bg-red">Online</small>
                        <span class="hidden-xs"><?php echo $nombresUsuario." ".$apellidosUsuario?></span>
                        <img src="../img/perfil.jpg" class="user-image" alt="Imagen de perfil">
                    </a>

                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="background-color: #003366;">
                            <img src="../img/perfil.jpg" class="img-circle" alt="Imagen de perfil">
                            <p>
                                <?php echo $nombresUsuario." ".$apellidosUsuario?> - <?php echo $rol_idRol?>
                                <small>Desde Marzo 2023</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                  
                        <!-- Menu Footer-->
                        <li class="user-footer" style="background-color: #003b75;">
                            <div class="pull-left">
                                <a href="<?php echo $url_base; ?>404/error404.php" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo $url_base; ?>login/cerrarSesion.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
