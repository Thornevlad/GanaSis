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
                 <button type="button" class="btn btn-success mt-3 mb-3" data-toggle="modal" data-target="#nueusu" data-whatever="@mdo">Nuevo Usuario</button>
                 <?php require 'error.mns.php'; ?>
                 <form class="form-inline my-2" id="search">
                      <label class="">Buscar:</label>
                      <div class="col-md-2">
                        <input class="form-control" id="tableSearch" type="text" placeholder="Buscar">
                    </div>
                  </form>
                    <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nombre2</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Apellido2</th>
                            <th scope="col">Identificacion</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Movil</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>

                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $usuario): 
                            $contador += 1;
                            $UsuCo = $usuario['UsuCod_usuario'];
                            $UsuNo = $usuario['Usu_Usuario'];
                            $UsuPa = $usuario['UsuContrasena'];
                            $UsuRo = $usuario['UsuRol'];
                            $UsuEs = $usuario['UsuEstado'];
                            $UsuUs = $usuario['Usu_Usuario'];
                            $UsuCs = $usuario['UsuCod_sede'];
                            $UsuN1 = $usuario['UsuNombre'];
                            $UsuN2 = $usuario['UsuNombre2'];
                            $UsuA1 = $usuario['UsuApellido'];
                            $UsuA2 = $usuario['UsuApellido2'];
                            $UsuId = $usuario['UsuIdentificacion'];
                            $UsuCe = $usuario['UsuCorreo'];
                            $UsuTe = $usuario['UsuTelefono'];

                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $UsuRo; ?></td>
                              <td><?php echo $UsuEs; ?></td>
                              <td><?php echo $UsuUs; ?></td>
                              <td><?php echo $UsuN1; ?></td>
                              <td><?php echo $UsuN2; ?></td>
                              <td><?php echo $UsuA1; ?></td>
                              <td><?php echo $UsuA2; ?></td>
                              <td><?php echo $UsuId; ?></td>
                              <td><?php echo $UsuCe; ?></td>
                              <td><?php echo $UsuTe; ?></td>
                              <td><button type="button" class="btn btn-info mt-1 mb-1" data-toggle="modal" data-target="#modusu"
                              data-ucod="<?php echo $UsuCo; ?>" data-urol="<?php echo $UsuRo; ?>" data-upas="<?php echo $UsuPa;?>"
                              data-uest="<?php echo $UsuEs; ?>" data-uide="<?php echo $UsuId; ?>" data-unom="<?php echo $UsuN2;?>"
                              data-uape="<?php echo $UsuA2; ?>" data-umai="<?php echo $UsuCe; ?>" data-utel="<?php echo $UsuTe; ?>" 
                              data-used="<?php echo $UsuCs; ?>">Editar</button></td>
                              <td><button type="button" class="btn btn-danger mt-1 mb-1" data-toggle="modal" data-target="#eliusu"
                              data-ecod="<?php echo $UsuCo; ?>" data-eide="<?php echo $UsuId; ?>" >Eliminar</button></td>
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="nueusu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xs">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="usuarios.php">
                                <input type="hidden" name="proceso" value="ingresar">
                                
                                <div class="col-xs3 form-group">
                                <label for="recipient-name" class="col-form-label">Rol de Usuario:</label>
                                    <select class="form-control form-control-sm" name="UsuRol">
                                      <option>Seleccionar Rol</option>
                                      <option>Auxiliar</option>
                                      <option>Administrador</option>
                                      <option>MasterBD</option>
                                    </select>
                                  </div>
                                  <div class="col-xs-3 form-group">
                                  <label for="recipient-name" class="col-form-label">Estado del Usuario:</label>
                                  <select class="form-control form-control-sm" name="UsuEstado">
                                      <option>Seleccionar Estado</option>
                                      <option>Activo</option>
                                      <option>Inactivo</option>
                                      </select>
                                  </div>

                                <div class="col-xs-2 p-1">
                                <label for="recipient-name" class="col-form-label">Número de Identificacion:</label>
                                    <input type="text" name="UsuIdentificacion" required placeholder="Ingresar Identificación" class="form-control" id="">
                                  </div>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Seleccionar Sede del Usuario:</label>
                                    <select required class="form-control selectpicker" data-live-search="true" name="UsuCod_sede" id="used" data-size="5">
                                    <?php foreach($resultado_sede as $sed):?> 
                                    <option value="<?php echo $sed['SedID']; ?>"><?php echo $sed['SedID'].' - '.$sed['SedNombre'].' - '.$sed['SedCiudad']; ?></option>
                                    <?php endforeach;?>
                                  </select>
                                  </div>

                                  <div class="col-xs-2 p-1">
                                  <label for="recipient-name" class="col-form-label">Asignar Contraseña (8 caracteres):</label>
                                    <input type="text" name="UsuContrasena" required placeholder="Asignar Contraseña" class="form-control" id="">
                                  </div>                                
                                  <div class="col-xs-3 p-1">
                                  <label for="recipient-name" class="col-form-label">Primer Nombre:</label>
                                    <input type="text" name="UsuNombre" required placeholder="Primer Nombre" class="form-control" id="recipient-namme">
                                  </div>
                                  <div class="col-xs-3 p-1">
                                  <label for="recipient-name" class="col-form-label">Segundo Nombre:</label>
                                    <input type="text" name="UsuNombre2" placeholder="Segundo Nombre" class="form-control" id="recipient-name">
                                  </div>
                                  <div class="col-xs-3 p-1">
                                  <label for="recipient-name" class="col-form-label">Primer Apellido:</label>
                                    <input type="text" name="UsuApellido" required placeholder="Primer Apellido" class="form-control" id="recipient-name">
                                  </div>
                                  <div class="col-xs-3 p-1">
                                  <label for="recipient-name" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" name="UsuApellido2" placeholder="Segundo Apellido" class="form-control" id="recipient-name">
                                  </div>
                                  <div class="col-xs-2 p-1">
                                  <label for="recipient-name" class="col-form-label">Correo Electronico:</label>
                                    <input type="email" name="UsuCorreo" required placeholder="Correo Electronico" class="form-control" id="">
                                  </div> 
                                  <div class="col-xs-2 p-1">
                                  <label for="recipient-name" class="col-form-label">Teléfono:</label>
                                    <input type="text" name="UsuTelefono" required placeholder="Teléfono Móvil" class="form-control" id="recipient-name">
                                  </div>
                                <button type="submit" class="btn btn-primary mt-3" name="submit" value="agregar">Agregar Usuario</button>
                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cerrar</button>
                              </form>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="modusu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xs">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="usuarios.php">
                              <input type="hidden" id="ucod" name="UsuCo">
                                  <div class="col-xs-2 p-1">
                                  <label for="recipient-name" class="col-form-label">Segundo Nombre:</label>
                                    <input type="text" require name="Nombre2" placeholder="Ingrese Segundo Nombre" class="form-control" id="unom">
                                  </div>
                                  <div class="col-xs-2 p-1">
                                  <label for="recipient-name" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" require name="Apellido2" placeholder="Ingrese Segundo Apellido" class="form-control" id="uape">
                                  </div>
                                  <div class="col-xs-2 p-1">
                                  <label for="recipient-name" class="col-form-label">Correo Electronico:</label>
                                    <input type="email" require name="Correo" placeholder="Ingrese Correo" class="form-control" id="umai">
                                  </div>                                 
                                  <div class="col-xs-2 p-1">
                                  <label for="recipient-name" class="col-form-label">Teléfono:</label>
                                    <input type="text" require name="Telefono" placeholder="Ingrese Teléfono Móvil" class="form-control" id="utel">
                                  </div>
                                  <div class="col-xs-2 form-group p-1">
                                  <label for="recipient-name" class="col-form-label">Rol del Usuario:</label>
                                    <select class="form-control form-control-sm"  name = "Rol" id = "urol">
                                      <option>Seleccionar Rol</option>
                                      <option>Auxiliar</option>
                                      <option>Administrador</option>
                                      <option>MasterBD</option>
                                    </select>
                                  </div>
                                  <div class="col-xs-2 form-group p-1">
                                  <label for="recipient-name" class="col-form-label">Estado del Usuario:</label>
                                  <select class="form-control form-control-sm" name = "Estado" id = "uest">
                                      <option>Seleccionar Estado</option>
                                      <option>Activo</option>
                                      <option>Inactivo</option>
                                      </select>
                                  </div>
                                  <div class="from-group">
                                      <button type="submit" class="btn btn-success mt-3" name = "submit" value = "modificar">Modificar Usuario</button>
                                      <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cerrar</button>
                                   </div>
                              </form>
                              </div>
                          </div>
                    </div>
                  </div>
                              <div class="modal fade" id="eliusu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xs">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="usuarios.php">
                                      <input type="hidden" id="ecod" name="UsuCo">
                                        <div class="modal-body">
                                            <p>Va a Eliminar el usuario ¿Está Seguro?</p>
                                        </div>
                                        <div class="from-group">
                                            <button type="submit" class="btn btn-danger mt-3" name = "submit" value = "eliminar">Eliminar Usuario</button>
                                            <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cerrar</button>
                                          </div>
            </section>
          <?php include ('vistas/footer.php');?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function()
        {
          $("#tableSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });

          $('#modusu').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var ucd = button.data('ucod')
          //var upw = button.data('upas')
          var unb = button.data('unom')
          var uap = button.data('uape')
          var uce = button.data('umai')
          var utf = button.data('utel')
          var uro = button.data('urol')
          var ues = button.data('uest')
          var uid = button.data('uide')
          var usd = button.data('used')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('Modificar Usuario ' +uid +' - ' + unb)
          modal.find('.modal-body #ucod').val(ucd)
          //modal.find('.modal-body #upas').val(upw)
          modal.find('.modal-body #unom').val(unb)
          modal.find('.modal-body #uape').val(uap)
          modal.find('.modal-body #umai').val(uce)
          modal.find('.modal-body #utel').val(utf)
          modal.find('.modal-body #urol').val(uro)
          modal.find('.modal-body #uest').val(ues)
          modal.find('.modal-body #uide').val(uid)
          modal.find('.modal-body #used').val(usd)

         })

         $('#eliusu').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var eco = button.data('ecod')
            var eid = button.data('eide')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar cliente ' + eid)
            modal.find('.modal-body #ecod').val(eco)
            })
</script>
</body>
</html>
<?php } ?>