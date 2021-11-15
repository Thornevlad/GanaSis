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
    $NacSede1 = $_SESSION['cod'];
    $NacNsede1 = $_SESSION['sed'];
    $NacUsuario1 = $_SESSION['usu'];
    if($_SESSION['rol'] == 'Auxiliar'){
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'agregar':
                $NacNom_becerro = $_POST['NacNom_becerro'];
                $NacSede = $NacSede1;
                $NacFecha_nacim = $_POST['NacFecha_nacim'];
                $NacNombre_Padre = $_POST['NacNombre_Padre'];
                $NacNombre_Madre = $_POST['NacNombre_Madre'];
                $NacCruce_raza = $_POST['NacCruce_raza'];
                $NacNovedad = $_POST['NacNovedad'];
                $NacVacuna = $_POST['NacVacuna'];
                $NacTratamiento = $_POST['NacTratamiento'];
                $NacTiempo_trat = $_POST['NacTiempo_trat'];
                $NacEnfermedad = $_POST['NacEnfermedad'];
                $NacNacido_vivo = $_POST['NacNacido_vivo'];
                $NacGenero = $_POST['NacGenero'];
                $NacPeso = $_POST['NacPeso'];
                $NacRaza = $_POST['NacRaza'];
                $NacUsuario = $NacUsuario1;
                $NacNsede = $NacNsede1;

                $NacNom_becerro = $controlador->limpiarDatos($NacNom_becerro);
                $NacSede = $controlador->limpiarDatos($NacSede);
                $NacFecha_nacim = $controlador->limpiarDatos($NacFecha_nacim);
                $NacNombre_Padre = $controlador->limpiarDatos($NacNombre_Padre);
                $NacNombre_Madre = $controlador->limpiarDatos($NacNombre_Madre);
                $NacCruce_raza = $controlador->limpiarDatos($NacCruce_raza);
                $NacNovedad = $controlador->limpiarDatos($NacNovedad);
                $NacVacuna = $controlador->limpiarDatos($NacVacuna);
                $NacTratamiento = $controlador->limpiarDatos($NacTratamiento);
                $NacTiempo_trat = $controlador->limpiarDatos($NacTiempo_trat);
                $NacEnfermedad = $controlador->limpiarDatos($NacEnfermedad);
                $NacNacido_vivo = $controlador->limpiarDatos($NacNacido_vivo);
                $NacGenero = $controlador->limpiarDatos($NacGenero);
                $NacPeso = $controlador->limpiarDatos($NacPeso);
                $NacRaza = $controlador->limpiarDatos($NacRaza);
                $NacUsuario = $controlador->limpiarDatos($NacUsuario);
                $NacNsede = $controlador->limpiarDatos($NacNsede);

                $resultado = $controlador->agregarNacimientos('',$NacNom_becerro,$NacSede,$NacFecha_nacim,
                $NacNombre_Padre,$NacNombre_Madre,$NacCruce_raza,$NacNovedad,$NacVacuna,$NacTratamiento,
                $NacTiempo_trat,$NacEnfermedad,$NacNacido_vivo,$NacGenero,$NacPeso,$NacRaza,'',$NacUsuario,$NacNsede);
                if($resultado == true){
                    $mensaje = 'Usuario Agregado Correctamente';
                }else{
                    $errores = 'Error al Agregar Usuario, Intentelo Nuevamente';
                }
            break;

            case 'modificar':

                $NacNom_becerro = $_POST['Nom_becerro'];
                $NacSede = $NacSede1;
                $NacFecha_nacim = $_POST['Fecha_nacim'];
                $NacNombre_Padre = $_POST['Nombre_Padre'];
                $NacNombre_Madre = $_POST['Nombre_Madre'];
                $NacCruce_raza = $_POST['Cruce_raza'];
                $NacNovedad = $_POST['Novedad'];
                $NacVacuna = $_POST['Vacuna'];
                $NacTratamiento = $_POST['Tratamiento'];
                $NacTiempo_trat = $_POST['Tiempo_trat'];
                $NacEnfermedad = $_POST['Enfermedad'];
                $NacNacido_vivo = $_POST['Nacido_vivo'];
                $NacPeso = $_POST['Peso'];
                $NacRaza = $_POST['Raza'];
                $NacUsuario = $NacUsuario1;
                $NacNsede = $NacNsede1;
                $NacCod_becerro = $_POST['NacCod'];


                $NacNom_becerro = $controlador->limpiarDatos($NacNom_becerro);
                $NacSede = $controlador->limpiarDatos($NacSede);
                $NacFecha_nacim = $controlador->limpiarDatos($NacFecha_nacim);
                $NacNombre_Padre = $controlador->limpiarDatos($NacNombre_Padre);
                $NacNombre_Madre = $controlador->limpiarDatos($NacNombre_Madre);
                $NacCruce_raza = $controlador->limpiarDatos($NacCruce_raza);
                $NacNovedad = $controlador->limpiarDatos($NacNovedad);
                $NacVacuna = $controlador->limpiarDatos($NacVacuna);
                $NacTratamiento = $controlador->limpiarDatos($NacTratamiento);
                $NacTiempo_trat = $controlador->limpiarDatos($NacTiempo_trat);
                $NacEnfermedad = $controlador->limpiarDatos($NacEnfermedad);
                $NacNacido_vivo = $controlador->limpiarDatos($NacNacido_vivo);
                $NacPeso = $controlador->limpiarDatos($NacPeso);
                $NacRaza = $controlador->limpiarDatos($NacRaza);
                $NacUsuario = $controlador->limpiarDatos($NacUsuario);
                $NacNsede = $controlador->limpiarDatos($NacNsede);
                $NacCod_becerro = $controlador->limpiarDatos($NacCod_becerro);

                $resultado = $controlador->modificarnacimientos($NacCod_becerro,$NacNom_becerro,$NacSede,$NacFecha_nacim,
                $NacNombre_Padre,$NacNombre_Madre,$NacCruce_raza,$NacNovedad,$NacVacuna,$NacTratamiento,
                $NacTiempo_trat,$NacEnfermedad,$NacNacido_vivo,'',$NacPeso,$NacRaza,'',$NacUsuario,$NacNsede);
                if($resultado == true){
                    $mensaje = 'Nacimiento Modificado Correctamente';
                }else{
                    $errores = 'Error al Modificar Nacimiento, Intentelo Nuevamente';
                }

                break;

                case 'eliminar':
                    $NacCod_becerro = $_POST['NacCod'];
                    $resultado = $controlador->eliminarnacimiento($NacCod_becerro);
                    if($resultado == true){
                        $mensaje = 'Se ha Eliminado el Becerro Correctamente';
                    }else{
                        $errores = 'Error al Eliminar el Becerro, Intentelo Nuevamente';
                    }
        }
    }

    $resultado = $controlador->consultarnacimiento();
    include ('vistas/nacimiento.view.php');
}else{
    header('Location: index.php');
}}}

?>