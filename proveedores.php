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
    if($_SESSION['rol'] == 'Auxiliar'){
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'agregar':
                $ProNombre_prov = $_POST['ProNombre_prov'];
                $ProDireccion_prov = $_POST['ProDireccion_prov'];
                $ProTelefono_prov = $_POST['ProTelefono_prov'];
                $ProCiudad_prov = $_POST['ProCiudad_prov'];
                $ProPais = $_POST['ProPais'];
                $ProvCorreo_prov = $_POST['ProvCorreo_prov'];
                $ProWeb_website = $_POST['ProWeb_website'];
                $ProRed_facebook = $_POST['ProRed_facebook'];
                $ProRed_twitter = $_POST['ProRed_twitter'];
                $ProRed_instragram = $_POST['ProRed_instragram'];
                $ProTipo_insumo = $_POST['ProTipo_insumo'];
                $ProCedulaNIT = $_POST['ProCedulaNIT'];
                $ProCre_lineacredito = $_POST['ProCre_lineacredito'];

                $ProNombre_prov = $controlador->limpiarDatos($ProNombre_prov);
                $ProDireccion_prov = $controlador->limpiarDatos($ProDireccion_prov);
                $ProTelefono_prov = $controlador->limpiarDatos($ProTelefono_prov);
                $ProCiudad_prov = $controlador->limpiarDatos($ProCiudad_prov);
                $ProPais = $controlador->limpiarDatos($ProPais);
                $ProvCorreo_prov = $controlador->limpiarDatos($ProvCorreo_prov);
                $ProWeb_website = $controlador->limpiarDatos($ProWeb_website);
                $ProRed_facebook = $controlador->limpiarDatos($ProRed_facebook);
                $ProRed_twitter = $controlador->limpiarDatos($ProRed_twitter);
                $ProRed_instragram = $controlador->limpiarDatos($ProRed_instragram);
                $ProTipo_insumo = $controlador->limpiarDatos($ProTipo_insumo);
                $ProCedulaNIT = $controlador->limpiarDatos($ProCedulaNIT);
                $ProCre_lineacredito = $controlador->limpiarDatos($ProCre_lineacredito);

                $resultado = $controlador->agregarProveedor('',$ProNombre_prov,$ProDireccion_prov,$ProTelefono_prov,$ProCiudad_prov,$ProPais,
                $ProvCorreo_prov,$ProWeb_website,$ProRed_facebook,$ProRed_twitter,$ProRed_instragram,$ProTipo_insumo,$ProCedulaNIT,$ProCre_lineacredito);
                               
                if($resultado == true){
                    $mensaje = 'Proveedor Agregado Correctamente';
                }else{
                    $errores = 'Error al Agregar Proveedor, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                $ProCod_proveedor = $_POST['Pcod'];
                $ProNombre_prov = $_POST['Nombreprov'];
                $ProDireccion_prov = $_POST['Direccionprov'];
                $ProTelefono_prov = $_POST['Telefonoprov'];
                $ProCiudad_prov = $_POST['Ciudadprov'];
                $ProPais = $_POST['Paisprov'];
                $ProvCorreo_prov = $_POST['Correoprov'];
                $ProWeb_website = $_POST['Webprov'];
                $ProRed_facebook = $_POST['facebookprov'];
                $ProRed_twitter = $_POST['twitterprov'];
                $ProRed_instragram = $_POST['instragramprov'];
                $ProTipo_insumo = $_POST['insumoprov'];
                $ProCedulaNIT = $_POST['Cedulaprov'];
                $ProCre_lineacredito = $_POST['creditoprov'];

                $ProCod_proveedor = $controlador->limpiarDatos($ProCod_proveedor);
                $ProNombre_prov = $controlador->limpiarDatos($ProNombre_prov);
                $ProDireccion_prov = $controlador->limpiarDatos($ProDireccion_prov);
                $ProTelefono_prov = $controlador->limpiarDatos($ProTelefono_prov);
                $ProCiudad_prov = $controlador->limpiarDatos($ProCiudad_prov);
                $ProPais = $controlador->limpiarDatos($ProPais);
                $ProvCorreo_prov = $controlador->limpiarDatos($ProvCorreo_prov);
                $ProWeb_website = $controlador->limpiarDatos($ProWeb_website);
                $ProRed_facebook = $controlador->limpiarDatos($ProRed_facebook);
                $ProRed_twitter = $controlador->limpiarDatos($ProRed_twitter);
                $ProRed_instragram = $controlador->limpiarDatos($ProRed_instragram);
                $ProTipo_insumo = $controlador->limpiarDatos($ProTipo_insumo);
                $ProCedulaNIT = $controlador->limpiarDatos($ProCedulaNIT);
                $ProCre_lineacredito = $controlador->limpiarDatos($ProCre_lineacredito);

                $resultado = $controlador->modificarproveedor($ProCod_proveedor,$ProNombre_prov,$ProDireccion_prov,$ProTelefono_prov,$ProCiudad_prov,$ProPais,
                $ProvCorreo_prov,$ProWeb_website,$ProRed_facebook,$ProRed_twitter,$ProRed_instragram,$ProTipo_insumo,$ProCedulaNIT,$ProCre_lineacredito);
                if($resultado == true){
                    $mensaje = 'Proveedor Modificado Correctamente';
                }else{
                    $errores = 'Error al Modificar Proveedor, Intentelo Nuevamente';
                }            break;
        }
    }

    $resultado = $controlador->consultarproveedor();
    $resultado_tip = $controlador->consultartipoinsumo();
    include "vistas/proveedores.view.php";
}else{
    header('Location: index.php');
}}}

?>