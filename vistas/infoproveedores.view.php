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
                              <h1>Listado de Proveedores</h1>
                                    <!-- Inicio Tabla -->
                                    <div class="table-responsive">
                                    <?php if($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Auxiliar'){ ?>
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
                                            </tr>
                                          <?php endforeach; endif; ?>
                                        </tbody>
                                      </table>
                                      <?php } ?>
                                  </div>
                                  
                            </div>
                      </div>
                      <!-- Final de Tabla -->
            </section>
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