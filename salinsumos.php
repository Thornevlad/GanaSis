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
    $SinsCodSede1 = $_SESSION['cod'];
    $SinsSedNom1 = $_SESSION['sed'];
    $SinsUsu_usuario1 = $_SESSION['usu'];
    if($_SESSION['rol'] == 'Auxiliar'){
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'agregar':
                $SinsCodSede = $SinsCodSede1;
                $SinsSedNom = $SinsSedNom1;
                $SinsUsu_usuario = $SinsUsu_usuario1;
                $SinsFecha_salida = $_POST['SinsFecha_salida'];
                $SinsCant_salida = $_POST['SinsCant_salida'];
                $SinsObservacion = $_POST['SinsObservacion'];

                $SinsCodSede = $controlador->limpiarDatos($SinsCodSede);
                $SinsSedNom = $controlador->limpiarDatos($SinsSedNom);
                $SinsUsu_usuario = $controlador->limpiarDatos($SinsUsu_usuario);
                $SinsFecha_salida = $controlador->limpiarDatos($SinsFecha_salida);
                $SinsCant_salida = $controlador->limpiarDatos($SinsCant_salida);
                $SinsObservacion = $controlador->limpiarDatos($SinsObservacion);

                $resultado = $controlador->agregarSalidains('',$SinsCodSede,$SinsSedNom,$SinsUsu_usuario,$SinsFecha_salida,
                $SinsCant_salida,$SinsObservacion,'');
                if($resultado == true){
                    $mensaje = 'Salida de Insumo Realizada Correctamente';
                }else{
                    $errores = 'Error al Realizar la Salida del Insumo, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                $SinsCod_salida = $_POST['Salincod'];
                $SinsCodSede = $SinsCodSede1;
                $SinsSedNom = $SinsSedNom1;
                $SinsUsu_usuario = $SinsUsu_usuario1;
                $SinsFecha_salida = $_POST['SFsa'];
                $SinsCant_salida = $_POST['Salcan'];
                $SinsObservacion = $_POST['Salobs'];

                $SinsCod_salida = $controlador->limpiarDatos($SinsCod_salida);
                $SinsCodSede = $controlador->limpiarDatos($SinsCodSede);
                $SinsSedNom = $controlador->limpiarDatos($SinsSedNom);
                $SinsUsu_usuario = $controlador->limpiarDatos($SinsUsu_usuario);
                $SinsFecha_salida = $controlador->limpiarDatos($SinsFecha_salida);
                $SinsCant_salida = $controlador->limpiarDatos($SinsCant_salida);
                $SinsObservacion = $controlador->limpiarDatos($SinsObservacion);


                $resultado = $controlador->Modificarsalinsumos($SinsCod_salida,$SinsCodSede,$SinsSedNom,$SinsUsu_usuario,
                $SinsFecha_salida,$SinsCant_salida,$SinsObservacion,'');
                if($resultado == true){
                    $mensaje = 'Salida de Insumo Modificada Correctamente';
                }else{
                    $errores = 'Error al Modificar Salida de Insumo, Intentelo Nuevamente';
                }            break;
        }
    }

    $resultado = $controlador->consultarsalidains();
    include ('vistas/salinsumos.view.php');
}else{
    header('Location: index.php');
}}}
?>