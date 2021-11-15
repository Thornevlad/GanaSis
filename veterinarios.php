<?php 
require 'clases.php';
$conexion = new conexion();
if(!$conexion){
    echo "no se pudo conectar a la base de datos";
}else{
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
                        $VetNom_veterinario = $_POST['VetNom_veterinario'];
                        $VetApe_veterinario = $_POST['VetApe_veterinario'];
                        $VetDireccion = $_POST['VetDireccion'];
                        $VetCorreo = $_POST['VetCorreo'];
                        $VetTelefono = $_POST['VetTelefono'];
                        $VetTarj_profesional = $_POST['VetTarj_profesional'];
                        $VetIdentificacion = $_POST['VetIdentificacion'];
                        $VetCiudad = $_POST['VetCiudad'];
                        $VetPais = $_POST['VetPais'];
                    
                        $VetNom_veterinario = $controlador->limpiarDatos($VetNom_veterinario);
                        $VetApe_veterinario = $controlador->limpiarDatos($VetApe_veterinario);
                        $VetDireccion = $controlador->limpiarDatos($VetDireccion);
                        $VetCorreo = $controlador->limpiarDatos($VetCorreo);
                        $VetTelefono = $controlador->limpiarDatos($VetTelefono);
                        $VetTarj_profesional = $controlador->limpiarDatos($VetTarj_profesional);
                        $VetCiudad = $controlador->limpiarDatos($VetCiudad);
                        $VetPais = $controlador->limpiarDatos($VetPais);
                    
                        $resultado = $controlador->agregarveterinario('',$VetNom_veterinario,$VetApe_veterinario,$VetDireccion,
                        $VetCorreo,$VetTelefono,$VetTarj_profesional,$VetIdentificacion,$VetCiudad,$VetPais);
                        if($resultado == true){
                            $mensaje = 'Veterinario Agregado Correctamente';
                        }else{
                            $errores = 'Error al Agregar Veterianrio, Intentelo Nuevamente';
                        }
                    break;

                    case 'modificar':
                        $VetCod_veterinario = $_POST['Vetecod'];
                        $VetNom_veterinario = $_POST['Nombre'];
                        $VetApe_veterinario = $_POST['Apellido'];
                        $VetDireccion = $_POST['Direccion'];
                        $VetCorreo = $_POST['Correo'];
                        $VetTelefono = $_POST['Telefono'];
                        $VetTarj_profesional = $_POST['Tprofesional'];
                        $VetIdentificacion = $_POST['Identificacion'];
                        $VetCiudad = $_POST['Ciudad'];
                        $VetPais = $_POST['Pais'];

                        $VetCod_veterinario = $controlador->limpiarDatos($VetCod_veterinario);
                        $VetNom_veterinario = $controlador->limpiarDatos($VetNom_veterinario);
                        $VetApe_veterinario = $controlador->limpiarDatos($VetApe_veterinario);
                        $VetDireccion = $controlador->limpiarDatos($VetDireccion);
                        $VetCorreo = $controlador->limpiarDatos($VetCorreo);
                        $VetTelefono = $controlador->limpiarDatos($VetTelefono);
                        $VetTarj_profesional = $controlador->limpiarDatos($VetTarj_profesional);
                        $VetIdentificacion = $controlador->limpiarDatos($VetIdentificacion);
                        $VetCiudad = $controlador->limpiarDatos($VetCiudad);
                        $VetPais = $controlador->limpiarDatos($VetPais);


                        $resultado = $controlador->modificarveterinario($VetCod_veterinario,$VetNom_veterinario,$VetApe_veterinario,$VetDireccion,
                        $VetCorreo,$VetTelefono,$VetTarj_profesional,$VetIdentificacion,$VetCiudad,$VetPais);
                        if($resultado == true){
                            $mensaje = 'Veterinario Moficado Correctamente';
                        }else{
                            $errores = 'Error al Modificar Veterinario, Intentelo Nuevamente';
                        }            
                    break;

                    case 'eliminar':
                        $VetCod_veterinario = $_POST['Vetecod'];
                        $resultado = $controlador->eliminarveterinario($VetCod_veterinario);
                        if($resultado == true){
                            $mensaje = 'Se ha Eliminado el Veterinario Correctamente';
                        }else{
                            $errores = 'Error al Eliminar el Veterinario, Intentelo Nuevamente';
                        }

                }
            }
    $resultado = $controlador->consultarveterinario();
    include "vistas/veterinarios.view.php"; 
}else{
    header('Location: index.php');
}}}
?>