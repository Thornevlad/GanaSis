<?php 
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
	header('Location: login.php');
}else{
        session_start();
        $controlador = new Controlador();
        $sesion = $controlador->comprobarsesion();
    if($sesion == false){
        header('Location: login.php');
        //echo 'sesion=falso';
    }else{
        require 'vistas/index.view.php';
        //echo 'sesion=true';
   }
}
 ?>