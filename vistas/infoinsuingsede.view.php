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
                       <div class="col-lg-12">
                              <h1>Modulo Usuarios</h1>
                                <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#conusu" data-whatever="@mdo">Consultar Ingresos</button>
                                <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#lisusu" data-whatever="@mdo">Listar Ingresos</button>
                                    <!-- Inicio Tabla -->
                                    <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                        <th scope="col">Item</th>
                                          <th scope="col">Sede</th>
                                          <th scope="col">Usuario Ingreso</th>
                                          <th scope="col">Tipo Insumo</th>
                                          <th scope="col">Nombre</th>
                                          <th scope="col">Descripcion</th>
                                          <th scope="col">Cantidad Ingreso</th>
                                          <th scope="col">Fecha Ingreso</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                          <td>La Ponderosa</td>
                                          <td>otto.lopez</td>
                                          <td>Alimento</td>
                                          <td>Pasto</td>
                                          <td>Pasto para Alimento Bovino</td>
                                          <td>10</td>
                                          <td>12/06/2020</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                            </div>
                      </div>
                      <!-- Final de Tabla -->

                      <!-- Inicio modal busqueda usuarios -->
                      <div class="modal fade" id="conusu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Consulta de Ingresos</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="infdespsede.php">
                                <div class="form-group">
                                  <input type="text" name ="sedcod" placeholder="Ingrese Codigo de Sede" class="form-control" id="">
                                </div>

                                  <button type="button" class="btn btn-primary">Buscar Ingresos</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Inicio modal listar usuarios -->
                      <div class="modal fade" id="lisusu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Listar Proveedores</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="listarusuarios.php">
                                  <button type="button" class="btn btn-primary">Listar Usuarios</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
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