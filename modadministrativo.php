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
    include ('vistas/modadministrativo.view.php'); 
}else{
    header('Location: index.php');
}}}

 ?>