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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">    </head>
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
                 <h1>Ingreso Insumos</h1>
                 <?php require 'error.mns.php'; ?>
                 </div>

                  <form method="POST" action="inginsumos.php">
                    <div class="row">
                      <div class="col-lg-1 p-2">
                      <button type="submit" class="btn btn-primary" name = "submit" value = "agregar">Ingresar</button>
                      </div>
                        <div class="form-group p-2">
                          <label for="">Tipo de Insumo</label>
                          <select class="form-control form-control-sm" name = "IngTipo_Insumo_Ingreso">
                          <option>Seleccionar Tipo de Insumo</option>
                          <option>Alimentación</option>
                          <option>Papeleria</option>
                          <option>Medicamento</option>
                          <option>Otros</option>
                          </select>
                        </div>
                      <div class="col-lg-3 p-2">
                      <label for="">Nombre del Insumo</label>
                      <input type="text" name= "IngNombre_ingreso" class="form-control" placeholder="Nombre Insumo">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="">Número de la Factura</label>
                      <input type="text" name= "IngNumero_factura" class="form-control" placeholder="Numero Factura">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="">Cantidad para Ingresar</label>
                      <input type="text" name= "IngCantidad_ingreso" class="form-control" placeholder="Cantidad Ingreso">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="">Valor iva</label>
                      <input type="text" name= "IngValor_iva" class="form-control" placeholder="Valor Iva">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="">Valor Descuento</label>
                      <input type="text" name= "IngValor_descuentos" class="form-control" placeholder="Valor Descuentos">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="">Valor Unitario</label>
                      <input type="text" name= "IngValor_unitario" class="form-control" placeholder="Valor Unitario">
                      </div>
                      <div class="col-lg-2 p-2">
                      <label for="">Valor de la Factura</label>
                      <input type="text" name= "IngValor_factura" class="form-control" placeholder="Valor Factura">
                      </div>
                      <div class="col-lg-2 p-2">
                                <label for="">Fecha de la Factura</label>
                                <input type="date" name= "IngFecha_factura" class="form-control">
                                </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id="ingresos" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Tipo Insumo</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Fecha Factura</th>
                            <th scope="col"># Factura</th>
                            <th scope="col">Cant. Ingreso</th>
                            <th scope="col">Valor Iva</th>
                            <th scope="col">Valor Descuento</th>
                            <th scope="col">Valor Unitario</th>
                            <th scope="col">Valor Factura</th>
                            <th scope="col">Fecha Actual</th>
                            <th scope="col">Usuario Ingreso</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $inginsumos): 
                            $contador += 1;
                            $IngCod = $inginsumos['IngCod_ingreso'];
                            $IngCse = $inginsumos['IngCodSede'];
                            $IngSno = $inginsumos['IngSedNom'];
                            $IngTip = $inginsumos['IngTipo_Insumo_Ingreso'];
                            $IngNom = $inginsumos['IngNombre_ingreso'];
                            $IngFfa = $inginsumos['IngFecha_factura'];
                            $IngNfa = $inginsumos['IngNumero_factura'];
                            $IngCin = $inginsumos['IngCantidad_ingreso'];
                            $IngViv = $inginsumos['IngValor_iva'];
                            $IngVde = $inginsumos['IngValor_descuentos'];
                            $IngVun = $inginsumos['IngValor_unitario'];
                            $IngVfa = $inginsumos['IngValor_factura'];
                            $IngFac = $inginsumos['IngFecha_actual'];
                            $IngUsu = $inginsumos['IngUsuing'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $IngSno; ?></td>
                              <td><?php echo $IngTip; ?></td>
                              <td><?php echo $IngNom; ?></td>
                              <td><?php echo $IngFfa; ?></td>
                              <td><?php echo $IngNfa; ?></td>
                              <td><?php echo $IngCin; ?></td>
                              <td><?php echo $IngViv; ?></td>
                              <td><?php echo $IngVde; ?></td>
                              <td><?php echo $IngVun; ?></td>
                              <td><?php echo $IngVfa; ?></td>
                              <td><?php echo $IngFac; ?></td>
                              <td><?php echo $IngUsu; ?></td>
                              <td><button type="button" class="btn btn-primary mt-1 mb-1" data-toggle="modal" 
                              data-target="#modingins" data-icod="<?php echo $IngCod; ?>" data-itip="<?php echo $IngTip; ?>"
                              data-inom="<?php echo $IngNom; ?>" data-iffa="<?php echo $IngFfa;?>"
                              data-infa="<?php echo $IngNfa; ?>" data-icin="<?php echo $IngCin;?>"
                              data-iviv="<?php echo $IngViv; ?>" data-ivde="<?php echo $IngVde;?>"
                              data-ivun="<?php echo $IngVun; ?>" data-ivfa="<?php echo $IngVfa;?>"
                              data-ifac="<?php echo $IngFac; ?>" data-iuin="<?php echo $IngUsu;?>" >Editar</button></td>                            
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="modingins" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar Ingreso de Insumos</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="inginsumos.php">
                                <input type="hidden" id="icod" name="IngCod" >                                
                                <div class="col-lg p-2">
                                <p class="font-weight-light">Nombre del Insumo</p>
                                <input type="text" id="inom" name= "Nombre_ingreso" class="form-control" placeholder="Nombre Insumo">
                                </div>
                                <div class="col-lg p-2">
                                <p class="font-weight-light">Número de Factura</p>
                                <input type="text" id="infa" name= "Numero_factura" class="form-control" placeholder="Numero Factura">
                                </div>
                                <div class="col-lg p-2">
                                <p class="font-weight-light">Cantidad Ingresada</p>
                                <input type="text" id="icin" name= "Cantidad_ingreso" class="form-control" placeholder="Cantidad Ingreso">
                                </div>
                                <div class="col-lg p-2">
                                <p class="font-weight-light">Valor Iva</p>
                                <input type="text" id="iviv" name= "Valor_iva" class="form-control" placeholder="Valor Iva">
                                </div>
                                <div class="col-lg p-2">
                                <p class="font-weight-light">Valor Descuento</p>
                                <input type="text" id="ivde" name= "Valor_descuentos" class="form-control" placeholder="Valor Descuentos">
                                </div>
                                <div class="col-lg p-2">
                                <p class="font-weight-light">Valor Unitario</p>
                                <input type="text" id="ivun" name= "Valor_unitario" class="form-control" placeholder="Valor Unitario">
                                </div>
                                <div class="col-lg p-2">
                                <p class="font-weight-light">Valor Total Factura</p>
                                <input type="text" id="ivfa" name= "Valor_factura" class="form-control" placeholder="Valor Factura">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3" name="submit" value="modificar">Modificar Ingreso</button>
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


        $('#modingins').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var cod = button.data('icod')
          var nom = button.data('inom')
          var nfa = button.data('infa') 
          var cin = button.data('icin')
          var viv = button.data('iviv')
          var vde = button.data('ivde')
          var vun = button.data('ivun')
          var vfa = button.data('ivfa')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-body #icod').val(cod)
          modal.find('.modal-body #inom').val(nom)
          modal.find('.modal-body #infa').val(nfa)
          modal.find('.modal-body #icin').val(cin)
          modal.find('.modal-body #iviv').val(viv)
          modal.find('.modal-body #ivde').val(vde)
          modal.find('.modal-body #ivun').val(vun)
          modal.find('.modal-body #ivfa').val(vfa)
         })
    
         $(document).ready(function() {    
    $('#ingresos').DataTable({        
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