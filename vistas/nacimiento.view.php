
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
                 <h1>Registro de Nacimiento</h1>
                 <?php require 'error.mns.php'; ?>
                 </div>
                  <form method="POST" action="nacimiento.php">
                    <div class="row">
                      <div class="col-lg-1 p-2">
                      <button type="submit" class="btn btn-success" name="submit" value="agregar">Ingresar</button>
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">Fecha de Nacimiento</label>
                      <input type="date" name= "NacFecha_nacim" class="form-control">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">Nombre Becerro:</label>
                      <input type="text" name= "NacNom_becerro" class="form-control" placeholder="Nombre">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">Nombre Padre:</label>
                      <input type="text" name= "NacNombre_Padre" class="form-control" placeholder="Padre">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">Nombre Madre:</label>
                      <input type="text" name= "NacNombre_Madre" class="form-control" placeholder="Madre">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Cruce Raza:</label>
                      <input type="text" name= "NacCruce_raza" class="form-control" placeholder="Cruce Raza">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">¿Presenta Novedad?:</label>
                      <select class="form-control form-control-sm" name="NacNovedad">
                            <option>Seleccionar</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">¿Vacunado?</label>
                      <select class="form-control form-control-sm" name="NacVacuna">
                            <option>Seleccionar</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">¿Requiere Tratamiento?</label>
                      <select class="form-control form-control-sm" name="NacTratamiento">
                            <option>Seleccionar</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">Duración Tratamiento(Mes)</label>
                      <input type="text" name= "NacTiempo_trat" class="form-control" placeholder="Tiempo Tratamiento">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">¿Presenta Enfermedad?</label>
                      <select class="form-control form-control-sm" name="NacEnfermedad">
                            <option>Seleccionar</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">¿Becerro Nacido Vivo?</label>
                      <select class="form-control form-control-sm" name="NacNacido_vivo">
                            <option>Seleccionar</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">Genero:</label>
                      <select class="form-control form-control-sm" name="NacGenero">
                            <option>Seleccionar</option>
                            <option>Macho</option>
                            <option>Hembra</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="recipient-name" class="col-form-label">Peso(kg):</label>
                      <input type="text" name= "NacPeso" class="form-control" placeholder="Peso">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Raza:</label>
                      <input type="text" name= "NacRaza" class="form-control" placeholder="Raza">
                      </div>
                    </div>
                  </form>

                  <div class="table-responsive">
                    <table id="nacimientos" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                          <th scope="col">Item</th>
                            <th scope="col">Becerro</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Fecha Nacimiento</th>
                            <th scope="col">Padre</th>
                            <th scope="col">Madre</th>
                            <th scope="col">Cruce</th>
                            <th scope="col">Novedad</th>
                            <th scope="col">Vacuna</th>
                            <th scope="col">Tratamiento</th>
                            <th scope="col">Dias Tratamiento</th>
                            <th scope="col">Enfermedad</th>
                            <th scope="col">Nacido Vivo</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Raza</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Fecha Actual</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>
                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $nacimiento): 
                            $contador += 1;
                            $NacCod = $nacimiento['NacCod_becerro'];
                            $NacNom = $nacimiento['NacNom_becerro'];
                            $NacNse = $nacimiento['NacNsede'];
                            $NacFna = $nacimiento['NacFecha_nacim'];
                            $NacNop = $nacimiento['NacNombre_Padre'];
                            $NacNma = $nacimiento['NacNombre_Madre'];
                            $NacCru = $nacimiento['NacCruce_raza'];
                            $NacNov = $nacimiento['NacNovedad'];
                            $NacVac = $nacimiento['NacVacuna'];
                            $NacTra = $nacimiento['NacTratamiento'];
                            $NacTie = $nacimiento['NacTiempo_trat'];
                            $NacEnf = $nacimiento['NacEnfermedad'];
                            $NacNac = $nacimiento['NacNacido_vivo'];
                            $NacGen = $nacimiento['NacGenero'];
                            $NacPes = $nacimiento['NacPeso'];
                            $NacRaz = $nacimiento['NacRaza'];
                            $NacUsu = $nacimiento['NacUsuario'];
                            $NacFac = $nacimiento['NacFecha_actual'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $NacNom; ?></td>
                              <td><?php echo $NacNse; ?></td>
                              <td><?php echo $NacFna; ?></td>
                              <td><?php echo $NacNop; ?></td>
                              <td><?php echo $NacNma; ?></td>
                              <td><?php echo $NacCru; ?></td>
                              <td><?php echo $NacNov; ?></td>
                              <td><?php echo $NacVac; ?></td>
                              <td><?php echo $NacTra; ?></td>
                              <td><?php echo $NacTie; ?></td>
                              <td><?php echo $NacEnf; ?></td>
                              <td><?php echo $NacNac; ?></td>
                              <td><?php echo $NacGen; ?></td>
                              <td><?php echo $NacPes; ?></td>
                              <td><?php echo $NacRaz; ?></td>
                              <td><?php echo $NacUsu; ?></td>
                              <td><?php echo $NacFac; ?></td>
                              <td><button type="button" class="btn btn-info mt-1 mb-1" data-toggle="modal" 
                              data-target="#modnaci" data-Ncod="<?php echo $NacCod; ?>"
                              data-nnom="<?php echo $NacNom; ?>" data-nsed="<?php echo $NacNse;?>"
                              data-nfna="<?php echo $NacFna; ?>" data-nnop="<?php echo $NacNop;?>"
                              data-nnma="<?php echo $NacNma; ?>" data-ncru="<?php echo $NacCru;?>"
                              data-nnov="<?php echo $NacNov; ?>" data-nvac="<?php echo $NacVac;?>"
                              data-ntra="<?php echo $NacTra; ?>" data-ntie="<?php echo $NacTie;?>"
                              data-nenf="<?php echo $NacEnf; ?>" data-nnac="<?php echo $NacNac;?>"
                              data-namh="<?php echo $NacGen; ?>" data-npes="<?php echo $NacPes;?>"
                              data-nraz="<?php echo $NacRaz; ?>" data-nfac="<?php echo $NacFac;?>" >Editar</button></td>
                              <td><button type="button" class="btn btn-danger mt-1 mb-1" data-toggle="modal" 
                              data-target="#elinac" data-ecod="<?php echo $NacCod; ?>" data-enom="<?php echo $NacNom;?>" >Eliminar</button>
                              </td>                            
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="modnaci" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar Salida de Insumos</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="nacimiento.php">
                                <input type="hidden" id="ncod" name="NacCod" >
                                <div class="col-lg p-2">
                                <label for="fechventa">Fecha de Nacimiento</label>
                                <input type="date" id="nfna" name= "Fecha_nacim" class="form-control">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Nombre Becerro:</label>
                                <input type="text" id="nnom" name= "Nom_becerro" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Nombre Padre:</label>
                                <input type="text" id="nnop" name= "Nombre_Padre" class="form-control" placeholder="Padre">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Nombre Madre:</label>
                                <input type="text" id="nnma" name= "Nombre_Madre" class="form-control" placeholder="Madre">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Cruce Raza:</label>
                                <input type="text" id="ncru" name= "Cruce_raza" class="form-control" placeholder="Cruce Raza">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Novedad:</label>
                                <select class="form-control form-control-sm" id="nnov" name="Novedad">
                                      <option>SI</option>
                                      <option>NO</option>
                                </select>
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Vacuna:</label>
                                <select class="form-control form-control-sm" id="nvac" name="Vacuna">
                                      <option>SI</option>
                                      <option>NO</option>
                                </select>
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Tratamiento</label>
                                <select class="form-control form-control-sm" id="ntra" name="Tratamiento">
                                      <option>SI</option>
                                      <option>NO</option>
                                </select>
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Duración del Tratamiento (Meses)</label>
                                <input type="text" id="ntie" name= "Tiempo_trat" class="form-control" placeholder="Tiempo Tratamiento">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Enfermedad</label>
                                <select class="form-control form-control-sm" id="nenf" name="Enfermedad">
                                      <option>SI</option>
                                      <option>NO</option>
                                </select>
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Becerro Nacido Vivo</label>
                                <select class="form-control form-control-sm" id="nnac" name="Nacido_vivo">
                                      <option>SI</option>
                                      <option>NO</option>
                                </select>
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Peso</label>
                                <input type="text" id="npes" name= "Peso" class="form-control" placeholder="Peso">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Raza</label>
                                <input type="text" id="nraz" name= "Raza" class="form-control" placeholder="Raza">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3" name="submit" value="modificar">Modificar Nacimiento</button>
                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cerrar</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="elinac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xs">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Eliminar Nacimiento</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="nacimiento.php">
                                      <input type="hidden" id="ecod" name="NacCod">
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

        $('#modnaci').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var cod = button.data('ncod')
          var fna = button.data('nfna')
          var nom = button.data('nnom')
          var sed = button.data('nsed') 
          var nop = button.data('nnop')
          var nma = button.data('nnma')
          var cru = button.data('ncru')
          var nov = button.data('nnov')
          var vac = button.data('nvac') 
          var tra = button.data('ntra')
          var tie = button.data('ntie')
          var enf = button.data('nenf')
          var nac = button.data('nnac') 
          var pes = button.data('npes')
          var raz = button.data('nraz')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-body #ncod').val(cod)
          modal.find('.modal-body #nfna').val(fna)
          modal.find('.modal-body #nnom').val(nom)
          modal.find('.modal-body #nsed').val(sed)
          modal.find('.modal-body #nnop').val(nop)
          modal.find('.modal-body #nnma').val(nma)
          modal.find('.modal-body #ncru').val(cru)
          modal.find('.modal-body #nnov').val(nov)
          modal.find('.modal-body #nvac').val(vac)
          modal.find('.modal-body #ntra').val(tra)
          modal.find('.modal-body #ntie').val(tie)
          modal.find('.modal-body #nenf').val(enf)
          modal.find('.modal-body #nnac').val(nac)
          modal.find('.modal-body #npes').val(pes)
          modal.find('.modal-body #nraz').val(raz)
         })
         $('#elinac').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var eco = button.data('ecod')
            var eno = button.data('enom')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar Becerro ' + eno)
            modal.find('.modal-body #ecod').val(eco)
            })
            $(document).ready(function() {    
    $('#nacimientos').DataTable({        
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