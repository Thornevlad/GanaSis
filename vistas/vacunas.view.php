<?php if($sesion == false){
        header('Location: ../login.php');
    }else{ ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Bovisoft - Vacunas</title>
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
                 <h1>Ingreso Vacunas Bovinas</h1>
                 <?php require 'error.mns.php'; ?>
                 </div>
                  <form method="POST" action="vacunas.php">
                    <div class="row">
                      <div class="col-lg-1 p-2">
                      <button type="submit" class="btn btn-primary" name="submit" value="agregar">Ingresar</button>
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Nombre Laboratorio</label>
                      <input type="text" name= "VacLaboratorio" class="form-control" placeholder="Laboratorio">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Nombre de la Vacuna</label>
                      <input type="text" name= "VacNombre_vac" class="form-control" placeholder="Nombre vacuna">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Dosis de la Vacuna (ml)</label>
                      <input type="text" name= "VacDosis_vac" class="form-control" placeholder="Dosis de la vacuna">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Dosis Suministrada (ml)</label>
                      <input type="text" name= "VacDosis_sum" class="form-control" placeholder="Dosis Suministrada">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Dosis a Suministrar (ml)</label>
                      <input type="text" name= "VacDosisasum" class="form-control" placeholder="Dosis a suminustrar">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Tipo de Vacuna</label>
                      <select class="form-control form-control-sm" name="VacTipo_vacuna">
                            <option>Seleccionar Tipo Vacuna</option>
                            <option>Control</option>
                            <option>Tratamiento</option>
                            <option>Prevención</option>
                      </select>
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Fecha de Última Vacuna</label>
                      <input type="date" name= "VacFec_ultvac" class="form-control">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Fecha de Próxima Vacuna</label>
                      <input type="date" name= "VacFec_proxvac" class="form-control">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Fecha última palpación</label>
                      <input type="date" name= "VacFec_ultpalp" class="form-control">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Fecha Próxima palpación</label>
                      <input type="date" name= "VacFec_proxpalp" class="form-control">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Fecha de vacuna</label>
                      <input type="date" name= "VacFec_vacuna" class="form-control">
                      </div>
                    </div>
                  </form>

                  <div class="table-responsive">
                    <table id="vacunas" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">T.Vacuna</th>
                            <th scope="col">Laboratorio</th>
                            <th scope="col">Nnombre</th>
                            <th scope="col">Ul.Vacuna</th>
                            <th scope="col">Pr.Vacuna</th>
                            <th scope="col">Ac.Vacuna</th>
                            <th scope="col">Fe.Vacuna</th>
                            <th scope="col">D.Vacuna</th>
                            <th scope="col">D.suministrado</th>
                            <th scope="col">D.suminitrar</th>
                            <th scope="col">Ul.Palpacion</th>
                            <th scope="col">Pr.Palpacion</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $vacuna): 
                            $contador += 1;
                            $Vacod = $vacuna['VacCod_vacuna'];
                            $Vatip = $vacuna['VacTipo_vacuna'];
                            $Valab = $vacuna['VacLaboratorio'];
                            $Vanom = $vacuna['VacNombre_vac'];
                            $Vafuv = $vacuna['VacFec_ultvac'];
                            $Vafpv = $vacuna['VacFec_proxvac'];
                            $Vafva = $vacuna['VacFec_vacuna'];
                            $Vadva = $vacuna['VacDosis_vac'];
                            $Vadsu = $vacuna['VacDosis_sum'];                            
                            $Vadas = $vacuna['VacDosisasum'];
                            $Vafup = $vacuna['VacFec_ultpalp'];
                            $Vafpp = $vacuna['VacFec_proxpalp'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $Vatip; ?></td>
                              <td><?php echo $Valab; ?></td>
                              <td><?php echo $Vanom; ?></td>
                              <td><?php echo $Vafuv; ?></td>
                              <td><?php echo $Vafpv; ?></td>
                              <td><?php echo $Vafva; ?></td>
                              <td><?php echo $Vadva; ?></td>
                              <td><?php echo $Vadsu; ?></td>
                              <td><?php echo $Vadas; ?></td>
                              <td><?php echo $Vafup; ?></td>
                              <td><?php echo $Vafpp; ?></td>
                              <td><button type="button" class="btn btn-primary mt-1 mb-1" data-toggle="modal" 
                              data-target="#modvac" data-vcod="<?php echo $Vacod; ?>" data-vtip="<?php echo $Vatip; ?>"
                              data-vlab="<?php echo $Valab; ?>" data-vnom="<?php echo $Vanom; ?>" 
                              data-vfuv="<?php echo $Vafuv;?>" data-vfpv="<?php echo $Vafpv; ?>" 
                              data-vfva="<?php echo $Vafva; ?>"  data-vdva="<?php echo $Vadva; ?>" 
                              data-vdsu="<?php echo $Vadsu; ?>" data-vdas="<?php echo $Vadas; ?>" 
                              data-vfup="<?php echo $Vafup; ?>" data-vfpp="<?php echo $Vafpp; ?>" >Editar</button></td>                            
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="modvac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar vacuna</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="vacunas.php">
                                <input type="hidden" id="vcod" name="Vacod" >
                                <div class="col-lg p-2">
                                <label for="fechventa">Tipo de Vacuna</label>
                                <select class="form-control form-control-sm" id = "vtip" name="VacTipo" id="recipient-name">
                                      <option>Seleccionar Tipo Vacuna</option>
                                      <option>Control</option>
                                      <option>Tratamiento</option>
                                      <option>Prevención</option>
                                </select>
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Nombre Laboratorio</label>
                                <input type="text" id = "vlab" name= "VacLabo" class="form-control" placeholder="Laboratorio" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Nombre Vacuna</label>
                                <input type="text" id = "vnom" name= "VacNomb" class="form-control" placeholder="Nombre vacuna" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Dosis de la Vacuna (ml)</label>
                                <input type="text" id = "vdva" name= "VacDosi" class="form-control" placeholder="Dosis de la vacuna" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Dosis Suministrada (ml)</label>
                                <input type="text" id = "vdsu" name= "VacDosi2" class="form-control" placeholder="Dosis Suministrada" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Dosis a Suministrar (ml)</label>
                                <input type="text" id = "vdas" name= "VacDosi3" class="form-control" placeholder="Dosis a suminustrar" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Fecha de Última Vacuna</label>
                                <input type="date" id = "vfuv" name= "VacFecult" class="form-control" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Fecha de Próxima Vacuna</label>
                                <input type="date" id = "vfpv" name= "VacFecprox" class="form-control" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Fecha última palpación</label>
                                <input type="date" id = "vfup" name= "VacFecupal" class="form-control" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Fecha Próxima palpación</label>
                                <input type="date" id = "vfpp" name= "VacFecppal" class="form-control" id="recipient-name">
                                </div>
                                <div class="col-lg p-2">
                                <label for="fechventa">Fecha de vacuna</label>
                                <input type="date" id = "vfva" name= "VacFecvac" class="form-control" id="recipient-name">
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

        $('#modvac').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var cod = button.data('vcod')
          var tip = button.data('vtip')
          var lab = button.data('vlab')
          var nom = button.data('vnom') 
          var fuv = button.data('vfuv')
          var fpv = button.data('vfpv')
          var fav = button.data('vfav')
          var fva = button.data('vfva')
          var dva = button.data('vdva')
          var dsu = button.data('vdsu')
          var das = button.data('vdas')
          var fup = button.data('vfup')
          var fpp = button.data('vfpp')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('Modificar Vacuna ' + nom +' - ' + tip)
          modal.find('.modal-body #vcod').val(cod)
          modal.find('.modal-body #vtip').val(tip)
          modal.find('.modal-body #vlab').val(lab)
          modal.find('.modal-body #vnom').val(nom)
          modal.find('.modal-body #vfuv').val(fuv)
          modal.find('.modal-body #vfpv').val(fpv)
          modal.find('.modal-body #vfav').val(fav)
          modal.find('.modal-body #vfva').val(fva)
          modal.find('.modal-body #vdva').val(dva)
          modal.find('.modal-body #vdsu').val(dsu)
          modal.find('.modal-body #vdas').val(das)
          modal.find('.modal-body #vfup').val(fup)
          modal.find('.modal-body #vfpp').val(fpp)
         })
    
         $(document).ready(function() {    
    $('#vacunas').DataTable({        
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