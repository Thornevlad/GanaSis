
<?php if($sesion == false){
        header('Location: ../login.php');
    }else{ ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Bovisoft - modulos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color:#FAFAFA;">
      <div class="container">
          <?php include ('vistas/header.php');?>
          <section>
              <div class="row">
                <div class="col-lg" style="background-color:#CEF6EC;">
                     <?php include ('vistas/menu_horizontal.php');?>
                </div>
              </div>
              <div class="row">
               <div class="col-lg-3 p-2">
                  <div class="card " style="width:13rem;">
                  <?php if($_SESSION['rol'] == 'Auxiliar'){?>
                    <img class="card-img-top " src="imagenes/ganado.png" alt="regis.png">
                      <div class="card-body">
                        <h5 class="card-title">Ganado</h5>
                        <p class="card-text">Ingreso, Control y de Ganado.</p><br>
                        <a href="regisganado.php" class="btn btn-primary">Registrar</a>
                      </div>
                  </div>
                 </div>
                 <div class="col-lg-3 p-2">
                  <div class="card " style="width:13rem;">
                  <?php } if( $_SESSION['rol'] == 'Auxiliar'){ ?>
                    <img class="card-img-top " src="imagenes/jeringa.png" alt="salud.png">
                      <div class="card-body">
                        <h5 class="card-title">Salud</h5>
                        <p class="card-text">Control y Validación de vacunas, etc.</p><br>
                        <a href="modsalud.php" class="btn btn-primary">Registrar</a>
                      </div>
                  </div>
                 </div>
                 <div class="col-lg-3 p-2">
                  <div class="card " style="width:13rem;">
                  <?php } if( $_SESSION['rol'] == 'Auxiliar'){ ?>
                    <img class="card-img-top " src="imagenes/becerro1.jpg" alt="becerro.png">
                      <div class="card-body">
                        <h5 class="card-title">Nacimiento</h5>
                        <p class="card-text">Ingreso, Control de los Nacimientos.</p><br>
                        <a href="nacimiento.php" class="btn btn-primary">Registrar</a>
                      </div>
                  </div>
                 </div>
                 <div class="col-lg-3 p-2">
                  <div class="card " style="width:13rem;">
                  <?php } if( $_SESSION['rol'] == 'Auxiliar'){ ?>
                    <img class="card-img-top " src="imagenes/informes.png" alt="novedad.png">
                      <div class="card-body">
                        <h5 class="card-title">Novedades</h5>
                        <p class="card-text">Ingreso, Control de Novedades Bovinas.</p><br>
                        <a href="novedades.php" class="btn btn-primary">Registrar</a>
                      </div>
                    <?php } ?>
                  </div>
                 </div>
               </div>
            </section>
          <?php include ('vistas/footer.php');?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php } ?>