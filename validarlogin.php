<?php 
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
    echo "no se pudo conectar a la base de datos";
}else{
    $contador = 0;
    $controlador = new Controlador();
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'login':
                $docusu = $_POST['docusu'];
                $conusu = $_POST['conusu'];

                $docusu = $controlador->limpiarDatos($docusu);
                $conusu = $controlador->limpiarDatos($conusu);
                $conusu = $controlador->encriptar($conusu);

                $resultado = $controlador->validarusuario($docusu, $conusu);
                if ($resultado == true) {
                    header('Location: index.php');
                }else{
                    $errores = 'Usuario o contraseña invalida, intente de nuevo';
                }
                break;
        }
    }
    require "login.php"; 
}
?>