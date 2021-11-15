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
    $IngCodSede1 = $_SESSION['cod'];
    $IngSedNom1 = $_SESSION['sed'];
    $IngUsuing1 = $_SESSION['usu'];
    if($_SESSION['rol'] == 'Auxiliar'){
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case 'agregar':
                $IngCodSede = $IngCodSede1;
                $IngSedNom = $IngSedNom1;
                $IngUsuing = $IngUsuing1;
                $IngTipo_Insumo_Ingreso = $_POST['IngTipo_Insumo_Ingreso'];
                $IngNombre_ingreso = $_POST['IngNombre_ingreso'];
                $IngFecha_factura = $_POST['IngFecha_factura'];
                $IngNumero_factura = $_POST['IngNumero_factura'];
                $IngCantidad_ingreso = $_POST['IngCantidad_ingreso'];
                $IngValor_iva = $_POST['IngValor_iva'];
                $IngValor_descuentos = $_POST['IngValor_descuentos'];
                $IngValor_unitario = $_POST['IngValor_unitario'];
                $IngValor_factura = $_POST['IngValor_factura'];

                $IngCodSede = $controlador->limpiarDatos($IngCodSede);
                $IngSedNom = $controlador->limpiarDatos($IngSedNom);
                $IngUsuing = $controlador->limpiarDatos($IngUsuing);
                $IngTipo_Insumo_Ingreso = $controlador->limpiarDatos($IngTipo_Insumo_Ingreso);
                $IngNombre_ingreso = $controlador->limpiarDatos($IngNombre_ingreso);
                $IngFecha_factura = $controlador->limpiarDatos($IngFecha_factura);
                $IngNumero_factura = $controlador->limpiarDatos($IngNumero_factura);
                $IngCantidad_ingreso = $controlador->limpiarDatos($IngCantidad_ingreso);
                $IngValor_iva = $controlador->limpiarDatos($IngValor_iva);
                $IngValor_descuentos = $controlador->limpiarDatos($IngValor_descuentos);
                $IngValor_unitario = $controlador->limpiarDatos($IngValor_unitario);
                $IngValor_factura = $controlador->limpiarDatos($IngValor_factura);

                $resultado = $controlador->agregarIngresos('',$IngCodSede,$IngSedNom,$IngUsuing,$IngTipo_Insumo_Ingreso,$IngNombre_ingreso,
                $IngFecha_factura,$IngNumero_factura,$IngCantidad_ingreso,$IngValor_iva,$IngValor_descuentos,
                $IngValor_unitario,$IngValor_factura,'');
                if($resultado == true){
                    $mensaje = 'Usuario Agregado Correctamente';
                }else{
                    $errores = 'Error al Agregar Usuario, Intentelo Nuevamente';
                }
            break;

            case 'modificar':
                $IngCod_ingreso = $_POST['IngCod'];
                $IngCodSede = $IngCodSede1;
                $IngSedNom = $IngSedNom1;
                $IngUsuing = $IngUsuing1;
                $IngNombre_ingreso = $_POST['Nombre_ingreso'];
                $IngNumero_factura = $_POST['Numero_factura'];
                $IngCantidad_ingreso = $_POST['Cantidad_ingreso'];
                $IngValor_iva = $_POST['Valor_iva'];
                $IngValor_descuentos = $_POST['Valor_descuentos'];
                $IngValor_unitario = $_POST['Valor_unitario'];
                $IngValor_factura = $_POST['Valor_factura'];

                $IngCod_ingreso = $controlador->limpiarDatos($IngCod_ingreso);
                $IngCodSede = $controlador->limpiarDatos($IngCodSede);
                $IngSedNom = $controlador->limpiarDatos($IngSedNom);
                $IngUsuing = $controlador->limpiarDatos($IngUsuing);
                $IngNombre_ingreso = $controlador->limpiarDatos($IngNombre_ingreso);
                $IngNumero_factura = $controlador->limpiarDatos($IngNumero_factura);
                $IngCantidad_ingreso = $controlador->limpiarDatos($IngCantidad_ingreso);
                $IngValor_iva = $controlador->limpiarDatos($IngValor_iva);
                $IngValor_descuentos = $controlador->limpiarDatos($IngValor_descuentos);
                $IngValor_unitario = $controlador->limpiarDatos($IngValor_unitario);
                $IngValor_factura = $controlador->limpiarDatos($IngValor_factura);


                $resultado = $controlador->modificaringresos($IngCod_ingreso,$IngCodSede,$IngSedNom,$IngUsuing,'',$IngNombre_ingreso,
                '',$IngNumero_factura,$IngCantidad_ingreso,$IngValor_iva,$IngValor_descuentos,
                $IngValor_unitario,$IngValor_factura,'');
                if($resultado == true){
                    $mensaje = 'Ingreso Modificado Correctamente';
                }else{
                    $errores = 'Error al Modificar Ingreso, Intentelo Nuevamente';
                }            break;
        }
    }

    $resultado = $controlador->consultaringresos();
    include ('vistas/inginsumos.view.php');
}else{
    header('Location: index.php');
}}}

?>