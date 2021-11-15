<?php
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
    echo "No se pudo conectar a la basse de datos";
} else {
    session_start();
    $contador = 0;
    $controlador = new Controlador();
    $sesion = $controlador->comprobarsesion();
    if($sesion == false){
        header('Location: login.php');
}else{
    $variable = $controlador->variablesesion();
    $GanCod_sede1 = $_SESSION['cod'];
    $GanSed_ganado1 = $_SESSION['sed'];
    $GanCod_usuario1 = $_SESSION['usu'];
    if($_SESSION['rol'] == 'Auxiliar'){
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'agregar':
                $GanCod_sede = $GanCod_sede1;
                $GanSed_ganado = $GanSed_ganado1;
                $GanCod_usuario = $GanCod_usuario1;
                $GanNombre = $_POST['GanNombre'];
                $GanColor = $_POST['GanColor'];
                $GanRaza = $_POST['GanRaza'];
                $GanClasificacion = $_POST['GanClasificacion'];
                $GanGenero = $_POST['GanGenero'];
                $GanPeso = $_POST['GanPeso'];
                $GanPais_origen = $_POST['GanPais_origen'];
                $GanNovedad = $_POST['GanNovedad'];
                $GanTraslado = $_POST['GanTraslado'];
                $GanVacuna = $_POST['GanVacuna'];
                $GanEnfermedad = $_POST['GanEnfermedad'];
                $GanTratamiento = $_POST['GanTratamiento'];
                $GanDias_trata = $_POST['GanDias_trata'];
                $GanPrecio_comp = $_POST['GanPrecio_comp'];
                $GanPrenez = $_POST['GanPrenez'];
                $GanDias_pren = $_POST['GanDias_pren'];
                $GanFecha_compra = $_POST['GanFecha_compra'];
                $GanFecha_venta = $_POST['GanFecha_venta'];
                $GanPrecio_venta = $_POST['GanPrecio_venta'];



                $GanCod_sede = $controlador->limpiarDatos($GanCod_sede);
                $GanSed_ganado = $controlador->limpiarDatos($GanSed_ganado);
                $GanCod_usuario = $controlador->limpiarDatos($GanCod_usuario);
                $GanNombre = $controlador->limpiarDatos($GanNombre);
                $GanColor = $controlador->limpiarDatos($GanColor);
                $GanRaza = $controlador->limpiarDatos($GanRaza);
                $GanClasificacion = $controlador->limpiarDatos($GanClasificacion);
                $GanGenero = $controlador->limpiarDatos($GanGenero);
                $GanPeso = $controlador->limpiarDatos($GanPeso);
                $GanPais_origen = $controlador->limpiarDatos($GanPais_origen);
                $GanNovedad = $controlador->limpiarDatos($GanNovedad);
                $GanTraslado = $controlador->limpiarDatos($GanTraslado);
                $GanVacuna = $controlador->limpiarDatos($GanVacuna);
                $GanEnfermedad = $controlador->limpiarDatos($GanEnfermedad);
                $GanTratamiento = $controlador->limpiarDatos($GanTratamiento);
                $GanDias_trata = $controlador->limpiarDatos($GanDias_trata);
                $GanPrecio_comp = $controlador->limpiarDatos($GanPrecio_comp);
                $GanPrenez = $controlador->limpiarDatos($GanPrenez);
                $GanDias_pren = $controlador->limpiarDatos($GanDias_pren);
                $GanFecha_compra = $controlador->limpiarDatos($GanFecha_compra);
                $GanFecha_venta = $controlador->limpiarDatos($GanFecha_venta);
                $GanPrecio_venta = $controlador->limpiarDatos($GanPrecio_venta);

                $resultado = $controlador->agregarNuevoGanado('',$GanCod_sede,$GanSed_ganado,$GanCod_usuario,$GanNombre,$GanColor,
                $GanRaza,$GanClasificacion,$GanGenero,$GanPeso,$GanPais_origen,$GanNovedad,$GanTraslado,
                $GanVacuna,$GanEnfermedad,$GanTratamiento,$GanDias_trata,$GanPrecio_comp,$GanPrenez,
                $GanDias_pren,$GanFecha_compra,$GanFecha_venta,$GanPrecio_venta,'');
                if($resultado == true){
                    $mensaje = 'Ganado Agregado Correctamente';
                }else{
                    $errores = 'Error al Agregar Ganado, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                $GanCod_ganado = $_POST['GaCodg'];
                $GanNombre = $_POST['GNombre'];
                $GanColor = $_POST['GColor'];
                $GanRaza = $_POST['GRaza'];
                $GanPeso = $_POST['GPeso'];
                $GanPais_origen = $_POST['GPorigen'];
                $GanNovedad = $_POST['GNovedad'];
                $GanTraslado = $_POST['GTraslado'];
                $GanVacuna = $_POST['GVacuna'];
                $GanEnfermedad = $_POST['GEnfermedad'];
                $GanTratamiento = $_POST['GTratamiento'];
                $GanDias_trata = $_POST['GDtrata'];
                $GanPrecio_comp = $_POST['GPcomp'];
                $GanPrenez = $_POST['GPrenez'];
                $GanDias_pren = $_POST['GDpren'];
                $GanFecha_compra = $_POST['GFcompra'];
                $GanFecha_venta = $_POST['GFventa'];
                $GanPrecio_venta = $_POST['GPventa'];


                $GanCod_ganado = $controlador->limpiarDatos($GanCod_ganado);
                $GanNombre = $controlador->limpiarDatos($GanNombre);
                $GanColor = $controlador->limpiarDatos($GanColor);
                $GanRaza = $controlador->limpiarDatos($GanRaza);
                $GanPeso = $controlador->limpiarDatos($GanPeso);
                $GanPais_origen = $controlador->limpiarDatos($GanPais_origen);
                $GanNovedad = $controlador->limpiarDatos($GanNovedad);
                $GanTraslado = $controlador->limpiarDatos($GanTraslado);
                $GanVacuna = $controlador->limpiarDatos($GanVacuna);
                $GanEnfermedad = $controlador->limpiarDatos($GanEnfermedad);
                $GanTratamiento = $controlador->limpiarDatos($GanTratamiento);
                $GanDias_trata = $controlador->limpiarDatos($GanDias_trata);
                $GanPrecio_comp = $controlador->limpiarDatos($GanPrecio_comp);
                $GanPrenez = $controlador->limpiarDatos($GanPrenez);
                $GanDias_pren = $controlador->limpiarDatos($GanDias_pren);
                $GanFecha_compra = $controlador->limpiarDatos($GanFecha_compra);
                $GanFecha_venta = $controlador->limpiarDatos($GanFecha_venta);
                $GanPrecio_venta = $controlador->limpiarDatos($GanPrecio_venta);

                $resultado = $controlador->ModificarGanado($GanCod_ganado,'','','',$GanNombre,$GanColor,
                $GanRaza,'','',$GanPeso,$GanPais_origen,$GanNovedad,$GanTraslado,
                $GanVacuna,$GanEnfermedad,$GanTratamiento,$GanDias_trata,$GanPrecio_comp,$GanPrenez,
                $GanDias_pren,$GanFecha_compra,$GanFecha_venta,$GanPrecio_venta,'');
                if($resultado == true){
                    $mensaje = 'Registro de Ganado Modificado  Correctamente';
                }else{
                    $errores = 'Error al Modificar el Registro de Ganado, Intentelo Nuevamente';
                }

            break;

            
            case 'eliminar':
                $GanCod_ganado = $_POST['GaCodg'];
                $resultado = $controlador->eliminarganado($GanCod_ganado);
                if($resultado == true){
                    $mensaje = 'Se ha Eliminado el Ganado Correctamente';
                }else{
                    $errores = 'Error al Eliminar el Ganado, Intentelo Nuevamente';
                }
            break;
        }
    }

    $resultado = $controlador->consultarganado();
    $resultado_usu = $controlador->consultarusuarios();
    include ('vistas/regisganado.view.php');
}else{
    header('Location: index.php');
}}}
?>