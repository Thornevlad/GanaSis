<header>
    <div class="row">
        <div class="col-lg-3">
            <img src="logo1.png" alt="Responsive image">
        </div>
        <div class="text-primary col-lg-8 bg-trasnparent mt-5 rounded">
            <h3>Sistema de Control de Inventario Bovino - Bovisoft </h3>
            <h4><small>Usuario <?php echo $_SESSION['rol'].': '.$_SESSION['nom'].' '.$_SESSION['ape']; ?></small></h4>
        </div>

        <div class="col-lg-1 p-3">
            <h6><a href="./cerrar.php" class="text-danger">Cerrar Sesión</a></h6>
        </div>
    </div>
</header>
