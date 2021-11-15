<!doctype html>
<html lang="en">
  <head>
    <title>Bovisoft - Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color:#FAFAFA">
      <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-3 mt-3 p-3">
                <img src="logo1.png" alt="Responsive image">
            </div>
              <div class="text-primary col-lg-9 bg-trasnparent mt-5 rounded">
                 <h1>Sistema de Control de Inventario Bovino - Bovisoft </h1>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-lg-3 bg-transparent mt-5 p-3 rounded">
                  <h3 class="text-center text-primary">Acceso al Sistema</h3>
                  <form method="POST" action="validarlogin.php">
                        <div class="col-lg form-group">
                            <input type="text" name="docusu" class="form-control" required id="" placeholder="Ingrese su Usuario" >
                            </div>
                        <div class="col-lg form-group">
                            <input type="password" name="conusu" class="form-control" required id="" placeholder="Ingrese su Contraseña">
                        </div>
                        <div class="col-lg">
                        <button type="submit" name="submit" value ="login" class="btn btn-primary btn-sm btn-block">Ingresar</button>
                        </div>
                    </form>
                    <?php require 'vistas/error.mns.php'; ?>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>