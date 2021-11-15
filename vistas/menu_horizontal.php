
<?php if($sesion == false){
        header('Location: ../login.php');
    }else{ ?>
<ul class="nav justify-content-end">
        <?php if($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'MasterBD'){?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="usuarios.php">Crear Usuario</a>
                    <a class="dropdown-item" href="sedes.php">Crear Sedes</a>
                </div>
        </li>
        <?php } if( $_SESSION['rol'] == 'Auxiliar'){ ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Modulos</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="modganado.php">Ganado</a>
                    <a class="dropdown-item" href="modinsumos.php">Insumos</a>
                </div>
        </li>
        <?php } if($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Auxiliar'){ ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Informes</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="informeganado.php">Informes de Ganadería</a>
                    <a class="dropdown-item" href="informeinsumos.php">Informes de Insumos</a>
                </div>
        </li>
        <?php } if($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'MasterBD'){ ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Herramientas</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Copia de Seguridad</a>
                    <a class="dropdown-item" href="#">Restaurar copia de seguridad</a>
                    <a class="dropdown-item" href="#">Imprimir</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
                </div>
        </li>
        <?php } ?>
 </ul>
<?php } ?>