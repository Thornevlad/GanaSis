

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
                 <h1>Registro de Ganado</h1>
                 <?php require 'error.mns.php'; ?>
                 </div>

                  <form method="POST" action="regisganado.php">
                    <div class="row">
                      <div class="col-lg-1 p-2">
                      <button type="submit" class="btn btn-primary" name="submit" value="agregar">Ingresar</button>
                      </div>                      
                      <div class="col-lg-3 p-2">
                      <input type="text" name= "GanNombre" class="form-control" placeholder="Nombre">
                      </div>
                      <div class="col-lg-3 p-2">
                      <input type="text" name= "GanColor" class="form-control" placeholder="Color">
                      </div>
                      <div class="col-lg-3 p-2">
                      <input type="text" name= "GanRaza" class="form-control" placeholder="Raza">
                      </div>
                      <div class="col-lg-3 p-2">
                      <select class="form-control form-control-sm" name="GanClasificacion">
                            <option>Seleccionar Clasificación</option>
                            <option>Exhibición</option>
                            <option>Venta</option>
                      </select>
                      </div>
                      <div class="col-lg-1 p-2">
                      <input type="text" name= "GanPeso" class="form-control" placeholder="Peso">
                      </div>
                      <div class="col-lg-2 p-2">
                      <input type="text" name= "GanPais_origen" class="form-control" placeholder="Pais de origen">
                      </div>
                      <div class="col-lg-3 p-2">
                      <select class="form-control form-control-sm" name="GanGenero">
                            <option>Seleccionar Genero</option>
                            <option>Hembra</option>
                            <option>Macho</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <select class="form-control form-control-sm" name="GanNovedad">
                            <option>¿Novedad?</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <select class="form-control form-control-sm" name="GanTraslado">
                            <option>¿Traslado?</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <select class="form-control form-control-sm" name="GanTratamiento">
                            <option>¿Tratamiento?</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-3 p-2">
                      <input type="text" name= "GanDias_trata" class="form-control" placeholder="Días de Tratamiento">
                      </div>
                      <div class="col-lg-2 p-2">
                      <select class="form-control form-control-sm" name="GanPrenez">
                            <option>Preñez</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-3 p-2">
                      <input type="text" name= "GanDias_pren" class="form-control" placeholder="Días Preñez">
                      </div>
                      <div class="col-lg-2 p-2">
                      <select class="form-control form-control-sm" name="GanVacuna">
                            <option>¿Vacuna?</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-2 p-2">
                      <select class="form-control form-control-sm" name="GanEnfermedad">
                            <option>¿Enfermedad?</option>
                            <option>SI</option>
                            <option>NO</option>
                      </select>
                      </div>
                      <div class="col-lg-3 p-2">
                      <input type="text" name= "GanPrecio_comp" class="form-control" placeholder="Precio de Compra">
                      </div>
                      <div class="col-lg-3 p-2">
                      <input type="text" name= "GanPrecio_venta" class="form-control" placeholder="Precio de Venta">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechcompra">Fecha de Compra</label>
                      <input type="date" name= "GanFecha_compra" class="form-control">
                      </div>
                      <div class="col-lg-3 p-2">
                      <label for="fechventa">Fecha de Venta</label>
                      <input type="date" name= "GanFecha_venta" class="form-control">
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id="ganado" class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Ganado</th>
                            <th scope="col">Color</th>
                            <th scope="col">Raza</th>
                            <th scope="col">Clasificación</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Origen</th>
                            <th scope="col">¿Novedad?</th>
                            <th scope="col">¿Traslado?</th>
                            <th scope="col">¿Vacunación?</th>
                            <th scope="col">¿Enfermedad?</th>
                            <th scope="col">¿Tratamiento?</th>
                            <th scope="col"># Días</th>
                            <th scope="col">Vlr Compra</th>
                            <th scope="col">¿Preñez?</th>
                            <th scope="col"># Días</th>
                            <th scope="col">Fecha Compra</th>
                            <th scope="col">Fecha Venta</th>
                            <th scope="col">Precio Venta</th>
                            <th scope="col">Fecha Actual</th>
                            <th scope="col">Usuario Ingreso</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                          </tr>
                        </thead>
                        <tbody id="table">
                        <?php 
                          if($resultado): foreach($resultado as $regisgan): 
                            $contador += 1;
                            $GaCodg = $regisgan['GanCod_ganado'];
                            $GaCsed = $regisgan['GanCod_sede'];
                            $GaNsed = $regisgan['GanSed_ganado'];
                            $GaCusu = $regisgan['GanCod_usuario'];
                            $GaNomb = $regisgan['GanNombre'];
                            $GaColo = $regisgan['GanColor'];
                            $GaRaza = $regisgan['GanRaza'];
                            $GaClas = $regisgan['GanClasificacion'];
                            $GaGene = $regisgan['GanGenero'];
                            $GaPeso = $regisgan['GanPeso'];
                            $GaPais = $regisgan['GanPais_origen'];
                            $GaNove = $regisgan['GanNovedad'];
                            $GaTras = $regisgan['GanTraslado'];
                            $GaVacu = $regisgan['GanVacuna'];
                            $GaEnfe = $regisgan['GanEnfermedad'];
                            $GaTrat = $regisgan['GanTratamiento'];
                            $GaDiat = $regisgan['GanDias_trata'];
                            $GaPrec = $regisgan['GanPrecio_comp'];
                            $GaPren = $regisgan['GanPrenez'];
                            $GaDiap = $regisgan['GanDias_pren'];
                            $GaFecc = $regisgan['GanFecha_compra'];
                            $GaFecv = $regisgan['GanFecha_venta'];
                            $GaPrev = $regisgan['GanPrecio_venta'];
                            $GaFeca = $regisgan['GanFecha_actual'];
                            ?>
                            <tr>
                              <th scope="row"><?php echo $contador; ?></th>
                              <td><?php echo $GaNsed; ?></td>
                              <td><?php echo $GaNomb; ?></td>
                              <td><?php echo $GaColo; ?></td>
                              <td><?php echo $GaRaza; ?></td>
                              <td><?php echo $GaClas; ?></td>
                              <td><?php echo $GaGene; ?></td>
                              <td><?php echo $GaPeso; ?></td>
                              <td><?php echo $GaPais; ?></td>
                              <td><?php echo $GaNove; ?></td>
                              <td><?php echo $GaTras; ?></td>
                              <td><?php echo $GaVacu; ?></td>
                              <td><?php echo $GaEnfe; ?></td>
                              <td><?php echo $GaTrat; ?></td>
                              <td><?php echo $GaDiat; ?></td>
                              <td><?php echo $GaPrec; ?></td>
                              <td><?php echo $GaPren; ?></td>
                              <td><?php echo $GaDiap; ?></td>
                              <td><?php echo $GaFecc; ?></td>
                              <td><?php echo $GaFecv; ?></td>
                              <td><?php echo $GaPrev; ?></td>
                              <td><?php echo $GaFeca; ?></td>
                              <td><?php echo $GaCusu; ?></td>
                              <td><button type="button" class="btn btn-primary mt-1 mb-1" data-toggle="modal" 
                              data-target="#modregan" data-gnob="<?php echo $GaNomb; ?>" data-gcod="<?php echo $GaCodg; ?>"
                              data-gcol="<?php echo $GaColo; ?>" data-graz="<?php echo $GaRaza; ?>"
                              data-gklg="<?php echo $GaClas; ?>" data-gmhg="<?php echo $GaGene; ?>"
                              data-gpes="<?php echo $GaPeso; ?>" data-gpai="<?php echo $GaPais; ?>"
                              data-gnov="<?php echo $GaNove; ?>" data-gtrs="<?php echo $GaTras; ?>"
                              data-gvac="<?php echo $GaVacu; ?>" data-genf="<?php echo $GaEnfe; ?>"
                              data-gtra="<?php echo $GaTrat; ?>" data-gdit="<?php echo $GaDiat; ?>"
                              data-gprc="<?php echo $GaPrec; ?>" data-gpre="<?php echo $GaPren; ?>"
                              data-gdip="<?php echo $GaDiap; ?>" data-gfcc="<?php echo $GaFecc; ?>"
                              data-gfev="<?php echo $GaFecv; ?>" data-gprv="<?php echo $GaPrev; ?>"
                              data-gfea="<?php echo $GaFeca; ?>" >Editar</button></td>  
                              <td><button type="button" class="btn btn-danger mt-1 mb-1" data-toggle="modal" data-target="#eligan"
                              data-gcod="<?php echo $GaCodg; ?>" data-gnob="<?php echo $GaNomb; ?>" >Eliminar</button></td>                     
                            </tr>
                          <?php endforeach; endif; ?>
                        </tbody>
                      </table>
                      <div class="modal fade" id="modregan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modificar Registro de Ganado</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="regisganado.php">
                                <input type="hidden" id="gcod" name="GaCodg" >
                                    <div class="col-lg p-2">
                                    <label for="Nomgan">Nombre Ganado</label>
                                    <input type="text" id="gnob" name= "GNombre" class="form-control" placeholder="Nombre">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Color</label>
                                    <input type="text" id="gcol"  name= "GColor" class="form-control" placeholder="Color">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Raza</label>
                                    <input type="text" id="graz" name= "GRaza" class="form-control" placeholder="Raza">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Peso</label>
                                    <input type="text" id="gpes" name= "GPeso" class="form-control" placeholder="Peso">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Origen</label>
                                    <input type="text" id="gpai" name= "GPorigen" class="form-control" placeholder="Pais de origen">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Novedad</label>
                                    <select class="form-control form-control-sm" id="gnov" name="GNovedad">
                                          <option>¿Novedad?</option>
                                          <option>SI</option>
                                          <option>NO</option>
                                    </select>
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Traslado</label>
                                    <select class="form-control form-control-sm" id="gtrs" name="GTraslado">
                                          <option>¿Traslado?</option>
                                          <option>SI</option>
                                          <option>NO</option>
                                    </select>
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Tratamiento</label>
                                    <select class="form-control form-control-sm" id="gtra" name="GTratamiento">
                                          <option>¿Tratamiento?</option>
                                          <option>SI</option>
                                          <option>NO</option>
                                    </select>
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede"># Dias Tratamiento</label>
                                    <input type="text" id="gdit" name= "GDtrata" class="form-control" placeholder="Días de Tratamiento">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Prenez</label>
                                    <select class="form-control form-control-sm" id="gpre" name="GPrenez">
                                          <option>Preñez</option>
                                          <option>SI</option>
                                          <option>NO</option>
                                    </select>
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede"># Diaz prenez</label>
                                    <input type="text" id="gdip" name= "GDpren" class="form-control" placeholder="Días Preñez">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Vacuna</label>
                                    <select class="form-control form-control-sm" id="gvac" name="GVacuna">
                                          <option>¿Vacuna?</option>
                                          <option>SI</option>
                                          <option>NO</option>
                                    </select>
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Enfermedad</label>
                                    <select class="form-control form-control-sm" id="genf" name="GEnfermedad">
                                          <option>¿Enfermedad?</option>
                                          <option>SI</option>
                                          <option>NO</option>
                                    </select>
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Valor Compra</label>
                                    <input type="text" id="gprc" name= "GPcomp" class="form-control" placeholder="Precio de Compra">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="gcodigosede">Valor Venta</label>
                                    <input type="text" id="gprv" name= "GPventa" class="form-control" placeholder="Precio de Venta">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="fechcompra">Fecha de Compra</label>
                                    <input type="date" id="gfcc" name= "GFcompra" class="form-control">
                                    </div>
                                    <div class="col-lg p-2">
                                    <label for="fechventa">Fecha de Venta</label>
                                    <input type="date" id="gfev" name= "GFventa" class="form-control">
                                    </div>
                                <button type="submit" class="btn btn-primary mt-3" name="submit" value="modificar">Modificar Registro</button>
                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cerrar</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="eligan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xs">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="regisganado.php">
                                      <input type="hidden" id="gcod" name="GaCodg">
                                        <div class="modal-body">
                                            <p>Va a Eliminar el Ganado ¿Está Seguro?</p>
                                        </div>
                                        <div class="from-group">
                                            <button type="submit" class="btn btn-danger mt-3" name = "submit" value = "eliminar">Eliminar Ganado</button>
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

        $('#modregan').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var gcd = button.data('gcod') 
          var gng = button.data('gnob') 
          var gcg = button.data('gcol')
          var grg = button.data('graz')
          var gkg = button.data('gklg')
          var gwg = button.data('gpes')
          var gog = button.data('gpai') 
          var ggg = button.data('gmhg')
          var gnv = button.data('gnov')
          var gtg = button.data('gtrs')
          var gag = button.data('gtra')
          var gdt = button.data('gdit') 
          var gpg = button.data('gpre')
          var gdp = button.data('gdip')
          var gvg = button.data('gvac')
          var geg = button.data('genf')
          var gpc = button.data('gprc') 
          var gpv = button.data('gprv')
          var gfc = button.data('gfcc') 
          var gfv = button.data('gfev')
          // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('Modificar Ganado ' + gcd +' - ' + gng)
          modal.find('.modal-body #gcod').val(gcd)
          modal.find('.modal-body #gnob').val(gng)
          modal.find('.modal-body #gcol').val(gcg)
          modal.find('.modal-body #graz').val(grg)
          modal.find('.modal-body #gklg').val(gkg)
          modal.find('.modal-body #gpes').val(gwg)
          modal.find('.modal-body #gpai').val(gog)
          modal.find('.modal-body #gmhg').val(ggg)
          modal.find('.modal-body #gnov').val(gnv)
          modal.find('.modal-body #gtrs').val(gtg)
          modal.find('.modal-body #gtra').val(gag)
          modal.find('.modal-body #gdit').val(gdt)
          modal.find('.modal-body #gpre').val(gpg)
          modal.find('.modal-body #gdip').val(gdp)
          modal.find('.modal-body #gvac').val(gvg)
          modal.find('.modal-body #genf').val(geg)
          modal.find('.modal-body #gprc').val(gpc)
          modal.find('.modal-body #gprv').val(gpv)
          modal.find('.modal-body #gfcc').val(gfc)
          modal.find('.modal-body #gfev').val(gfv)
         })
         $('#eligan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var eco = button.data('gcod')
            var eno = button.data('gnob')
            var modal = $(this)
            modal.find('.modal-title').text('Eliminar cliente ' + eno)
            modal.find('.modal-body #gcod').val(eco)
            })
                
         $(document).ready(function() {    
    $('#ganado').DataTable({        
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
