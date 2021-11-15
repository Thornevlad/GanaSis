<?php 
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
    echo "No se pudo conectar a la base de datos";
} else {
    session_start();
    $contador = 0;
    $controlador = new Controlador();
    $sesion = $controlador->comprobarsesion();
    if($sesion == false){
        header('Location: login.php');
}else{
    if($_SESSION['rol'] == 'Auxiliar'){
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'agregar':
                $EnfNombre = $_POST['EnfNombre'];
                $EnfDescripcion = $_POST['EnfDescripcion'];
                $EnfTratamiento = $_POST['EnfTratamiento'];
                $EnfDesc_tratamiento = $_POST['EnfDesc_tratamiento'];
                $EnfMeses_trata = $_POST['EnfMeses_trata'];
                $EnfDias_trata = $_POST['EnfDias_trata'];
                $EnfDias_transc = $_POST['EnfDias_transc'];
                $EnfDias_rest = $_POST['EnfDias_rest'];
                $EnfMuerto = $_POST['EnfMuerto'];
               
                $EnfNombre = $controlador->limpiarDatos($EnfNombre);
                $EnfDescripcion = $controlador->limpiarDatos($EnfDescripcion);
                $EnfTratamiento = $controlador->limpiarDatos($EnfTratamiento);
                $EnfDesc_tratamiento = $controlador->limpiarDatos($EnfDesc_tratamiento);
                $EnfMeses_trata = $controlador->limpiarDatos($EnfMeses_trata);
                $EnfDias_trata = $controlador->limpiarDatos($EnfDias_trata);
                $EnfDias_transc = $controlador->limpiarDatos($EnfDias_transc);
                $EnfDias_rest = $controlador->limpiarDatos($EnfDias_rest);
                $EnfMuerto = $controlador->limpiarDatos($EnfMuerto);
               
                $resultado = $controlador->agregarenfermedad('',$EnfNombre,$EnfDescripcion,$EnfTratamiento,
                $EnfDesc_tratamiento,$EnfMeses_trata,$EnfDias_trata,$EnfDias_transc,$EnfDias_rest,$EnfMuerto,
                '');
                if($resultado == true){
                    $mensaje = 'Enfermedad Agregada Correctamente';
                }else{
                    $errores = 'Error al Agregar Enfermedad, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                $EnfCod_enfermedad = $_POST['Codienf'];
                $EnfNombre = $_POST['nombre_enfermedad'];
                $EnfDescripcion = $_POST['desc_enfermedad'];
                $EnfTratamiento = $_POST['tratamiento'];
                $EnfDesc_tratamiento = $_POST['desc_tratamiento'];
                $EnfMeses_trata = $_POST['meses_tratamiento'];
                $EnfDias_trata = $_POST['dias_tratamiento'];
                $EnfDias_transc = $_POST['dias_transcurridos'];
                $EnfDias_rest = $_POST['dias_restantes'];
                $EnfMuerto = $_POST['muerto'];

                $EnfCod_enfermedad = $controlador->limpiarDatos($EnfCod_enfermedad);
                $EnfNombre = $controlador->limpiarDatos($EnfNombre);
                $EnfDescripcion = $controlador->limpiarDatos($EnfDescripcion);
                $EnfTratamiento = $controlador->limpiarDatos($EnfTratamiento);
                $EnfDesc_tratamiento = $controlador->limpiarDatos($EnfDesc_tratamiento);
                $EnfMeses_trata = $controlador->limpiarDatos($EnfMeses_trata);
                $EnfDias_trata = $controlador->limpiarDatos($EnfDias_trata);
                $EnfDias_transc = $controlador->limpiarDatos($EnfDias_transc);
                $EnfDias_rest = $controlador->limpiarDatos($EnfDias_rest);
                $EnfMuerto = $controlador->limpiarDatos($EnfMuerto);


                $resultado = $controlador->modificarenfermedad($EnfCod_enfermedad,$EnfNombre,$EnfDescripcion,$EnfTratamiento,
                $EnfDesc_tratamiento,$EnfMeses_trata,$EnfDias_trata,$EnfDias_transc,$EnfDias_rest,$EnfMuerto,'');
                if($resultado == true){
                    $mensaje = 'Enfermedad Modificada Correctamente';
                }else{
                    $errores = 'Error al Modificar Enfermedad, Intentelo Nuevamente';
                }            
            break;
        }
    }
    $resultado = $controlador->consultarenfermedad();
    include ('vistas/enfermedades.view.php');
}else{
    header('Location: index.php');
}}}
?>