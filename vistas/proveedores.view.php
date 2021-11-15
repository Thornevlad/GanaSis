<?php if($sesion == false){
        header('Location: ../login.php');
    }else{ ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Bovisoft - Proveedores</title>
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
                 <h1>Ingreso Proveedores</h1>
                 <?php require 'error.mns.php'; ?>
                 </div>

                  <form method="POST" action="proveedores.php">
                    <div class="row">
                      <div class="col-lg-1 p-2">
                      <button type="submit" class="btn btn-primary" name="submit" value="agregar">Ingresar</button>
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Nombre Proveedor:</label>
                      <input type="text" name= "ProNombre_prov" class="form-control" placeholder="Nombre">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Direccion:</label>
                      <input type="text" name= "ProDireccion_prov" class="form-control" placeholder="Direccion">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Telefono:</label>
                      <input type="text" name= "ProTelefono_prov" class="form-control" placeholder="Telefono">
                      </div>
                      <div class="col-lg-2 p-2 form-group">
                        <label for="recipient-name" class="col-form-label">Tipo de Insumo:</label>
                        <select class="form-control form-control-sm" name="ProTipo_insumo">
                           <?php foreach($resultado_tip as $tip):?> 
                             <option value="<?php echo $tip['tins_Nombre']; ?>"><?php echo $tip['tins_ID'].' - '.$tip['tins_Nombre']; ?></option>
                           <?php endforeach;?>
                          </select>
                        </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Ciudad:</label>
                      <input type="text" name= "ProCiudad_prov" class="form-control" placeholder="Ciudad">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Pais:</label>
                      <input type="text" name= "ProPais" class="form-control" placeholder="Pais">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Correo Electronico:</label>
                      <input type="text" name= "ProvCorreo_prov" class="form-control" placeholder="Correo Electronico">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Website:</label>
                      <input type="text" name= "ProWeb_website" class="form-control" placeholder="Website">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Facebook:</label>
                      <input type="text" name= "ProRed_facebook" class="form-control" placeholder="Facebook">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Twitter:</label>
                      <input type="text" name= "ProRed_twitter" class="form-control" placeholder="Twitter">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Instagram:</label>
                      <input type="text" name= "ProRed_instragram" class="form-control" placeholder="Instagram">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="recipient-name" class="col-form-label">Cedula - Nit:</label>
                      <input type="text" name= "ProCedulaNIT" class="form-control" placeholder="Cedula - NIT">
                      </div>
                      <div class="col-lg-2 p-2 form-group">
                      <label for="recipient-name" class="col-form-label">¿Linea de Credito?:</label>
                         <select class="form-control form-control-sm" name="ProCre_lineacredito">
                          <option>¿Credito?</option>
                          <option>SI</option>
                          <option>NO</option>
                         </select>
                        </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id ="proveedores" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Pais</th>
                            <th scope="col">Correo</th>
                            <th scope="col">WebSite</th>
                            <th scope="col">Facebook</th>
                            <th scope="col">Twitter</th>
                            <th scope="col">Instagram</th>
                            <th scope="col">Tipo Insumo</th>
                            <th scope="col">Identificacion</th>
                            <th scope="col">Linea Crédito</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $proveedor): 
                            $contador += 1;
                            $Pcod = $proveedor['ProCod_proveedor'];
                            $Pnom = $proveedor['ProNombre_prov'];
                            $Pdir = $proveedor['ProDireccion_prov'];
                            $Ptel = $proveedor['ProTelefono_prov'];
                            $Pciu = $proveedor['ProCiudad_prov'];
                            $Ppai = $proveedor['ProPais'];
                            $Pcor = $proveedor['ProvCorreo_prov'];
                            $Pweb = $proveedor['ProWeb_website'];
                            $Pfac = $proveedor['ProRed_facebook'];
                            $Ptwi = $proveedor['ProRed_twitter'];
                            $Pins = $proveedor['ProRed_instragram'];
                            $Ptin = $proveedor['ProTipo_insumo'];
                            $Pnit = $proveedor['ProCedulaNIT'];
                            $Pcre = $proveedor['ProCre_lineacredito'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $Pnom; ?></td>
                              <td><?php echo $Pdir; ?></td>
                              <td><?php echo $Ptel; ?></td>
                              <td><?php echo $Pciu; ?></td>
                              <td><?php echo $Ppai; ?></td>
                              <td><?php echo $Pcor; ?></td>
                              <td><?php echo $Pweb; ?></td>
                              <td><?php echo $Pfac; ?></td>
                              <td><?php echo $Ptwi; ?></td>
                              <td><?php echo $Pins; ?></td>
                              <td><?php echo $Ptin; ?></td>
                              <td><?php echo $Pnit; ?></td>
                              <td><?php echo $Pcre; ?></td>
                              <td><button type="button" class="btn btn-primary mt-1 mb-1" data-toggle="modal" 
                              data-target="#modprov" data-pco="<?php echo $Pcod; ?>"
                              data-pno="<?php echo $Pnom; ?>" data-pdi="<?php echo $Pdir;?>"
                              data-pte="<?php echo $Ptel; ?>" data-pci="<?php echo $Pciu;?>"
                              data-ppa="<?php echo $Ppai; ?>" data-prr="<?php echo $Pcor;?>"
                              data-pwe="<?php echo $Pweb; ?>" data-pfa="<?php echo $Pfac;?>"
                              data-ptw="<?php echo $Ptwi; ?>" data-pin="<?php echo $Pins;?>"
                              data-pti="<?php echo $Ptin; ?>" data-pni="<?php echo $Pnit;?>"
                              data-pcr="<?php echo $Pcre; ?>" >Editar</button></td>                            
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="modprov" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar Salida de Insumos</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="proveedores.php">
                                <input type="hidden" id="pco" name="Pcod" >
                                <div class="col-lg p-2 form-group">
                                <label for="recipient-name" class="col-form-label">Tipo de Insumo:</label>
                                <select class="form-control form-control-sm" name="insumoprov">
                                  <?php foreach($resultado_tip as $tip):?> 
                                    <option value="<?php echo $tip['tins_Nombre']; ?>"><?php echo $tip['tins_ID'].' - '.$tip['tins_Nombre']; ?></option>
                                  <?php endforeach;?>
                                  </select>
                                </div>
                                <div class="col-lg p-2 form-group">
                                <label for="recipient-name" class="col-form-label">¿Ofrece Credito?:</label>
                                    <select class="form-control form-control-sm" id="pcr" name="creditoprov">
                                      <option>¿Credito?</option>
                                      <option>SI</option>
                                      <option>NO</option>
                                    </select>
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Cedula - Nit:</label>
                                <input type="text" id="pni" name= "Cedulaprov" class="form-control" placeholder="Cedula - NIT">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Nombre Proveedor:</label>
                                <input type="text" id="pno" name= "Nombreprov" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Direccion:</label>
                                <input type="text" id="pdi" name= "Direccionprov" class="form-control" placeholder="Direccion">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Telefono:</label>
                                <input type="text" id="pte" name= "Telefonoprov" class="form-control" placeholder="Telefono">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Ciudad:</label>
                                <input type="text" id="pci" name= "Ciudadprov" class="form-control" placeholder="Ciudad">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Pais:</label>
                                <input type="text" id="ppa" name= "Paisprov" class="form-control" placeholder="Pais">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Correo Electronico:</label>
                                <input type="text" id="prr" name= "Correoprov" class="form-control" placeholder="Correo Electronico">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Website:</label>
                                <input type="text" id="pwe" name= "Webprov" class="form-control" placeholder="Website">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Facebook:</label>
                                <input type="text" id="pfa" name= "facebookprov" class="form-control" placeholder="Facebook">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Twitter:</label>
                                <input type="text" id="ptw" name= "twitterprov" class="form-control" placeholder="Twitter">
                                </div>
                                <div class="col-lg p-2">
                                <label for="recipient-name" class="col-form-label">Instagram:</label>
                                <input type="text" id="pin" name= "instragramprov" class="form-control" placeholder="Instagram">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3" name="submit" value="modificar">Modificar Proveedor</button>
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

        $('#modprov').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var pra = button.data('pco')
          var prb = button.data('pno')
          var prc = button.data('pdi')
          var prd = button.data('pte') 
          var pre = button.data('pci')
          var prf = button.data('ppa')
          var ppg = button.data('prr')
          var prh = button.data('pwe') 
          var pri = button.data('pfa')
          var prj = button.data('ptw')
          var prk = button.data('pin')
          var prl = button.data('pti') 
          var prm = button.data('pni')
          var prn = button.data('pcr')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-body #pco').val(pra)
          modal.find('.modal-body #pno').val(prb)
          modal.find('.modal-body #pdi').val(prc)
          modal.find('.modal-body #pte').val(prd)
          modal.find('.modal-body #pci').val(pre)
          modal.find('.modal-body #ppa').val(prf)
          modal.find('.modal-body #prr').val(ppg)
          modal.find('.modal-body #pwe').val(prh)
          modal.find('.modal-body #pfa').val(pri)
          modal.find('.modal-body #ptw').val(prj)
          modal.find('.modal-body #pin').val(prk)
          modal.find('.modal-body #pti').val(prl)
          modal.find('.modal-body #pni').val(prm)
          modal.find('.modal-body #pcr').val(prn)
         })

    
         $(document).ready(function() {    
    $('#proveedores').DataTable({        
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