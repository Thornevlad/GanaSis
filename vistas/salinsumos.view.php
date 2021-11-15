
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
              <div class="col-lg-12">
                 <h1>Salida de Insumos</h1>
                 <?php require 'error.mns.php'; ?>
                 </div>

                  <form method="POST" action="salinsumos.php">
                    <div class="row">
                      <div class="col-lg-1 p-2">
                      <button type="submit" class="btn btn-primary" name="submit" value="agregar">Ingresar</button>
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Fecha de Salida de Insumos</label>
                      <input type="date" name= "SinsFecha_salida" class="form-control">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Cantidad de Salida:</label>
                      <input type="text" name= "SinsCant_salida" class="form-control" placeholder="Cantidad Salida">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Observacion:</label>
                      <textarea name="SinsObservacion" id="" placeholder="Observacion Salida" cols="35" rows="2"></textarea>
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id="salinsum" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Cod.Salida</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Fecha Salida</th>
                            <th scope="col">Cant. Salida</th>
                            <th scope="col">Observacion</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $salins): 
                            $contador += 1;
                            $Salincod = $salins['SinsCod_salida'];
                            $Salinsed = $salins['SinsSedNom'];
                            $Salinusu = $salins['SinsUsu_usuario'];
                            $Salinfec = $salins['SinsFecha_salida'];
                            $Salincan = $salins['SinsCant_salida'];
                            $Salinobs = $salins['SinsObservacion'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $Salincod; ?></td>
                              <td><?php echo $Salinsed; ?></td>
                              <td><?php echo $Salinusu; ?></td>
                              <td><?php echo $Salinfec; ?></td>
                              <td><?php echo $Salincan; ?></td>
                              <td><?php echo $Salinobs; ?></td>
                              <td><button type="button" class="btn btn-primary mt-1 mb-1" data-toggle="modal" 
                              data-target="#modsalins" data-scod="<?php echo $Salincod; ?>"
                              data-scan="<?php echo $Salincan; ?>"data-sfec="<?php echo $Salinfec; ?>" 
                              data-sobs="<?php echo $Salinobs;?>" >Editar</button></td>                            
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="modsalins" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar Salida de Insumos</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="salinsumos.php">
                                <input type="hidden" id="scod" name="Salincod" >
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Cantidad de Salida:</label>
                                <input type="text" id="scan" name= "Salcan" class="form-control" placeholder="Cantidad Salida">
                                </div>
                                <div class="col-lg-6 p-2">
                                <label for="recipient-name" class="col-form-label">Fecha de Salida de Insumos</label>
                                <input type="date" id="sfec" name= "SFsa" class="form-control">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Observacion:</label>
                                <textarea name="Salobs" id="sobs" placeholder="Observacion Salida" cols="60" rows="2"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3" name="submit" value="modificar">Modificar vacuna</button>
                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cerrar</button>
                              </form>
                            </div>
                          </div>
                        </div>
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

        $('#modsalins').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var sco = button.data('scod')
          var sca = button.data('scan')
          var sob = button.data('sobs') 
          var sfe = button.data('sfec')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-body #scod').val(sco)
          modal.find('.modal-body #scan').val(sca)
          modal.find('.modal-body #sobs').val(sob)
          modal.find('.modal-body #sfec').val(sfe)
         })
         $(document).ready(function() {    
    $('#salinsum').DataTable({        
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