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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
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
                 <h1>Ingreso Veterinario</h1>
                 <?php require 'error.mns.php'; ?>
                 </div>
                  <form method="POST" action="veterinarios.php">
                    <div class="row">
                      <div class="col-lg-1 p-2">
                      <button type="submit" class="btn btn-success" name="submit" value="agregar">Ingresar</button>
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Nombre</label>
                      <input type="text" name= "VetNom_veterinario" class="form-control" placeholder="Nombre">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Apellido</label>
                      <input type="text" name= "VetApe_veterinario" class="form-control" placeholder="apellido">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Dirección</label>
                      <input type="text" name= "VetDireccion" class="form-control" placeholder="Dirección">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Correo Electronico</label>
                      <input type="text" name= "VetCorreo" class="form-control" placeholder="Correo">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Telefono</label>
                      <input type="text" name= "VetTelefono" class="form-control" placeholder="Telefono">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Tarjeta Profesional</label>
                      <input type="text" name= "VetTarj_profesional" class="form-control" placeholder="Tarjeta Profesional">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Número Identificación</label>
                      <input type="text" name= "VetIdentificacion" class="form-control" placeholder="Identificación">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Ciudad</label>
                      <input type="text" name= "VetCiudad" class="form-control" placeholder="Ciudad">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Pais</label>
                      <input type="text" name= "VetPais" class="form-control" placeholder="Pais">
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id="veterinarios" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">T.Profesional</th>
                            <th scope="col">Identificacion</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Pais</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>

                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $veterinario): 
                            $contador += 1;
                            $Vetecod = $veterinario['VetCod_veterinario'];
                            $Vetenom = $veterinario['VetNom_veterinario'];
                            $Veteape = $veterinario['VetApe_veterinario'];
                            $VeteDir = $veterinario['VetDireccion'];
                            $VeteCor = $veterinario['VetCorreo'];
                            $Vetetel = $veterinario['VetTelefono'];
                            $Vetepro = $veterinario['VetTarj_profesional'];
                            $VeteIde = $veterinario['VetIdentificacion'];
                            $VeteCiu = $veterinario['VetCiudad'];
                            $VetePai = $veterinario['VetPais'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $Vetenom; ?></td>
                              <td><?php echo $Veteape; ?></td>
                              <td><?php echo $VeteDir; ?></td>
                              <td><?php echo $VeteCor; ?></td>
                              <td><?php echo $Vetetel; ?></td>
                              <td><?php echo $Vetepro; ?></td>
                              <td><?php echo $VeteIde; ?></td>
                              <td><?php echo $VeteCiu; ?></td>
                              <td><?php echo $VetePai; ?></td>
                              <td><button type="button" class="btn btn-info mt-1 mb-1" data-toggle="modal" data-target="#modvet" 
                              data-vcod="<?php echo $Vetecod; ?>" data-vnom="<?php echo $Vetenom; ?>"
                              data-vape="<?php echo $Veteape; ?>" data-vdir="<?php echo $VeteDir; ?>" data-vcor="<?php echo $VeteCor;?>"
                              data-vtel="<?php echo $Vetetel; ?>" data-vpro="<?php echo $Vetepro; ?>" data-vide="<?php echo $VeteIde; ?>"
                              data-vciu="<?php echo $VeteCiu; ?>" data-vpai="<?php echo $VetePai; ?>" >Editar</button></td>                            
                              <td><button type="button" class="btn btn-danger mt-1 mb-1" data-toggle="modal" data-target="#elivet"
                              data-ecod="<?php echo $Vetecod; ?>" data-eide="<?php echo $VeteIde; ?>" >Eliminar</button></td>
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="modvet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar Veterinario</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="veterinarios.php">
                                <input type="hidden" id="vcod" name="Vetecod" >
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Nombre</label>
                                  <input type="text" id = "vnom" require name= "Nombre" class="form-control" placeholder="Nombre" id="recipient-name">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Apellido</label>
                                  <input type="text" id = "vape" require name= "Apellido" class="form-control" placeholder="apellido" id="recipient-name">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Dirección</label>
                                  <input type="text" id = "vdir" require name= "Direccion" class="form-control" placeholder="Dirección" id="recipient-name">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Correo Electronico</label>
                                  <input type="text" id = "vcor" require name= "Correo" class="form-control" placeholder="Correo" id="recipient-name">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Telefono</label>
                                  <input type="text" id = "vtel" require name= "Telefono" class="form-control" placeholder="Telefono" id="recipient-name">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Tarjeta Profesional</label>
                                  <input type="text" id = "vpro" require name= "Tprofesional" class="form-control" placeholder="Tarjeta Profesional" id="recipient-name">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Número Identificacion</label>
                                  <input type="text" id = "vide" require name= "Identificacion" class="form-control" placeholder="Identificación" id="recipient-name">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Ciudad</label>
                                  <input type="text" id = "vciu" require name= "Ciudad" class="form-control" placeholder="Ciudad" id="recipient-name">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Pais</label>
                                  <input type="text" id = "vpai" require name= "Pais" class="form-control" placeholder="Pais" id="recipient-name">
                                  </div>
                                <button type="submit" class="btn btn-success mt-3" name="submit" value="modificar">Modificar Veterinario</button>
                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cerrar</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="elivet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xs">
                         <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Eliminar Veterinario</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="POST" action="veterinarios.php">
                                     <input type="hidden" id="ecod" name="Vetecod">
                                       <div class="modal-body">
                                         <p>Va a Eliminar el usuario ¿Está Seguro?</p>
                                       </div>
                                        <div class="from-group">
                                            <button type="submit" class="btn btn-danger mt-3" name = "submit" value = "eliminar">Eliminar Usuario</button>
                                            <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cerrar</button>
                                          </div>
          </section>
        </div>
          <?php include ('vistas/footer.php');?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script>


        $('#modvet').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var vtc = button.data('vcod')
          var vnb = button.data('vnom')
          var vap = button.data('vape')
          var vdr = button.data('vdir') 
          var vce = button.data('vcor')
          var vtl = button.data('vtel')
          var vtp = button.data('vpro')
          var vid = button.data('vide')
          var vcd = button.data('vciu')
          var vps = button.data('vpai')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('Modificar Vacuna ' + vid +' - ' + vnb)
          modal.find('.modal-body #vcod').val(vtc)
          modal.find('.modal-body #vnom').val(vnb)
          modal.find('.modal-body #vape').val(vap)
          modal.find('.modal-body #vdir').val(vdr)
          modal.find('.modal-body #vcor').val(vce)
          modal.find('.modal-body #vtel').val(vtl)
          modal.find('.modal-body #vpro').val(vtp)
          modal.find('.modal-body #vide').val(vid)
          modal.find('.modal-body #vciu').val(vcd)
          modal.find('.modal-body #vpai').val(vps)
         })
         $('#elivet').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var eco = button.data('ecod')
            var eid = button.data('eide')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar Veterinario ' + eid)
            modal.find('.modal-body #ecod').val(eco)
            })
    
            $(document).ready(function() {    
    $('#veterinarios').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
            //para usar los botones   
            responsive: "true",
            dom: 'Bfrtilp',       
            buttons:[ 
          {
            extend:    'excelHtml5',
            text:      '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success'
          },
          {
            extend:    'pdfHtml5',
            text:      '<i class="fas fa-file-pdf"></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger'
          },
          {
            extend:    'print',
            text:      '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info'
          },
        ]	        
        });     
    });
    </script>
  </body>
</html>
<?php } ?>