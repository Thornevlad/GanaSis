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
                $VacTipo_vacuna = $_POST['VacTipo_vacuna'];
                $VacLaboratorio = $_POST['VacLaboratorio'];
                $VacNombre_vac = $_POST['VacNombre_vac'];
                $VacFec_ultvac = $_POST['VacFec_ultvac'];
                $VacFec_proxvac = $_POST['VacFec_proxvac'];
                $VacFec_vacuna = $_POST['VacFec_vacuna'];
                $VacDosis_vac = $_POST['VacDosis_vac'];
                $VacDosis_sum = $_POST['VacDosis_sum'];
                $VacDosisasum = $_POST['VacDosisasum'];
                $VacFec_ultpalp = $_POST['VacFec_ultpalp'];
                $VacFec_proxpalp = $_POST['VacFec_proxpalp'];

                $VacTipo_vacuna = $controlador->limpiarDatos($VacTipo_vacuna);
                $VacLaboratorio = $controlador->limpiarDatos($VacLaboratorio);
                $VacNombre_vac = $controlador->limpiarDatos($VacNombre_vac);
                $VacFec_ultvac = $controlador->limpiarDatos($VacFec_ultvac);
                $VacFec_proxvac = $controlador->limpiarDatos($VacFec_proxvac);
                $VacFec_vacuna = $controlador->limpiarDatos($VacFec_vacuna);
                $VacDosis_vac = $controlador->limpiarDatos($VacDosis_vac);
                $VacDosis_sum = $controlador->limpiarDatos($VacDosis_sum);
                $VacDosisasum = $controlador->limpiarDatos($VacDosisasum);
                $VacFec_ultpalp = $controlador->limpiarDatos($VacFec_ultpalp);
                $VacFec_proxpalp = $controlador->limpiarDatos($VacFec_proxpalp);

                $resultado = $controlador->agregarVacuna('',$VacTipo_vacuna,$VacLaboratorio,$VacNombre_vac,
                $VacFec_ultvac,$VacFec_proxvac,'',$VacFec_vacuna,$VacDosis_vac,$VacDosis_sum,
                $VacDosisasum,$VacFec_ultpalp,$VacFec_proxpalp);
                if($resultado == true){
                    $mensaje = 'Usuario Agregado Correctamente';
                }else{
                    $errores = 'Error al Agregar Usuario, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                $VacCod_vacuna = $_POST['Vacod'];
                $VacTipo_vacuna = $_POST['VacTipo'];
                $VacLaboratorio = $_POST['VacLabo'];
                $VacNombre_vac = $_POST['VacNomb'];
                $VacFec_ultvac = $_POST['VacFecult'];
                $VacFec_proxvac = $_POST['VacFecprox'];
                $VacFec_vacuna = $_POST['VacFecvac'];
                $VacDosis_vac = $_POST['VacDosi'];
                $VacDosis_sum = $_POST['VacDosi2'];
                $VacDosisasum = $_POST['VacDosi3'];
                $VacFec_ultpalp = $_POST['VacFecupal'];
                $VacFec_proxpalp = $_POST['VacFecppal'];

                $VacCod_vacuna = $controlador->limpiarDatos($VacCod_vacuna);
                $VacTipo_vacuna = $controlador->limpiarDatos($VacTipo_vacuna);
                $VacLaboratorio = $controlador->limpiarDatos($VacLaboratorio);
                $VacNombre_vac = $controlador->limpiarDatos($VacNombre_vac);
                $VacFec_ultvac = $controlador->limpiarDatos($VacFec_ultvac);
                $VacFec_proxvac = $controlador->limpiarDatos($VacFec_proxvac);
                $VacFec_vacuna = $controlador->limpiarDatos($VacFec_vacuna);
                $VacDosis_vac = $controlador->limpiarDatos($VacDosis_vac);
                $VacDosis_sum = $controlador->limpiarDatos($VacDosis_sum);
                $VacDosisasum = $controlador->limpiarDatos($VacDosisasum);
                $VacFec_ultpalp = $controlador->limpiarDatos($VacFec_ultpalp);
                $VacFec_proxpalp = $controlador->limpiarDatos($VacFec_proxpalp);

                $resultado = $controlador->modificarvacuna($VacCod_vacuna,$VacTipo_vacuna,$VacLaboratorio,$VacNombre_vac,
                $VacFec_ultvac,$VacFec_proxvac,'',$VacFec_vacuna,$VacDosis_vac,$VacDosis_sum,
                $VacDosisasum,$VacFec_ultpalp,$VacFec_proxpalp);
                if($resultado == true){
                    $mensaje = 'Vacuna Moficado Correctamente';
                }else{
                    $errores = 'Error al Modificar Vacuna, Intentelo Nuevamente';
                }
            break;
        }
    }

    $resultado = $controlador->consultarvacuna();
    include ('vistas/vacunas.view.php');
}else{
    header('Location: index.php');
}}}
?>