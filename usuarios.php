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
                $UsuCod_sede = $_POST['UsuCod_sede'];
                $UsuContrasena = $_POST['UsuContrasena'];
                $UsuNombre = $_POST['UsuNombre'];
                $UsuNombre2 = $_POST['UsuNombre2'];
                $UsuApellido = $_POST['UsuApellido'];
                $UsuApellido2 = $_POST['UsuApellido2'];
                $UsuCorreo = $_POST['UsuCorreo'];
                $UsuIdentificacion = $_POST['UsuIdentificacion'];
                $UsuTelefono = $_POST['UsuTelefono'];
                $UsuRol = $_POST['UsuRol'];
                $UsuEstado = $_POST['UsuEstado'];

                $UsuCod_sede = $controlador->limpiarDatos($UsuCod_sede);
                $UsuNombre = $controlador->limpiarDatos($UsuNombre);
                $UsuNombre2 = $controlador->limpiarDatos($UsuNombre2);
                $UsuApellido = $controlador->limpiarDatos($UsuApellido);
                $UsuApellido2 = $controlador->limpiarDatos($UsuApellido2);
                $UsuCorreo = $controlador->limpiarDatos($UsuCorreo);
                $UsuIdentificacion = $controlador->limpiarDatos($UsuIdentificacion);
                $UsuTelefono = $controlador->limpiarDatos($UsuTelefono);
                $UsuRol = $controlador->limpiarDatos($UsuRol);
                $UsuEstado = $controlador->limpiarDatos($UsuEstado);

                $UsuContrasena = $controlador->encriptar($UsuContrasena);


                
                $resultado = $controlador->agregarUsuario('',$UsuCod_sede,'',$UsuContrasena,$UsuNombre,$UsuNombre2,$UsuApellido,$UsuApellido2,
                $UsuCorreo,$UsuIdentificacion,$UsuTelefono,$UsuRol,$UsuEstado);
                if($resultado == true){
                    $mensaje = 'Usuario Agregado Correctamente';
                }else{
                    $errores = 'Error al Agregar Usuario, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                $UsuCod_usuario = $_POST['UsuCo'];
                $UsuNombre2 = $_POST['Nombre2'];
                $UsuApellido2 = $_POST['Apellido2'];
                $UsuCorreo = $_POST['Correo'];
                $UsuTelefono = $_POST['Telefono'];
                $UsuRol = $_POST['Rol'];
                $UsuEstado = $_POST['Estado'];    
                
                $UsuCod_usuario = $controlador->limpiarDatos($UsuCod_usuario);
                $UsuNombre2 = $controlador->limpiarDatos($UsuNombre2);
                $UsuApellido2 = $controlador->limpiarDatos($UsuApellido2);
                $UsuCorreo = $controlador->limpiarDatos($UsuCorreo);
                $UsuTelefono = $controlador->limpiarDatos($UsuTelefono);
                $UsuRol = $controlador->limpiarDatos($UsuRol);
                $UsuEstado = $controlador->limpiarDatos($UsuEstado);

                $resultado = $controlador->Modificar_Usuarios($UsuCod_usuario,'','','','',
                $UsuNombre2,'',$UsuApellido2,$UsuCorreo,'',$UsuTelefono,$UsuRol,$UsuEstado);

                if($resultado == true){
                    $mensaje = 'Usuario Modificado Correctamente';
                }else{
                    $errores = 'Error al Modificar Usuario, Intentelo Nuevamente';
                }
            break;

            case 'eliminar':
                $UsuCod_usuario = $_POST['UsuCo'];
                $resultado = $controlador->eliminarusuario($UsuCod_usuario);
                if($resultado == true){
                    $mensaje = 'Se ha Eliminado el Usuario Correctamente';
                }else{
                    $errores = 'Error al Eliminar el Usuario, Intentelo Nuevamente';
                }
            break;



        }
    }

    $resultado = $controlador->consultarusuarios();
    $resultado_sede = $controlador->consultarsede();
    include "vistas/usuarios.view.php"; 
}else{
    header('Location: index.php');
}}}
?>
