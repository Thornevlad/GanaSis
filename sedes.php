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
    if($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'MasterBD'){
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'agregar':
                $SedNombre = $_POST['SedNombre'];
                $SedDireccion = $_POST['SedDireccion'];
                $SedCiudad = $_POST['SedCiudad'];
                $SedPais = $_POST['SedPais'];

                $SedNombre = $controlador->limpiarDatos($SedNombre);
                $SedDireccion = $controlador->limpiarDatos($SedDireccion);
                $SedCiudad = $controlador->limpiarDatos($SedCiudad);
                $SedPais = $controlador->limpiarDatos($SedPais);

                $resultado = $controlador->agregarSede('',$SedNombre,$SedDireccion,$SedCiudad,$SedPais);
                if($resultado == true){
                    $mensaje = 'Usuario Agregado Correctamente';
                }else{
                    $errores = 'Error al Agregar Usuario, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                $SedID = $_POST['Seide'];
                $SedNombre = $_POST['Denominacion'];
                $SedDireccion = $_POST['Ubicacion'];
                $SedCiudad = $_POST['municipio'];
                $SedPais = $_POST['paises'];

                $SedID = $controlador->limpiarDatos($SedID);
                $SedNombre = $controlador->limpiarDatos($SedNombre);
                $SedDireccion = $controlador->limpiarDatos($SedDireccion);
                $SedCiudad = $controlador->limpiarDatos($SedCiudad);
                $SedPais = $controlador->limpiarDatos($SedPais);

                $resultado = $controlador->modificarsede($SedID,$SedNombre,$SedDireccion,$SedCiudad,$SedPais);
                if($resultado == true){
                    $mensaje = 'Sede Modificada Correctamente';
                }else{
                    $errores = 'Error al Modificar Sede, Intentelo Nuevamente';
                }
            break;
        }
    }

    $resultado = $controlador->consultarsede();
    include "vistas/sedes.view.php";
}else{
    header('Location: index.php');
}}}
?>