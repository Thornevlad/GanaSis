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
                 <h1>Ingreso Enfermedades</h1>
                 <?php require 'error.mns.php'; ?>
                 </div>
                  <form method="POST" action="enfermedades.php">
                    <div class="row">
                      <div class="col-lg-1 p-2">
                      <button type="submit" class="btn btn-success" name="submit" value="agregar">Ingresar</button>
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Nombre de la Enfermedad</label>
                      <input type="text" name= "EnfNombre" class="form-control" placeholder="Nombre Enfermedad">
                      </div>

                      <div class="col-lg-3 p-2">
                      <label for="fechventa">¿Requiere Tratamiento?</label>
                      <select class="form-control form-control-sm" name="EnfTratamiento">
                            <option>¿Tratamiento?</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Duración(Meses)</label>
                      <input type="text" name= "EnfMeses_trata" class="form-control" placeholder="Meses Tratamiento">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Duración(Días)</label>
                      <input type="text" name= "EnfDias_trata" class="form-control" placeholder="Días Tratamiento">
                      </div>

                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Tiempo Transcurrido(Días)</label>
                      <input type="text" name= "EnfDias_transc" class="form-control" placeholder="Días Transcurridos">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Tiempo Restante(Días)</label>
                      <input type="text" name= "EnfDias_rest" class="form-control" placeholder="Días Restantes">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">¿Ganado Muerto?</label>
                      <select class="form-control form-control-sm" name="EnfMuerto">
                            <option>¿Muerto?</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-6 p-2">
                      <label for="fechventa">Descripción de la Enfermedad</label>
                        <textarea name="EnfDescripcion" id="" placeholder="Descripción Enfermedad" cols="70" rows="3"></textarea>
                      </div>
                      <div class="col-lg-6 p-2">
                      <label for="fechventa">Descripción de el Tratamiento</label>
                        <textarea name="EnfDesc_tratamiento" id="" placeholder="Descripción Tratamiento" cols="70" rows="3"></textarea>
                      </div>

                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id="enfermedades" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Tratamiento</th>
                            <th scope="col">Des.Tratamiento</th>
                            <th scope="col">Meses.Trat</th>
                            <th scope="col">Días.Trat</th>
                            <th scope="col">Días.Trans</th>
                            <th scope="col">Días.Rest</th>
                            <th scope="col">¿Muerto?</th>
                            <th scope="col">Fecha.Actual</th>
                            <th scope="col">Editar</th>
                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $enfermedad): 
                            $contador += 1;
                            $Codienf = $enfermedad['EnfCod_enfermedad'];
                            $Nombenf = $enfermedad['EnfNombre'];
                            $Descenf = $enfermedad['EnfDescripcion'];
                            $Trataen = $enfermedad['EnfTratamiento'];
                            $Destrat = $enfermedad['EnfDesc_tratamiento'];
                            $mestrat = $enfermedad['EnfMeses_trata'];
                            $diatrat = $enfermedad['EnfDias_trata'];
                            $diatran = $enfermedad['EnfDias_transc'];
                            $diarest = $enfermedad['EnfDias_rest'];
                            $muerenf = $enfermedad['EnfMuerto'];
                            $fechact = $enfermedad['EnfFecha_actual'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $Nombenf; ?></td>
                              <td><?php echo $Descenf; ?></td>
                              <td><?php echo $Trataen; ?></td>
                              <td><?php echo $Destrat; ?></td>
                              <td><?php echo $mestrat; ?></td>
                              <td><?php echo $diatrat; ?></td>
                              <td><?php echo $diatran; ?></td>
                              <td><?php echo $diarest; ?></td>
                              <td><?php echo $muerenf; ?></td>
                              <td><?php echo $fechact; ?></td>
                              <td><button type="button" class="btn btn-info mt-1 mb-1" data-toggle="modal" data-target="#modenf" 
                              data-ecod="<?php echo $Codienf; ?>" data-enom="<?php echo $Nombenf; ?>"
                              data-edes="<?php echo $Descenf; ?>" data-etrt="<?php echo $Trataen; ?>" data-edtr="<?php echo $Destrat;?>"
                              data-emtr="<?php echo $mestrat; ?>" data-ditr="<?php echo $diatrat; ?>" data-edit="<?php echo $diatran; ?>"
                              data-edre="<?php echo $diarest; ?>" data-emue="<?php echo $muerenf; ?>" data-efac="<?php echo $fechact; ?>" >Editar</button></td>
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="modenf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar Enfermedad</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="enfermedades.php">
                                <input type="hidden" id="ecod" name="Codienf" >
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Nombre de la Enfermedad</label>
                                  <input type="text" id = "enom" name = "nombre_enfermedad" class="form-control" placeholder="Nombre Enfermedad">
                                  </div>

                                  <div class="col-lg p-2">
                                  <label for="fechventa">¿Requiere Tratamiento?</label>
                                  <select class="form-control form-control-sm" id ="etrt" name = "tratamiento">
                                        <option>¿Tratamiento?</option>
                                        <option>SI</option>
                                        <option>NO</option>
                                  </select>
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Duración Tratamiento(Meses)</label>
                                  <input type="text" id = "emtr" name = "meses_tratamiento" class="form-control" placeholder="Meses Tratamiento">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Duración Tratamiento(Días)</label>
                                  <input type="text" id = "ditr" name = "dias_tratamiento" class="form-control" placeholder="Días Tratamiento">
                                  </div>

                                  <div class="col-lg p-2">
                                  <label for="fechventa">Tiempo Transcurrido(Días)</label>
                                  <input type="text" id = "edit" name = "dias_transcurridos" class="form-control" placeholder="Días Transcurridos">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Tiempo Restante(Días)</label>
                                  <input type="text" id = "edre" name = "dias_restantes" class="form-control" placeholder="Días Restantes">
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">¿Ganado Muerto?</label>
                                  <select class="form-control form-control-sm" id ="emue" name = "muerto">
                                        <option>¿Muerto?</option>
                                        <option>SI</option>
                                        <option>NO</option>
                                  </select>
                                  </div>

                                  <div class="col-lg p-2">
                                  <label for="fechventa">Descripción de la Enfermedad</label>
                                    <textarea id ="edes" name ="desc_enfermedad" placeholder="Descripción Enfermedad" cols="60" rows="3"></textarea>
                                  </div>
                                  <div class="col-lg p-2">
                                  <label for="fechventa">Descripción del tratamiento</label>
                                    <textarea id ="edtr" name ="desc_tratamiento" placeholder="Descripción Tratamiento" cols="60" rows="3"></textarea>
                                  </div>

                                <button type="submit" class="btn btn-success mt-3" name="submit" value="modificar">Modificar Ingreso</button>
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


$('#modenf').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var ecd = button.data('ecod')
          var enm = button.data('enom')
          var eds = button.data('edes')
          var etr = button.data('etrt') 
          var edr = button.data('edtr')
          var emt = button.data('emtr')
          var edi = button.data('ditr')
          var edt = button.data('edit')
          var ede = button.data('edre')
          var emu = button.data('emue')
          var efc = button.data('efac')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('Modificar Enfermedad Cod: ' + ecd +' - ' + enm)
          modal.find('.modal-body #ecod').val(ecd)
          modal.find('.modal-body #enom').val(enm)
          modal.find('.modal-body #edes').val(eds)
          modal.find('.modal-body #etrt').val(etr)
          modal.find('.modal-body #edtr').val(edr)
          modal.find('.modal-body #emtr').val(emt)
          modal.find('.modal-body #ditr').val(edi)
          modal.find('.modal-body #edit').val(edt)
          modal.find('.modal-body #edre').val(ede)
          modal.find('.modal-body #emue').val(emu)
          modal.find('.modal-body #efac').val(efc)
         })
    
            $(document).ready(function() {    
    $('#enfermedades').DataTable({        
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
