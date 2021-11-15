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
    $NovCod_sede1 = $_SESSION['cod'];
    $NovSed_ganado1 = $_SESSION['sed'];
    $NovUsu_repnovedad1 = $_SESSION['usu'];
    if($_SESSION['rol'] == 'Auxiliar'){
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'agregar':
                $NovCod_sede = $NovCod_sede1;
                $NovSed_ganado = $NovSed_ganado1;
                $NovUsu_repnovedad = $NovUsu_repnovedad1;
                $NovDescr_novedad = $_POST['NovDescr_novedad'];
                $NovFecha_novedad = $_POST['NovFecha_novedad'];

                $NovCod_sede = $controlador->limpiarDatos($NovCod_sede);
                $NovSed_ganado = $controlador->limpiarDatos($NovSed_ganado);
                $NovUsu_repnovedad = $controlador->limpiarDatos($NovUsu_repnovedad);
                $NovDescr_novedad = $controlador->limpiarDatos($NovDescr_novedad);
                $NovFecha_novedad = $controlador->limpiarDatos($NovFecha_novedad);

                $resultado = $controlador->agregarnovedad('',$NovCod_sede,$NovSed_ganado,$NovUsu_repnovedad,$NovDescr_novedad,$NovFecha_novedad,'');
                if($resultado == true){
                    $mensaje = 'Novedad Agregada Correctamente';
                }else{
                    $errores = 'Error al Agregar Novedad, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                
                $NovCod_novedad = $_POST['Novecod'];
                $NovCod_sede = $NovCod_sede1;
                $NovSed_ganado = $NovSed_ganado1;
                $NovUsu_repnovedad = $NovUsu_repnovedad1;
                $NovDescr_novedad = $_POST['Descr_novedad'];
                $NovFecha_novedad = $_POST['Fecha_novedad'];

                $NovCod_novedad = $controlador->limpiarDatos($NovCod_novedad);
                $NovCod_sede = $controlador->limpiarDatos($NovCod_sede);
                $NovSed_ganado = $controlador->limpiarDatos($NovSed_ganado);
                $NovUsu_repnovedad = $controlador->limpiarDatos($NovUsu_repnovedad);
                $NovDescr_novedad = $controlador->limpiarDatos($NovDescr_novedad);
                $NovFecha_novedad = $controlador->limpiarDatos($NovFecha_novedad);

                $resultado = $controlador->modificarnovedades($NovCod_novedad,$NovCod_sede,$NovSed_ganado,$NovUsu_repnovedad,
                $NovDescr_novedad,$NovFecha_novedad,'');
                if($resultado == true){
                    $mensaje = 'Novedad Modificada Correctamente';
                }else{
                    $errores = 'Error al Modificar la Novedad, Intentelo Nuevamente';
                }            break;
        }
    }

    $resultado = $controlador->consultarnovedad();
    include ('vistas/novedades.view.php');
}else{
    header('Location: index.php');
}}}

?>