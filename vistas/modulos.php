<?php if($sesion == false){
        header('Location: ../login.php');
    }else{ ?>
<div class="col-lg-3 p-2">
               <div class="card " style="width:13rem;">
               <?php if($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'MasterBD'){?>
                  <img class="card-img-top " src="imagenes/usuarios.png" alt="admin.png">
                    <div class="card-body">
                      <h5 class="card-title">Administrativo</h5>
                      <p class="card-text">Ingreso, Control y Validación de usuarios y otras funciones.</p><br>
                      <a href="modadministrativo.php" class="btn btn-primary">Ingresar</a>
                    </div>
                </div>
               </div>
               <div class="col-lg-3 p-2">
               <div class="card" style="width:13rem;">
               <?php } if( $_SESSION['rol'] == 'Auxiliar'){ ?>
                  <img class="card-img-top " src="imagenes/ganado1.png" alt="ganado.png">
                    <div class="card-body">
                      <h5 class="card-title">Ganado</h5>
                      <p class="card-text">Ingreso, Control, Verificación y Validación del ganado.</p><br><br>
                      <a href="modganado.php" class="btn btn-primary">Ingresar</a>
                    </div>
                </div>
               </div>
               <div class="col-lg-3 p-2">
               <div class="card " style="width:13rem;">
               <?php } if( $_SESSION['rol'] == 'Auxiliar'){ ?>
                  <img class="card-img-top " src="imagenes/insumos1.jpg" alt="insumos.png">
                    <div class="card-body">
                      <h5 class="card-title">Insumos</h5>
                      <p class="card-text">Ingreso, Control y Despacho de Insumo.</p>
                      <a href="modinsumos.php" class="btn btn-primary">Ingresar</a>
                    </div>
                    <?php } ?>
                </div>
               </div>
<?php } ?>