<?php
class Conexion extends PDO
{
    private $tipo_de_base = 'mysql';
    private $host = 'localhost:3306';
    private $nombre_de_base = 'bovisoftbd';
    private $usuario = 'root';
    private $contrasena = 'Theri2015';
    //private $sql;
    public function __construct()
    {
        $dsn = $this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base;
        //Sobreescribo el método constructor de la clase PDO.
        try {
            parent::__construct($dsn, $this->usuario, $this->contrasena);
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}

class Usuario
{
    private $UsuCod_usuario;
    private $UsuCod_sede;
    private $Usu_Usuario;
    private $UsuContrasena;
    private $UsuNombre;
    private $UsuNombre2;
    private $UsuApellido;
    private $UsuApellido2;
    private $UsuCorreo;
    private $UsuIdentificacion;
    private $UsuTelefono;
    private $UsuRol;
    private $UsuEstado;

    //metodo constructor
    public function Usuario(
        $UsuCod_usuario,
        $UsuCod_sede,
        $Usu_Usuario,
        $UsuContrasena,
        $UsuNombre,
        $UsuNombre2,
        $UsuApellido,
        $UsuApellido2,
        $UsuCorreo,
        $UsuIdentificacion,
        $UsuTelefono,
        $UsuRol,
        $UsuEstado
    ) {
        $this->UsuCod_usuario = $UsuCod_usuario;
        $this->UsuCod_sede = $UsuCod_sede;
        $this->Usu_Usuario = $Usu_Usuario;
        $this->UsuContrasena = $UsuContrasena;
        $this->UsuNombre = $UsuNombre;
        $this->UsuNombre2 = $UsuNombre2;
        $this->UsuApellido = $UsuApellido;
        $this->UsuApellido2 = $UsuApellido2;
        $this->UsuCorreo = $UsuCorreo;
        $this->UsuIdentificacion = $UsuIdentificacion;
        $this->UsuTelefono = $UsuTelefono;
        $this->UsuRol = $UsuRol;
        $this->UsuEstado = $UsuEstado;
    }

    //metodo get
    public function getUsuCod_usuario()
    {
        return $this->UsuCod_usuario;
    }
    public function getUsuCod_sede()
    {
        return $this->UsuCod_sede;
    }
    public function getUsu_Usuario()
    {
        return $this->Usu_Usuario;
    }
    public function getUsuContrasena()
    {
        return $this->UsuContrasena;
    }
    public function getUsuNombre()
    {
        return $this->UsuNombre;
    }
    public function getUsuNombre2()
    {
        return $this->UsuNombre2;
    }
    public function getUsuApellido()
    {
        return $this->UsuApellido;
    }
    public function getUsuApellido2()
    {
        return $this->UsuApellido2;
    }
    public function getUsuCorreo()
    {
        return $this->UsuCorreo;
    }
    public function getUsuIdentificacion()
    {
        return $this->UsuIdentificacion;
    }
    public function getUsuTelefono()
    {
        return $this->UsuTelefono;
    }
    public function getUsurol()
    {
        return $this->UsuRol;
    }
    public function getUsuEstado()
    {
        return $this->UsuEstado;
    }
}

class Gestor_Usuario
{
    public function agregarUsuario(Usuario $usuario)
    {
        $Conexion = new Conexion();
        $UsuCod_sede = $usuario->getUsuCod_sede();
        $UsuContrasena = $usuario->getUsuContrasena();
        $UsuNombre = $usuario->getUsuNombre();
        $UsuNombre2 = $usuario->getUsuNombre2();
        $UsuApellido = $usuario->getUsuApellido();
        $UsuApellido2 = $usuario->getUsuApellido2();
        $UsuCorreo = $usuario->getUsuCorreo();
        $UsuIdentificacion = $usuario->getUsuIdentificacion();
        $UsuTelefono = $usuario->getUsuTelefono();
        $UsuRol = $usuario->getUsurol();
        $UsuEstado = $usuario->getUsuEstado();
        $sql = 'CALL nuevo_usuario(:UsuCod_sede, :UsuContrasena, :UsuNombre, :UsuNombre2, :UsuApellido, :UsuApellido2, :UsuCorreo, :UsuIdentificacion, :UsuTelefono, :UsuRol, :UsuEstado)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':UsuCod_sede' => $UsuCod_sede, ':UsuContrasena' => $UsuContrasena, ':UsuNombre' => $UsuNombre, ':UsuNombre2' => $UsuNombre2, ':UsuApellido' => $UsuApellido, ':UsuApellido2' => $UsuApellido2, ':UsuCorreo' => $UsuCorreo, ':UsuIdentificacion' => $UsuIdentificacion, ':UsuTelefono' => $UsuTelefono, ':UsuRol' => $UsuRol, ':UsuEstado' => $UsuEstado));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);  
        return ($resultado) ? true : false;
    }

    public function consultarUsuarios()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Usuarios()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function eliminarUsuario($UsuCod_usuario)
    {
        $Conexion = new Conexion();
        $sql = 'CALL eliminar_usuario(:UsuCod_usuario)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array('UsuCod_usuario' => $UsuCod_usuario));
        $resultado = $consulta->rowCount();
        return ($resultado > 0) ? true : false;
    }

    public function Modificar_Usuarios(Usuario $usuario)
    {
        $Conexion = new Conexion();
        $UsuNombre2 = $usuario->getUsuNombre2();
        $UsuApellido2 = $usuario->getUsuApellido2();
        $UsuCorreo = $usuario->getUsuCorreo();
        $UsuTelefono = $usuario->getUsuTelefono();
        $UsuRol = $usuario->getUsurol();
        $UsuEstado = $usuario->getUsuEstado();
        $UsuCod_usuario = $usuario->getUsuCod_usuario();
        $sql = 'CALL Modificar_Usuarios( :UsuNombre2, :UsuApellido2, :UsuCorreo, :UsuTelefono, :UsuRol, :UsuEstado, :UsuCod_usuario )';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':UsuNombre2' => $UsuNombre2, ':UsuApellido2' => $UsuApellido2, ':UsuCorreo' => $UsuCorreo, ':UsuTelefono' => $UsuTelefono, ':UsuRol' => $UsuRol, ':UsuEstado' => $UsuEstado, ':UsuCod_usuario' => $UsuCod_usuario));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado > 0) ? true : false;
    }
}

class Loguin
{
    private $docusu;
    private $conusu;

    public function Loguin($docusu, $conusu)
    {
        $this->docusu = $docusu;
        $this->conusu = $conusu;
    }

    public function getDocusu()
    {
        return $this->docusu;
    }
    public function getConusu()
    {
        return $this->conusu;
    }
}

class GestorLoguin
{
    public function validarUsuario(Loguin $loguin)
    {
        $conexion = new conexion();
        $docusu = $loguin->getDocusu();
        $conusu = $loguin->getConusu();
        $sql = 'CALL validar_usuario(:docusu, :conusu)';
        $consulta = $conexion->prepare($sql);
        $consulta->execute(array(':docusu' => $docusu, ':conusu' => $conusu));
        $resultado = $consulta->fetch();
        if ($resultado) {
            session_start();
            $_SESSION['id'] = $resultado['UsuIdentificacion'];
            $_SESSION['doc'] = $resultado['UsuContrasena'];
            $_SESSION['cod'] = $resultado['UsuCod_sede'];
            $_SESSION['sed'] = $resultado['SedNombre'];
            $_SESSION['usu'] = $resultado['Usu_Usuario'];
            $_SESSION['nom'] = $resultado['UsuNombre'];
            $_SESSION['ape'] = $resultado['UsuApellido'];
            $_SESSION['rol'] = $resultado['UsuRol'];
            $_SESSION['est'] = $resultado['UsuEstado'];
        }
        return ($resultado) ? true : false;
    }
}

class Proveedor
{
    private $ProCod_proveedor;
    private $ProNombre_prov;
    private $ProDireccion_prov;
    private $ProTelefono_prov;
    private $ProCiudad_prov;
    private $ProPais;
    private $ProvCorreo_prov;
    private $ProWeb_website;
    private $ProRed_facebook;
    private $ProRed_twitter;
    private $ProRed_instragram;
    private $ProTipo_insumo;
    private $ProCedulaNIT;
    private $ProCre_lineacredito;

    public function Proveedor(
        $ProCod_proveedor,
        $ProNombre_prov,
        $ProDireccion_prov,
        $ProTelefono_prov,
        $ProCiudad_prov,
        $ProPais,
        $ProvCorreo_prov,
        $ProWeb_website,
        $ProRed_facebook,
        $ProRed_twitter,
        $ProRed_instragram,
        $ProTipo_insumo,
        $ProCedulaNIT,
        $ProCre_lineacredito
    ) {
        $this->ProCod_proveedor = $ProCod_proveedor;
        $this->ProNombre_prov = $ProNombre_prov;
        $this->ProDireccion_prov = $ProDireccion_prov;
        $this->ProTelefono_prov = $ProTelefono_prov;
        $this->ProCiudad_prov = $ProCiudad_prov;
        $this->ProPais = $ProPais;
        $this->ProvCorreo_prov = $ProvCorreo_prov;
        $this->ProWeb_website = $ProWeb_website;
        $this->ProRed_facebook = $ProRed_facebook;
        $this->ProRed_twitter = $ProRed_twitter;
        $this->ProRed_instragram = $ProRed_instragram;
        $this->ProTipo_insumo = $ProTipo_insumo;
        $this->ProCedulaNIT = $ProCedulaNIT;
        $this->ProCre_lineacredito = $ProCre_lineacredito;
    }


    public function getProCod_proveedor()
    {
        return $this->ProCod_proveedor;
    }
    public function getProNombre_prov()
    {
        return $this->ProNombre_prov;
    }
    public function getProDireccion_prov()
    {
        return $this->ProDireccion_prov;
    }
    public function getProTelefono_prov()
    {
        return $this->ProTelefono_prov;
    }
    public function getProCiudad_prov()
    {
        return $this->ProCiudad_prov;
    }
    public function getProPais()
    {
        return $this->ProPais;
    }
    public function getProvCorreo_prov()
    {
        return $this->ProvCorreo_prov;
    }
    public function getProWeb_website()
    {
        return $this->ProWeb_website;
    }
    public function getProRed_facebook()
    {
        return $this->ProRed_facebook;
    }
    public function getProRed_twitter()
    {
        return $this->ProRed_twitter;
    }
    public function getProRed_instragram()
    {
        return $this->ProRed_instragram;
    }
    public function getProTipo_insumo()
    {
        return $this->ProTipo_insumo;
    }
    public function getProCedulaNIT()
    {
        return $this->ProCedulaNIT;
    }
    public function getProCre_lineacredito()
    {
        return $this->ProCre_lineacredito;
    }
}

class Gestor_Proveedor
{

    public function agregarProveedor(Proveedor $proveedor)
    {
        $Conexion = new Conexion();
        $ProNombre_prov = $proveedor->getProNombre_prov();
        $ProDireccion_prov = $proveedor->getProDireccion_prov();
        $ProTelefono_prov = $proveedor->getProTelefono_prov();
        $ProCiudad_prov = $proveedor->getProCiudad_prov();
        $ProPais = $proveedor->getProPais();
        $ProvCorreo_prov = $proveedor->getProvCorreo_prov();
        $ProWeb_website = $proveedor->getProWeb_website();
        $ProRed_facebook = $proveedor->getProRed_facebook();
        $ProRed_twitter = $proveedor->getProRed_twitter();
        $ProRed_instragram = $proveedor->getProRed_instragram();
        $ProTipo_insumo = $proveedor->getProTipo_insumo();
        $ProCedulaNIT = $proveedor->getProCedulaNIT();
        $ProCre_lineacredito = $proveedor->getProCre_lineacredito();
        $sql = 'CALL nuevo_proveedor(:ProNombre_prov, :ProDireccion_prov, :ProTelefono_prov, :ProCiudad_prov, :ProPais, :ProvCorreo_prov, :ProWeb_website, :ProRed_facebook, :ProRed_twitter, :ProRed_instragram, :ProTipo_insumo, :ProCedulaNIT, :ProCre_lineacredito)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':ProNombre_prov' => $ProNombre_prov, ':ProDireccion_prov' => $ProDireccion_prov, ':ProTelefono_prov' => $ProTelefono_prov, ':ProCiudad_prov' => $ProCiudad_prov, ':ProPais' => $ProPais, ':ProvCorreo_prov' => $ProvCorreo_prov, ':ProWeb_website' => $ProWeb_website, ':ProRed_facebook' => $ProRed_facebook, ':ProRed_twitter' => $ProRed_twitter, ':ProRed_instragram' => $ProRed_instragram, ':ProTipo_insumo' => $ProTipo_insumo, ':ProCedulaNIT' => $ProCedulaNIT, ':ProCre_lineacredito' => $ProCre_lineacredito));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado) ? true : false;
    }

    public function consultarProveedor()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Proveedores()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarProveedor(Proveedor $proveedor)
    {
        $Conexion = new Conexion();
        $ProCod_proveedor = $proveedor->getProCod_proveedor();
        $ProNombre_prov = $proveedor->getProNombre_prov();
        $ProDireccion_prov = $proveedor->getProDireccion_prov();
        $ProTelefono_prov = $proveedor->getProTelefono_prov();
        $ProCiudad_prov = $proveedor->getProCiudad_prov();
        $ProPais = $proveedor->getProPais();
        $ProvCorreo_prov = $proveedor->getProvCorreo_prov();
        $ProWeb_website = $proveedor->getProWeb_website();
        $ProRed_facebook = $proveedor->getProRed_facebook();
        $ProRed_twitter = $proveedor->getProRed_twitter();
        $ProRed_instragram = $proveedor->getProRed_instragram();
        $ProTipo_insumo = $proveedor->getProTipo_insumo();
        $ProCedulaNIT = $proveedor->getProCedulaNIT();
        $ProCre_lineacredito = $proveedor->getProCre_lineacredito();
        $sql = 'CALL modificar_proveedor(:ProNombre_prov, :ProDireccion_prov, :ProTelefono_prov, :ProCiudad_prov, :ProPais, :ProvCorreo_prov, :ProWeb_website, :ProRed_facebook, :ProRed_twitter, :ProRed_instragram, :ProTipo_insumo, :ProCedulaNIT, :ProCre_lineacredito, :ProCod_proveedor)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':ProNombre_prov' => $ProNombre_prov, ':ProDireccion_prov' => $ProDireccion_prov, ':ProTelefono_prov' => $ProTelefono_prov, ':ProCiudad_prov' => $ProCiudad_prov, ':ProPais' => $ProPais, ':ProvCorreo_prov' => $ProvCorreo_prov, ':ProWeb_website' => $ProWeb_website, ':ProRed_facebook' => $ProRed_facebook, ':ProRed_twitter' => $ProRed_twitter, ':ProRed_instragram' => $ProRed_instragram, ':ProTipo_insumo' => $ProTipo_insumo, ':ProCedulaNIT' => $ProCedulaNIT, ':ProCre_lineacredito' => $ProCre_lineacredito, ':ProCod_proveedor' => $ProCod_proveedor));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado); 
        return ($resultado) ? true : false;
    }
}

class Veterinario
{
    private $VetCod_veterinario;
    private $VetNom_veterinario;
    private $VetApe_veterinario;
    private $VetDireccion;
    private $VetCorreo;
    private $VetTelefono;
    private $VetTarj_profesional;
    private $VetIdentificacion;
    private $VetCiudad;
    private $VetPais;

    public function Veterinario(
        $VetCod_veterinario,
        $VetNom_veterinario,
        $VetApe_veterinario,
        $VetDireccion,
        $VetCorreo,
        $VetTelefono,
        $VetTarj_profesional,
        $VetIdentificacion,
        $VetCiudad,
        $VetPais
    ) {
        $this->VetCod_veterinario = $VetCod_veterinario;
        $this->VetNom_veterinario = $VetNom_veterinario;
        $this->VetApe_veterinario = $VetApe_veterinario;
        $this->VetDireccion = $VetDireccion;
        $this->VetCorreo = $VetCorreo;
        $this->VetTelefono = $VetTelefono;
        $this->VetTarj_profesional = $VetTarj_profesional;
        $this->VetIdentificacion = $VetIdentificacion;
        $this->VetCiudad = $VetCiudad;
        $this->VetPais = $VetPais;
    }


    public function getVetCod_veterinario()
    {
        return $this->VetCod_veterinario;
    }
    public function getVetNom_veterinario()
    {
        return $this->VetNom_veterinario;
    }
    public function getVetApe_veterinario()
    {
        return $this->VetApe_veterinario;
    }
    public function getVetDireccion()
    {
        return $this->VetDireccion;
    }
    public function getVetCorreo()
    {
        return $this->VetCorreo;
    }
    public function getVetTelefono()
    {
        return $this->VetTelefono;
    }
    public function getVetTarj_profesional()
    {
        return $this->VetTarj_profesional;
    }
    public function getVetIdentificacion()
    {
        return $this->VetIdentificacion;
    }
    public function getVetCiudad()
    {
        return $this->VetCiudad;
    }
    public function getVetPais()
    {
        return $this->VetPais;
    }
}

class Gestor_Veterinario
{

    public function agregarVeterinario(Veterinario $veterinario)
    {
        $Conexion = new Conexion();
        $VetNom_veterinario = $veterinario->getVetNom_veterinario();
        $VetApe_veterinario = $veterinario->getVetApe_veterinario();
        $VetDireccion = $veterinario->getVetDireccion();
        $VetCorreo = $veterinario->getVetCorreo();
        $VetTelefono = $veterinario->getVetTelefono();
        $VetTarj_profesional = $veterinario->getVetTarj_profesional();
        $VetIdentificacion = $veterinario->getVetIdentificacion();
        $VetCiudad = $veterinario->getVetCiudad();
        $VetPais = $veterinario->getVetPais();
        $sql = 'CALL nuevo_veterinario(:VetNom_veterinario, :VetApe_veterinario, :VetDireccion, :VetCorreo, :VetTelefono, :VetTarj_profesional, :VetIdentificacion, :VetCiudad, :VetPais)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':VetNom_veterinario' => $VetNom_veterinario, ':VetApe_veterinario' => $VetApe_veterinario, ':VetDireccion' => $VetDireccion, ':VetCorreo' => $VetCorreo, ':VetTelefono' => $VetTelefono, ':VetTarj_profesional' => $VetTarj_profesional, ':VetIdentificacion' => $VetIdentificacion, ':VetCiudad' => $VetCiudad, ':VetPais' => $VetPais));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarVeterinario()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Veterinarios()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarveterinario(Veterinario $veterinario)
    {
        $Conexion = new Conexion();
        $VetCod_veterinario = $veterinario->getVetCod_veterinario();
        $VetNom_veterinario = $veterinario->getVetNom_veterinario();
        $VetApe_veterinario = $veterinario->getVetApe_veterinario();
        $VetDireccion = $veterinario->getVetDireccion();
        $VetCorreo = $veterinario->getVetCorreo();
        $VetTelefono = $veterinario->getVetTelefono();
        $VetTarj_profesional = $veterinario->getVetTarj_profesional();
        $VetIdentificacion = $veterinario->getVetIdentificacion();
        $VetCiudad = $veterinario->getVetCiudad();
        $VetPais = $veterinario->getVetPais();
        $sql = 'CALL modificarveterinario(:VetNom_veterinario, :VetApe_veterinario, :VetDireccion, :VetCorreo, :VetTelefono, :VetTarj_profesional, :VetIdentificacion, :VetCiudad, :VetPais, :VetCod_veterinario)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':VetNom_veterinario' => $VetNom_veterinario, ':VetApe_veterinario' => $VetApe_veterinario, ':VetDireccion' => $VetDireccion, ':VetCorreo' => $VetCorreo, ':VetTelefono' => $VetTelefono, ':VetTarj_profesional' => $VetTarj_profesional, ':VetIdentificacion' => $VetIdentificacion, ':VetCiudad' => $VetCiudad, ':VetPais' => $VetPais, ':VetCod_veterinario' => $VetCod_veterinario));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function eliminarVeterinario($VetCod_veterinario)
    {
        $Conexion = new Conexion();
        $sql = 'CALL eliminar_veterinario(:VetCod_veterinario)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array('VetCod_veterinario' => $VetCod_veterinario));
        $resultado = $consulta->rowCount();
        return ($resultado > 0) ? true : false;
    }
}


class Sede
{
    public  $SedID;
    private $SedNombre;
    private $SedDireccion;
    private $SedCiudad;
    private $SedPais;

    public function Sede($SedID, $SedNombre, $SedDireccion, $SedCiudad, $SedPais)
    {
        $this->SedID = $SedID;
        $this->SedNombre = $SedNombre;
        $this->SedDireccion = $SedDireccion;
        $this->SedCiudad = $SedCiudad;
        $this->SedPais = $SedPais;
    }

    public function getSedID()
    {
        return $this->SedID;
    }
    public function getSedNombre()
    {
        return $this->SedNombre;
    }
    public function getSedDireccion()
    {
        return $this->SedDireccion;
    }
    public function getSedCiudad()
    {
        return $this->SedCiudad;
    }
    public function getSedPais()
    {
        return $this->SedPais;
    }
}


class Gestor_Sede
{

    public function agregarSede(Sede $sede)
    {
        $Conexion = new Conexion();
        $SedNombre = $sede->getSedNombre();
        $SedDireccion = $sede->getSedDireccion();
        $SedCiudad = $sede->getSedCiudad();
        $SedPais = $sede->getSedPais();
        $sql = 'CALL nueva_sede(:SedNombre, :SedDireccion, :SedCiudad, :SedPais)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':SedNombre' => $SedNombre, ':SedDireccion' => $SedDireccion, ':SedCiudad' => $SedCiudad, ':SedPais' => $SedPais));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarSede()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_sedes()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarSede(Sede $sede)
    {
        $Conexion = new Conexion();
        $SedID = $sede->getSedID();
        $SedNombre = $sede->getSedNombre();
        $SedDireccion = $sede->getSedDireccion();
        $SedCiudad = $sede->getSedCiudad();
        $SedPais = $sede->getSedPais();
        $sql = 'CALL modificarsede(:SedNombre, :SedDireccion, :SedCiudad, :SedPais, :SedID)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':SedNombre' => $SedNombre, ':SedDireccion' => $SedDireccion, ':SedCiudad' => $SedCiudad, ':SedPais' => $SedPais, ':SedID' => $SedID));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }
}

class Vacuna
{
    private $VacCod_vacuna;
    private $VacTipo_vacuna;
    private $VacLaboratorio;
    private $VacNombre_vac;
    private $VacFec_ultvac;
    private $VacFec_proxvac;
    private $VacFec_actual;
    private $VacFec_vacuna;
    private $VacDosis_vac;
    private $VacDosis_sum;
    private $VacDosisasum;
    private $VacFec_ultpalp;
    private $VacFec_proxpalp;

    public function Vacuna(
        $VacCod_vacuna,
        $VacTipo_vacuna,
        $VacLaboratorio,
        $VacNombre_vac,
        $VacFec_ultvac,
        $VacFec_proxvac,
        $VacFec_actual,
        $VacFec_vacuna,
        $VacDosis_vac,
        $VacDosis_sum,
        $VacDosisasum,
        $VacFec_ultpalp,
        $VacFec_proxpalp
    ) {
        $this->VacCod_vacuna = $VacCod_vacuna;
        $this->VacTipo_vacuna = $VacTipo_vacuna;
        $this->VacLaboratorio = $VacLaboratorio;
        $this->VacNombre_vac = $VacNombre_vac;
        $this->VacFec_ultvac = $VacFec_ultvac;
        $this->VacFec_proxvac = $VacFec_proxvac;
        $this->VacFec_actual = $VacFec_actual;
        $this->VacFec_vacuna = $VacFec_vacuna;
        $this->VacDosis_vac = $VacDosis_vac;
        $this->VacDosis_sum = $VacDosis_sum;
        $this->VacDosisasum = $VacDosisasum;
        $this->VacFec_ultpalp = $VacFec_ultpalp;
        $this->VacFec_proxpalp = $VacFec_proxpalp;
    }

    public function getVacCod_vacuna()
    {
        return $this->VacCod_vacuna;
    }
    public function getVacTipo_vacuna()
    {
        return $this->VacTipo_vacuna;
    }
    public function getVacLaboratorio()
    {
        return $this->VacLaboratorio;
    }
    public function getVacNombre_vac()
    {
        return $this->VacNombre_vac;
    }
    public function getVacFec_ultvac()
    {
        return $this->VacFec_ultvac;
    }
    public function getVacFec_proxvac()
    {
        return $this->VacFec_proxvac;
    }
    public function getVacFec_actual()
    {
        return $this->VacFec_actual;
    }
    public function getVacFec_vacuna()
    {
        return $this->VacFec_vacuna;
    }
    public function getVacDosis_vac()
    {
        return $this->VacDosis_vac;
    }
    public function getVacDosis_sum()
    {
        return $this->VacDosis_sum;
    }
    public function getVacDosisasum()
    {
        return $this->VacDosisasum;
    }
    public function getVacFec_ultpalp()
    {
        return $this->VacFec_ultpalp;
    }
    public function getVacFec_proxpalp()
    {
        return $this->VacFec_proxpalp;
    }
}

class Gestor_Vacuna
{

    public function agregarVacuna(Vacuna $vacuna)
    {
        $Conexion = new Conexion();
        $VacTipo_vacuna = $vacuna->getVacTipo_vacuna();
        $VacLaboratorio = $vacuna->getVacLaboratorio();
        $VacNombre_vac = $vacuna->getVacNombre_vac();
        $VacFec_ultvac = $vacuna->getVacFec_ultvac();
        $VacFec_proxvac = $vacuna->getVacFec_proxvac();
        $VacFec_vacuna = $vacuna->getVacFec_vacuna();
        $VacDosis_vac = $vacuna->getVacDosis_vac();
        $VacDosis_sum = $vacuna->getVacDosis_sum();
        $VacDosisasum = $vacuna->getVacDosisasum();
        $VacFec_ultpalp = $vacuna->getVacFec_ultpalp();
        $VacFec_proxpalp = $vacuna->getVacFec_proxpalp();
        $sql = 'CALL nueva_vacuna(:VacTipo_vacuna, :VacLaboratorio, :VacNombre_vac, :VacFec_ultvac, :VacFec_proxvac, :VacFec_vacuna, :VacDosis_vac, :VacDosis_sum, :VacDosisasum,:VacFec_ultpalp,:VacFec_proxpalp)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':VacTipo_vacuna' => $VacTipo_vacuna, ':VacLaboratorio' => $VacLaboratorio, ':VacNombre_vac' => $VacNombre_vac, ':VacFec_ultvac' => $VacFec_ultvac, ':VacFec_proxvac' => $VacFec_proxvac, ':VacFec_vacuna' => $VacFec_vacuna, ':VacDosis_vac' => $VacDosis_vac, ':VacDosis_sum' => $VacDosis_sum, ':VacDosisasum' => $VacDosisasum, ':VacFec_ultpalp' => $VacFec_ultpalp, ':VacFec_proxpalp' => $VacFec_proxpalp));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarVacuna()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_vacunas()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarvacuna(Vacuna $vacuna)
    {
        $Conexion = new Conexion();
        $VacCod_vacuna = $vacuna->getVacCod_vacuna();
        $VacTipo_vacuna = $vacuna->getVacTipo_vacuna();
        $VacLaboratorio = $vacuna->getVacLaboratorio();
        $VacNombre_vac = $vacuna->getVacNombre_vac();
        $VacFec_ultvac = $vacuna->getVacFec_ultvac();
        $VacFec_proxvac = $vacuna->getVacFec_proxvac();
        $VacFec_vacuna = $vacuna->getVacFec_vacuna();
        $VacDosis_vac = $vacuna->getVacDosis_vac();
        $VacDosis_sum = $vacuna->getVacDosis_sum();
        $VacDosisasum = $vacuna->getVacDosisasum();
        $VacFec_ultpalp = $vacuna->getVacFec_ultpalp();
        $VacFec_proxpalp = $vacuna->getVacFec_proxpalp();
        $sql = 'CALL modificarvacuna(:VacTipo_vacuna, :VacLaboratorio, :VacNombre_vac, :VacFec_ultvac, :VacFec_proxvac, :VacFec_vacuna, :VacDosis_vac, :VacDosis_sum, :VacDosisasum, :VacFec_ultpalp, :VacFec_proxpalp,:VacCod_vacuna)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':VacTipo_vacuna' => $VacTipo_vacuna, ':VacLaboratorio' => $VacLaboratorio, ':VacNombre_vac' => $VacNombre_vac, ':VacFec_ultvac' => $VacFec_ultvac, ':VacFec_proxvac' => $VacFec_proxvac, ':VacFec_vacuna' => $VacFec_vacuna, ':VacDosis_vac' => $VacDosis_vac, ':VacDosis_sum' => $VacDosis_sum, ':VacDosisasum' => $VacDosisasum, ':VacFec_ultpalp' => $VacFec_ultpalp, ':VacFec_proxpalp' => $VacFec_proxpalp, ':VacCod_vacuna' => $VacCod_vacuna));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }
}


class Enfermedad
{
    private $EnfCod_enfermedad;
    private $EnfNombre;
    private $EnfDescripcion;
    private $EnfTratamiento;
    private $EnfDesc_tratamiento;
    private $EnfMeses_trata;
    private $EnfDias_trata;
    private $EnfDias_transc;
    private $EnfDias_rest;
    private $EnfMuerto;
    private $EnfFecha_actual;

    public function Enfermedad(
        $EnfCod_enfermedad,
        $EnfNombre,
        $EnfDescripcion,
        $EnfTratamiento,
        $EnfDesc_tratamiento,
        $EnfMeses_trata,
        $EnfDias_trata,
        $EnfDias_transc,
        $EnfDias_rest,
        $EnfMuerto,
        $EnfFecha_actual
    ) {
        $this->EnfCod_enfermedad = $EnfCod_enfermedad;
        $this->EnfNombre = $EnfNombre;
        $this->EnfDescripcion = $EnfDescripcion;
        $this->EnfTratamiento = $EnfTratamiento;
        $this->EnfDesc_tratamiento = $EnfDesc_tratamiento;
        $this->EnfMeses_trata = $EnfMeses_trata;
        $this->EnfDias_trata = $EnfDias_trata;
        $this->EnfDias_transc = $EnfDias_transc;
        $this->EnfDias_rest = $EnfDias_rest;
        $this->EnfMuerto = $EnfMuerto;
        $this->EnfFecha_actual = $EnfFecha_actual;
    }

    public function getEnfCod_enfermedad()
    {
        return $this->EnfCod_enfermedad;
    }
    public function getEnfNombre()
    {
        return $this->EnfNombre;
    }
    public function getEnfDescripcion()
    {
        return $this->EnfDescripcion;
    }
    public function getEnfTratamiento()
    {
        return $this->EnfTratamiento;
    }
    public function getEnfDesc_tratamiento()
    {
        return $this->EnfDesc_tratamiento;
    }
    public function getEnfMeses_trata()
    {
        return $this->EnfMeses_trata;
    }
    public function getEnfDias_trata()
    {
        return $this->EnfDias_trata;
    }
    public function getEnfDias_transc()
    {
        return $this->EnfDias_transc;
    }
    public function getEnfDias_rest()
    {
        return $this->EnfDias_rest;
    }
    public function getEnfMuerto()
    {
        return $this->EnfMuerto;
    }
    public function getEnfFecha_actual()
    {
        return $this->EnfFecha_actual;
    }
}

class Gestor_Enfermedad
{

    public function agregarEnfermedad(Enfermedad $enfermedad)
    {
        $Conexion = new Conexion();
        $EnfNombre = $enfermedad->getEnfNombre();
        $EnfDescripcion = $enfermedad->getEnfDescripcion();
        $EnfTratamiento = $enfermedad->getEnfTratamiento();
        $EnfDesc_tratamiento = $enfermedad->getEnfDesc_tratamiento();
        $EnfMeses_trata = $enfermedad->getEnfMeses_trata();
        $EnfDias_trata = $enfermedad->getEnfDias_trata();
        $EnfDias_transc = $enfermedad->getEnfDias_transc();
        $EnfDias_rest = $enfermedad->getEnfDias_rest();
        $EnfMuerto = $enfermedad->getEnfMuerto();
        $sql = 'CALL nueva_enfermedad(:EnfNombre, :EnfDescripcion, :EnfTratamiento, :EnfDesc_tratamiento, :EnfMeses_trata, :EnfDias_trata, :EnfDias_transc, :EnfDias_rest, :EnfMuerto)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':EnfNombre' => $EnfNombre, ':EnfDescripcion' => $EnfDescripcion, ':EnfTratamiento' => $EnfTratamiento, ':EnfDesc_tratamiento' => $EnfDesc_tratamiento, ':EnfMeses_trata' => $EnfMeses_trata, ':EnfDias_trata' => $EnfDias_trata, ':EnfDias_transc' => $EnfDias_transc, ':EnfDias_rest' => $EnfDias_rest, ':EnfMuerto' => $EnfMuerto));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function modificarEnfermedad(Enfermedad $enfermedad)
    {
        $Conexion = new Conexion();
        $EnfCod_enfermedad = $enfermedad->getEnfCod_enfermedad();
        $EnfNombre = $enfermedad->getEnfNombre();
        $EnfDescripcion = $enfermedad->getEnfDescripcion();
        $EnfTratamiento = $enfermedad->getEnfTratamiento();
        $EnfDesc_tratamiento = $enfermedad->getEnfDesc_tratamiento();
        $EnfMeses_trata = $enfermedad->getEnfMeses_trata();
        $EnfDias_trata = $enfermedad->getEnfDias_trata();
        $EnfDias_transc = $enfermedad->getEnfDias_transc();
        $EnfDias_rest = $enfermedad->getEnfDias_rest();
        $EnfMuerto = $enfermedad->getEnfMuerto();
        $sql = 'CALL modificar_enfermedad(:EnfNombre, :EnfDescripcion, :EnfTratamiento, :EnfDesc_tratamiento, :EnfMeses_trata, :EnfDias_trata, :EnfDias_transc, :EnfDias_rest, :EnfMuerto, :EnfCod_enfermedad)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':EnfNombre' => $EnfNombre, ':EnfDescripcion' => $EnfDescripcion, ':EnfTratamiento' => $EnfTratamiento, ':EnfDesc_tratamiento' => $EnfDesc_tratamiento, ':EnfMeses_trata' => $EnfMeses_trata, ':EnfDias_trata' => $EnfDias_trata, ':EnfDias_transc' => $EnfDias_transc, ':EnfDias_rest' => $EnfDias_rest, ':EnfMuerto' => $EnfMuerto, ':EnfCod_enfermedad' => $EnfCod_enfermedad));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado); 
        return ($resultado) ? true : false;
    }

    public function consultarEnfermedad()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_enfermedades()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}


class Novedad
{
    private $NovCod_novedad;
    private $NovCod_sede;
    private $NovSed_ganado;
    private $NovUsu_repnovedad;
    private $NovDescr_novedad;
    private $NovFecha_novedad;
    private $NovFecha_actual;

    public function Novedad(
        $NovCod_novedad,
        $NovCod_sede,
        $NovSed_ganado,
        $NovUsu_repnovedad,
        $NovDescr_novedad,
        $NovFecha_novedad,
        $NovFecha_actual
    ) {
        $this->NovCod_novedad = $NovCod_novedad;
        $this->NovCod_sede = $NovCod_sede;
        $this->NovSed_ganado = $NovSed_ganado;
        $this->NovUsu_repnovedad = $NovUsu_repnovedad;
        $this->NovDescr_novedad = $NovDescr_novedad;
        $this->NovFecha_novedad = $NovFecha_novedad;
        $this->NovFecha_actual = $NovFecha_actual;
    }

    public function getNovCod_novedad()
    {
        return $this->NovCod_novedad;
    }
    public function getNovCod_sede()
    {
        return $this->NovCod_sede;
    }
    public function getNovSed_ganado()
    {
        return $this->NovSed_ganado;
    }
    public function getNovUsu_repnovedad()
    {
        return $this->NovUsu_repnovedad;
    }
    public function getNovDescr_novedad()
    {
        return $this->NovDescr_novedad;
    }
    public function getNovFecha_novedad()
    {
        return $this->NovFecha_novedad;
    }
    public function getNovFecha_actual()
    {
        return $this->NovFecha_actual;
    }
}

class Gestor_Novedad
{

    public function agregarNovedad(Novedad $novedad)
    {
        $Conexion = new Conexion();
        $NovCod_sede = $novedad->getNovCod_sede();
        $NovSed_ganado = $novedad->getNovSed_ganado();
        $NovUsu_repnovedad = $novedad->getNovUsu_repnovedad();
        $NovDescr_novedad = $novedad->getNovDescr_novedad();
        $NovFecha_novedad = $novedad->getNovFecha_novedad();
        $sql = 'CALL nueva_novedad(:NovCod_sede,:NovSed_ganado,:NovUsu_repnovedad,:NovDescr_novedad, :NovFecha_novedad)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':NovCod_sede' => $NovCod_sede, ':NovSed_ganado' => $NovSed_ganado, ':NovUsu_repnovedad' => $NovUsu_repnovedad, ':NovDescr_novedad' => $NovDescr_novedad, ':NovFecha_novedad' => $NovFecha_novedad));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarNovedad()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Novedades()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarNovedades(Novedad $novedad)
    {
        $Conexion = new Conexion();
        $NovCod_novedad = $novedad->getNovCod_novedad();
        $NovCod_sede = $novedad->getNovCod_sede();
        $NovSed_ganado = $novedad->getNovSed_ganado();
        $NovUsu_repnovedad = $novedad->getNovUsu_repnovedad();
        $NovDescr_novedad = $novedad->getNovDescr_novedad();
        $NovFecha_novedad = $novedad->getNovFecha_novedad();
        $sql = 'CALL modificar_novedades(:NovCod_sede,:NovSed_ganado,:NovUsu_repnovedad,:NovDescr_novedad, :NovFecha_novedad, :NovCod_novedad)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(
            ':NovCod_sede' => $NovCod_sede, ':NovSed_ganado' => $NovSed_ganado, ':NovUsu_repnovedad' => $NovUsu_repnovedad,
            ':NovDescr_novedad' => $NovDescr_novedad, ':NovFecha_novedad' => $NovFecha_novedad,
            ':NovCod_novedad' => $NovCod_novedad
        ));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado); 
        return ($resultado) ? true : false;
    }
}

class Salidagan
{
    private $SalCod_salida;
    private $SalUsu_salida;
    private $SalFecha_salida;
    private $SalFecha_actual;
    private $SalMotivo_salida;

    public function Salidagan(
        $SalCod_salida,
        $SalUsu_salida,
        $SalFecha_salida,
        $SalFecha_actual,
        $SalMotivo_salida
    ) {
        $this->SalCod_salida = $SalCod_salida;
        $this->SalUsu_salida = $SalUsu_salida;
        $this->SalFecha_salida = $SalFecha_salida;
        $this->SalFecha_actual = $SalFecha_actual;
        $this->SalMotivo_salida = $SalMotivo_salida;
    }

    public function getSalCod_salida()
    {
        return $this->SalCod_salida;
    }
    public function getSalUsu_salida()
    {
        return $this->SalUsu_salida;
    }
    public function getSalFecha_salida()
    {
        return $this->SalFecha_salida;
    }
    public function getSalFecha_actual()
    {
        return $this->SalFecha_actual;
    }
    public function getSalMotivo_salida()
    {
        return $this->SalMotivo_salida;
    }
}

class Gestor_Salidagan
{

    public function agregaSalidagan(Salidagan $Salidagan)
    {
        $Conexion = new Conexion();
        $SalUsu_salida = $Salidagan->getSalUsu_salida();
        $SalFecha_salida = $Salidagan->getSalFecha_salida();
        $SalMotivo_salida = $Salidagan->getSalMotivo_salida();
        $sql = 'CALL nueva_salida_ganado(:SalUsu_salida, :SalFecha_salida, :SalMotivo_salida)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':SalUsu_salida' => $SalUsu_salida, ':SalFecha_salida' => $SalFecha_salida, ':SalMotivo_salida' => $SalMotivo_salida));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarSalidaganSede()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Salida_Ganado_Sede(:SedID)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function consultarsalidagan()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Salida_Ganado()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}

class Salidains
{
    private $SinsCod_salida;
    private $SinsCodSede;
    private $SinsSedNom;
    private $SinsUsu_usuario;
    private $SinsFecha_salida;
    private $SinsCant_salida;
    private $SinsObservacion;
    private $SinsFecha_actual;

    public function Salidains(
        $SinsCod_salida,
        $SinsCodSede,
        $SinsSedNom,
        $SinsUsu_usuario,
        $SinsFecha_salida,
        $SinsCant_salida,
        $SinsObservacion,
        $SinsFecha_actual
    ) {
        $this->SinsCod_salida = $SinsCod_salida;
        $this->SinsCodSede = $SinsCodSede;
        $this->SinsSedNom = $SinsSedNom;
        $this->SinsUsu_usuario = $SinsUsu_usuario;
        $this->SinsFecha_salida = $SinsFecha_salida;
        $this->SinsCant_salida = $SinsCant_salida;
        $this->SinsObservacion = $SinsObservacion;
        $this->SinsFecha_actual = $SinsFecha_actual;
    }

    public function getSinsCod_salida()
    {
        return $this->SinsCod_salida;
    }
    public function getSinsCodSede()
    {
        return $this->SinsCodSede;
    }
    public function getSinsSedNom()
    {
        return $this->SinsSedNom;
    }
    public function getSinsUsu_usuario()
    {
        return $this->SinsUsu_usuario;
    }
    public function getSinsFecha_salida()
    {
        return $this->SinsFecha_salida;
    }
    public function getSinsCant_salida()
    {
        return $this->SinsCant_salida;
    }
    public function getSinsObservacion()
    {
        return $this->SinsObservacion;
    }
    public function getSinsFecha_actual()
    {
        return $this->SinsFecha_actual;
    }
}

class Gestor_Salidains
{

    public function agregarSalidains(Salidains $salidains)
    {
        $Conexion = new Conexion();
        $SinsCodSede = $salidains->getSinsCodSede();
        $SinsSedNom = $salidains->getSinsSedNom();
        $SinsUsu_usuario = $salidains->getSinsUsu_usuario();
        $SinsFecha_salida = $salidains->getSinsFecha_salida();
        $SinsCant_salida = $salidains->getSinsCant_salida();
        $SinsObservacion = $salidains->getSinsObservacion();
        $sql = 'CALL nueva_salida_insumo(:SinsCodSede, :SinsSedNom,:SinsUsu_usuario, :SinsFecha_salida, :SinsCant_salida,:SinsObservacion)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':SinsCodSede' => $SinsCodSede, ':SinsSedNom' => $SinsSedNom, ':SinsUsu_usuario' => $SinsUsu_usuario, ':SinsFecha_salida' => $SinsFecha_salida, ':SinsCant_salida' => $SinsCant_salida, ':SinsObservacion' => $SinsObservacion));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function Modificarsalinsumos(Salidains $salidains)
    {
        $Conexion = new Conexion();
        $SinsCod_salida = $salidains->getSinsCod_salida();
        $SinsCodSede = $salidains->getSinsCodSede();
        $SinsSedNom = $salidains->getSinsSedNom();
        $SinsUsu_usuario = $salidains->getSinsUsu_usuario();
        $SinsFecha_salida = $salidains->getSinsFecha_salida();
        $SinsCant_salida = $salidains->getSinsCant_salida();
        $SinsObservacion = $salidains->getSinsObservacion();
        $sql = 'CALL Modificarsalinsumos(:SinsCodSede, :SinsSedNom,:SinsUsu_usuario, :SinsFecha_salida, :SinsCant_salida,:SinsObservacion, :SinsCod_salida)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':SinsCodSede' => $SinsCodSede, ':SinsSedNom' => $SinsSedNom, ':SinsUsu_usuario' => $SinsUsu_usuario, ':SinsFecha_salida' => $SinsFecha_salida, ':SinsCant_salida' => $SinsCant_salida, ':SinsObservacion' => $SinsObservacion, ':SinsCod_salida' => $SinsCod_salida));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarSalidainsSede()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Insumo_Salida_Sede(:SedID)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function consultarSalidains()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Salida_Insumos()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}

class Solicitud_Insumos
{
    private $Sol_ID;
    private $SolSede;
    private $Sol_usuario;
    private $SolTipo_Insumo;
    private $SolNombre_Insumo;
    private $SolCant_Insumo;
    private $SolFecha_Solicitud;
    private $SolFecha_Actual;

    public function Solicitud_Insumos(
        $Sol_ID,
        $EnfNombre,
        $SolSede,
        $Sol_usuario,
        $SolTipo_Insumo,
        $SolNombre_Insumo,
        $SolCant_Insumo,
        $SolFecha_Solicitud,
        $SolFecha_Actual
    ) {
        $this->Sol_ID = $Sol_ID;
        $this->SolSede = $SolSede;
        $this->Sol_usuario = $Sol_usuario;
        $this->SolTipo_Insumo = $SolTipo_Insumo;
        $this->SolNombre_Insumo = $SolNombre_Insumo;
        $this->SolCant_Insumo = $SolCant_Insumo;
        $this->SolFecha_Solicitud = $SolFecha_Solicitud;
        $this->SolFecha_Actual = $SolFecha_Actual;
    }

    public function getSol_ID()
    {
        return $this->Sol_ID;
    }
    public function getSolSede()
    {
        return $this->SolSede;
    }
    public function getSol_usuario()
    {
        return $this->Sol_usuario;
    }
    public function getSolTipo_Insumo()
    {
        return $this->SolTipo_Insumo;
    }
    public function getSolNombre_Insumo()
    {
        return $this->SolNombre_Insumo;
    }
    public function getSolCant_Insumo()
    {
        return $this->SolCant_Insumo;
    }
    public function getSolFecha_Solicitud()
    {
        return $this->SolFecha_Solicitud;
    }
    public function getSolFecha_Actual()
    {
        return $this->SolFecha_Actual;
    }
}

class Gestor_Solicitud_Insumos
{

    public function agregaSolicitud_Insumos(Solicitud_Insumos $solicitud_insumos)
    {
        $Conexion = new Conexion();
        $Sol_ID = $solicitud_insumos->getSol_ID();
        $SolSede = $solicitud_insumos->getSolSede();
        $Sol_usuario = $solicitud_insumos->getSol_usuario();
        $SolTipo_Insumo = $solicitud_insumos->getSolTipo_Insumo();
        $SolNombre_Insumo = $solicitud_insumos->getSolNombre_Insumo();
        $SolCant_Insumo = $solicitud_insumos->getSolCant_Insumo();
        $SolFecha_Solicitud = $solicitud_insumos->getSolFecha_Solicitud();
        $SolFecha_Actual = $solicitud_insumos->getSolFecha_Actual();
        $sql = 'CALL Nueva_Solicitud_Insumo(:SolSede, :Sol_usuario, :SolTipo_Insumo, :SolNombre_Insumo, :SolCant_Insumo, :SolFecha_Solicitud)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':SolSede' => $SolSede, ':Sol_usuario' => $Sol_usuario, ':SolTipo_Insumo' => $SolTipo_Insumo, ':SolNombre_Insumo' => $SolNombre_Insumo, ':SolCant_Insumo' => $SolCant_Insumo, ':SolFecha_Solicitud' => $SolFecha_Solicitud));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarSolicitudesPendientes()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Solicitud_Pendiente()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function consultarSolicitudInsumoSede()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Solicitud_Insumo_Sede(:SedID)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}

class Despacho
{
    private $DesID;
    private $DesEstado;
    private $DesObservacion;
    private $DesFecha_actual;
    private $DesUsuario;

    public function Despacho($DesID, $DesEstado, $DesObservacion, $DesFecha_actual, $DesUsuario)
    {
        $this->DesID = $DesID;
        $this->DesEstado = $DesEstado;
        $this->DesObservacion = $DesObservacion;
        $this->DesFecha_actual = $DesFecha_actual;
        $this->DesUsuario = $DesUsuario;
    }

    public function getDesID()
    {
        return $this->DesID;
    }
    public function getDesEstado()
    {
        return $this->DesEstado;
    }
    public function getDesObservacion()
    {
        return $this->DesObservacion;
    }
    public function getDesFecha_actual()
    {
        return $this->DesFecha_actual;
    }
    public function getDesUsuario()
    {
        return $this->DesUsuario;
    }
}

class Gestor_Despacho
{

    public function agregaDespacho(Despacho $despacho)
    {
        $Conexion = new Conexion();
        $DesEstado = $despacho->getDesEstado();
        $DesObservacion = $despacho->getDesObservacion();
        $sql = 'CALL Nuevo_Despacho(:DesEstado, :DesObservacion)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':DesEstado' => $DesEstado, ':DesObservacion' => $DesObservacion));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarSolicitudesDespachada()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_despachos()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}

class Ganado
{
    private $GanCod_ganado;
    private $GanCod_sede;
    private $GanSed_ganado;
    private $GanCod_usuario;
    private $GanNombre;
    private $GanColor;
    private $GanRaza;
    private $GanClasificacion;
    private $GanGenero;
    private $GanPeso;
    private $GanPais_origen;
    private $GanNovedad;
    private $GanTraslado;
    private $GanVacuna;
    private $GanEnfermedad;
    private $GanTratamiento;
    private $GanDias_trata;
    private $GanPrecio_comp;
    private $GanPrenez;
    private $GanDias_pren;
    private $GanFecha_compra;
    private $GanFecha_venta;
    private $GanPrecio_venta;
    private $GanFecha_actual;


    public function Ganado(
        $GanCod_ganado,
        $GanCod_sede,
        $GanSed_ganado,
        $GanCod_usuario,
        $GanNombre,
        $GanColor,
        $GanRaza,
        $GanClasificacion,
        $GanGenero,
        $GanPeso,
        $GanPais_origen,
        $GanNovedad,
        $GanTraslado,
        $GanVacuna,
        $GanEnfermedad,
        $GanTratamiento,
        $GanDias_trata,
        $GanPrecio_comp,
        $GanPrenez,
        $GanDias_pren,
        $GanFecha_compra,
        $GanFecha_venta,
        $GanPrecio_venta,
        $GanFecha_actual
    ) {
        $this->GanCod_ganado = $GanCod_ganado;
        $this->GanCod_sede = $GanCod_sede;
        $this->GanSed_ganado = $GanSed_ganado;
        $this->GanCod_usuario = $GanCod_usuario;
        $this->GanNombre = $GanNombre;
        $this->GanColor = $GanColor;
        $this->GanRaza = $GanRaza;
        $this->GanClasificacion = $GanClasificacion;
        $this->GanGenero = $GanGenero;
        $this->GanPeso = $GanPeso;
        $this->GanPais_origen = $GanPais_origen;
        $this->GanNovedad = $GanNovedad;
        $this->GanTraslado = $GanTraslado;
        $this->GanVacuna = $GanVacuna;
        $this->GanEnfermedad = $GanEnfermedad;
        $this->GanTratamiento = $GanTratamiento;
        $this->GanDias_trata = $GanDias_trata;
        $this->GanPrecio_comp = $GanPrecio_comp;
        $this->GanPrenez = $GanPrenez;
        $this->GanDias_pren = $GanDias_pren;
        $this->GanFecha_compra = $GanFecha_compra;
        $this->GanFecha_venta = $GanFecha_venta;
        $this->GanPrecio_venta = $GanPrecio_venta;
        $this->GanFecha_actual = $GanFecha_actual;
    }

    public function getGanCod_ganado()
    {
        return $this->GanCod_ganado;
    }
    public function getGanCod_sede()
    {
        return $this->GanCod_sede;
    }
    public function getGanSed_ganado()
    {
        return $this->GanSed_ganado;
    }
    public function getGanCod_usuario()
    {
        return $this->GanCod_usuario;
    }
    public function getGanNombre()
    {
        return $this->GanNombre;
    }
    public function getGanColor()
    {
        return $this->GanColor;
    }
    public function getGanRaza()
    {
        return $this->GanRaza;
    }
    public function getGanClasificacion()
    {
        return $this->GanClasificacion;
    }
    public function getGanGenero()
    {
        return $this->GanGenero;
    }
    public function getGanPeso()
    {
        return $this->GanPeso;
    }
    public function getGanPais_origen()
    {
        return $this->GanPais_origen;
    }
    public function getGanNovedad()
    {
        return $this->GanNovedad;
    }
    public function getGanTraslado()
    {
        return $this->GanTraslado;
    }
    public function getGanVacuna()
    {
        return $this->GanVacuna;
    }
    public function getGanEnfermedad()
    {
        return $this->GanEnfermedad;
    }
    public function getGanTratamiento()
    {
        return $this->GanTratamiento;
    }
    public function getGanDias_trata()
    {
        return $this->GanDias_trata;
    }
    public function getGanPrecio_comp()
    {
        return $this->GanPrecio_comp;
    }
    public function getGanPrenez()
    {
        return $this->GanPrenez;
    }
    public function getGanDias_pren()
    {
        return $this->GanDias_pren;
    }
    public function getGanFecha_compra()
    {
        return $this->GanFecha_compra;
    }
    public function getGanFecha_venta()
    {
        return $this->GanFecha_venta;
    }
    public function getGanPrecio_venta()
    {
        return $this->GanPrecio_venta;
    }
    public function getGanFecha_actual()
    {
        return $this->GanFecha_actual;
    }
}

class Gestor_Ganado
{

    public function agregarNuevoGanado(Ganado $ganado)
    {
        $Conexion = new Conexion();
        $GanCod_sede = $ganado->getGanCod_sede();
        $GanSed_ganado = $ganado->getGanSed_ganado();
        $GanCod_usuario = $ganado->getGanCod_usuario();
        $GanNombre = $ganado->getGanNombre();
        $GanColor = $ganado->getGanColor();
        $GanRaza = $ganado->getGanRaza();
        $GanClasificacion = $ganado->getGanClasificacion();
        $GanGenero = $ganado->getGanGenero();
        $GanPeso = $ganado->getGanPeso();
        $GanPais_origen = $ganado->getGanPais_origen();
        $GanNovedad = $ganado->getGanNovedad();
        $GanTraslado = $ganado->getGanTraslado();
        $GanVacuna = $ganado->getGanVacuna();
        $GanEnfermedad = $ganado->getGanEnfermedad();
        $GanTratamiento = $ganado->getGanTratamiento();
        $GanDias_trata = $ganado->getGanDias_trata();
        $GanPrecio_comp = $ganado->getGanPrecio_comp();
        $GanPrenez = $ganado->getGanPrenez();
        $GanDias_pren = $ganado->getGanDias_pren();
        $GanFecha_compra = $ganado->getGanFecha_compra();
        $GanFecha_venta = $ganado->getGanFecha_venta();
        $GanPrecio_venta = $ganado->getGanPrecio_venta();
        $sql = 'CALL nuevo_ganado(:GanCod_sede, :GanSed_ganado, :GanCod_usuario, :GanNombre, :GanColor, :GanRaza, :GanClasificacion, :GanGenero, :GanPeso, :GanPais_origen, :GanNovedad, :GanTraslado, :GanVacuna, :GanEnfermedad, :GanTratamiento, :GanDias_trata, :GanPrecio_comp, :GanPrenez, :GanDias_pren, :GanFecha_compra, :GanFecha_venta, :GanPrecio_venta)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':GanCod_sede' => $GanCod_sede, ':GanSed_ganado' => $GanSed_ganado, ':GanCod_usuario' => $GanCod_usuario, ':GanNombre' => $GanNombre, ':GanColor' => $GanColor, ':GanRaza' => $GanRaza, ':GanClasificacion' => $GanClasificacion, ':GanGenero' => $GanGenero, ':GanPeso' => $GanPeso, ':GanPais_origen' => $GanPais_origen, ':GanNovedad' => $GanNovedad, ':GanTraslado' => $GanTraslado, ':GanVacuna' => $GanVacuna, ':GanEnfermedad' => $GanEnfermedad, ':GanTratamiento' => $GanTratamiento, ':GanDias_trata' => $GanDias_trata, ':GanPrecio_comp' => $GanPrecio_comp, ':GanPrenez' => $GanPrenez, ':GanDias_pren' => $GanDias_pren, ':GanFecha_compra' => $GanFecha_compra, ':GanFecha_venta' => $GanFecha_venta, ':GanPrecio_venta' => $GanPrecio_venta,));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado) ? true : false;
    }

    public function consultarListadoGanadoSede()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_ganado_sede(:SedID)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function consultarganado()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Ganado()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function Modificarganado(Ganado $ganado)
    {
        $Conexion = new Conexion();
        $GanCod_ganado = $ganado->getGanCod_ganado();
        $GanNombre = $ganado->getGanNombre();
        $GanColor = $ganado->getGanColor();
        $GanRaza = $ganado->getGanRaza();
        $GanPeso = $ganado->getGanPeso();
        $GanPais_origen = $ganado->getGanPais_origen();
        $GanNovedad = $ganado->getGanNovedad();
        $GanTraslado = $ganado->getGanTraslado();
        $GanVacuna = $ganado->getGanVacuna();
        $GanEnfermedad = $ganado->getGanEnfermedad();
        $GanTratamiento = $ganado->getGanTratamiento();
        $GanDias_trata = $ganado->getGanDias_trata();
        $GanPrecio_comp = $ganado->getGanPrecio_comp();
        $GanPrenez = $ganado->getGanPrenez();
        $GanDias_pren = $ganado->getGanDias_pren();
        $GanFecha_compra = $ganado->getGanFecha_compra();
        $GanFecha_venta = $ganado->getGanFecha_venta();
        $GanPrecio_venta = $ganado->getGanPrecio_venta();
        $sql = 'CALL ModificarGanado( :GanNombre, :GanColor, :GanRaza, :GanPeso, :GanPais_origen, :GanNovedad, :GanTraslado, :GanVacuna,  :GanEnfermedad, :GanTratamiento, :GanDias_trata, :GanPrecio_comp, :GanPrenez, :GanDias_pren, :GanFecha_compra, :GanFecha_venta, :GanPrecio_venta, :GanCod_ganado)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':GanNombre' => $GanNombre, ':GanColor' => $GanColor, ':GanRaza' => $GanRaza, ':GanPeso' => $GanPeso, ':GanPais_origen' => $GanPais_origen, ':GanNovedad' => $GanNovedad, ':GanTraslado' => $GanTraslado, ':GanVacuna' => $GanVacuna, ':GanEnfermedad' => $GanEnfermedad, ':GanTratamiento' => $GanTratamiento, ':GanDias_trata' => $GanDias_trata, ':GanPrecio_comp' => $GanPrecio_comp, ':GanPrenez' => $GanPrenez, ':GanDias_pren' => $GanDias_pren, ':GanFecha_compra' => $GanFecha_compra, ':GanFecha_venta' => $GanFecha_venta, ':GanPrecio_venta' => $GanPrecio_venta, ':GanCod_ganado' => $GanCod_ganado));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);             
        return ($resultado) ? true : false;
    }

    public function eliminarGanado($GanCod_ganado)
    {
        $Conexion = new Conexion();
        $sql = 'CALL eliminar_ganado(:GanCod_ganado)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array('GanCod_ganado' => $GanCod_ganado));
        //$resultado = $consulta->rowCount();
        $resultado = $consulta->errorInfo();
        var_dump($resultado);
        return ($resultado > 0) ? true : false;
    }
}

class Nacimientos
{
    private $NacCod_becerro;
    private $NacNom_becerro;
    private $NacSede;
    private $NacFecha_nacim;
    private $NacNombre_Padre;
    private $NacNombre_Madre;
    private $NacCruce_raza;
    private $NacNovedad;
    private $NacVacuna;
    private $NacTratamiento;
    private $NacTiempo_trat;
    private $NacEnfermedad;
    private $NacNacido_vivo;
    private $NacGenero;
    private $NacPeso;
    private $NacRaza;
    private $NacFecha_actual;
    private $NacUsuario;
    private $NacNsede;

    public function Nacimientos(
        $NacCod_becerro,
        $NacNom_becerro,
        $NacSede,
        $NacFecha_nacim,
        $NacNombre_Padre,
        $NacNombre_Madre,
        $NacCruce_raza,
        $NacNovedad,
        $NacVacuna,
        $NacTratamiento,
        $NacTiempo_trat,
        $NacEnfermedad,
        $NacNacido_vivo,
        $NacGenero,
        $NacPeso,
        $NacRaza,
        $NacFecha_actual,
        $NacUsuario,
        $NacNsede
    ) {
        $this->NacCod_becerro = $NacCod_becerro;
        $this->NacNom_becerro = $NacNom_becerro;
        $this->NacSede = $NacSede;
        $this->NacFecha_nacim = $NacFecha_nacim;
        $this->NacNombre_Padre = $NacNombre_Padre;
        $this->NacNombre_Madre = $NacNombre_Madre;
        $this->NacCruce_raza = $NacCruce_raza;
        $this->NacNovedad = $NacNovedad;
        $this->NacVacuna = $NacVacuna;
        $this->NacTratamiento = $NacTratamiento;
        $this->NacTiempo_trat = $NacTiempo_trat;
        $this->NacEnfermedad = $NacEnfermedad;
        $this->NacNacido_vivo = $NacNacido_vivo;
        $this->NacGenero = $NacGenero;
        $this->NacPeso = $NacPeso;
        $this->NacRaza = $NacRaza;
        $this->NacFecha_actual = $NacFecha_actual;
        $this->NacUsuario = $NacUsuario;
        $this->NacNsede = $NacNsede;
    }

    public function getNacCod_becerro()
    {
        return $this->NacCod_becerro;
    }
    public function getNacNom_becerro()
    {
        return $this->NacNom_becerro;
    }
    public function getNacSede()
    {
        return $this->NacSede;
    }
    public function getNacFecha_nacim()
    {
        return $this->NacFecha_nacim;
    }
    public function getNacNombre_Padre()
    {
        return $this->NacNombre_Padre;
    }
    public function getNacNombre_Madre()
    {
        return $this->NacNombre_Madre;
    }
    public function getNacCruce_raza()
    {
        return $this->NacCruce_raza;
    }
    public function getNacNovedad()
    {
        return $this->NacNovedad;
    }
    public function getNacVacuna()
    {
        return $this->NacVacuna;
    }
    public function getNacTratamiento()
    {
        return $this->NacTratamiento;
    }
    public function getNacTiempo_trat()
    {
        return $this->NacTiempo_trat;
    }
    public function getNacEnfermedad()
    {
        return $this->NacEnfermedad;
    }
    public function getNacNacido_vivo()
    {
        return $this->NacNacido_vivo;
    }
    public function getNacGenero()
    {
        return $this->NacGenero;
    }
    public function getNacPeso()
    {
        return $this->NacPeso;
    }
    public function getNacRaza()
    {
        return $this->NacRaza;
    }
    public function getNacFecha_actual()
    {
        return $this->NacFecha_actual;
    }
    public function getNacUsuario()
    {
        return $this->NacUsuario;
    }
    public function getNacNsede()
    {
        return $this->NacNsede;
    }
}

class Gestor_Nacimientos
{

    public function agregarNacimientos(Nacimientos $nacimientos)
    {
        $Conexion = new Conexion();
        $NacNom_becerro = $nacimientos->getNacNom_becerro();
        $NacSede = $nacimientos->getNacSede();
        $NacFecha_nacim = $nacimientos->getNacFecha_nacim();
        $NacNombre_Padre = $nacimientos->getNacNombre_Padre();
        $NacNombre_Madre = $nacimientos->getNacNombre_Madre();
        $NacCruce_raza = $nacimientos->getNacCruce_raza();
        $NacNovedad = $nacimientos->getNacNovedad();
        $NacVacuna = $nacimientos->getNacVacuna();
        $NacTratamiento = $nacimientos->getNacTratamiento();
        $NacTiempo_trat = $nacimientos->getNacTiempo_trat();
        $NacEnfermedad = $nacimientos->getNacEnfermedad();
        $NacNacido_vivo = $nacimientos->getNacNacido_vivo();
        $NacGenero = $nacimientos->getNacGenero();
        $NacPeso = $nacimientos->getNacPeso();
        $NacRaza = $nacimientos->getNacRaza();
        $NacUsuario = $nacimientos->getNacUsuario();
        $NacNsede = $nacimientos->getNacNsede();
        $sql = 'CALL nuevo_nacimiento(:NacNom_becerro, :NacSede, :NacFecha_nacim, :NacNombre_Padre,
            :NacNombre_Madre, :NacCruce_raza, :NacNovedad, :NacVacuna, :NacTratamiento, :NacTiempo_trat,
            :NacEnfermedad, :NacNacido_vivo, :NacGenero, :NacPeso, :NacRaza, :NacUsuario, :NacNsede)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':NacNom_becerro' => $NacNom_becerro, ':NacSede' => $NacSede, ':NacFecha_nacim' => $NacFecha_nacim, ':NacNombre_Padre' => $NacNombre_Padre, ':NacNombre_Madre' => $NacNombre_Madre, ':NacCruce_raza' => $NacCruce_raza, ':NacNovedad' => $NacNovedad, ':NacVacuna' => $NacVacuna, ':NacTratamiento' => $NacTratamiento, ':NacTiempo_trat' => $NacTiempo_trat, ':NacEnfermedad' => $NacEnfermedad, ':NacNacido_vivo' => $NacNacido_vivo, ':NacGenero' => $NacGenero, ':NacPeso' => $NacPeso, ':NacRaza' => $NacRaza, ':NacUsuario' => $NacUsuario, ':NacNsede' => $NacNsede));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarListadoNacimientoSede()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Nacimientos_Sede(:SedID)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function consultarNacimiento()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Nacimientos()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarNacimientos(Nacimientos $nacimientos)
    {
        $Conexion = new Conexion();
        $NacCod_becerro = $nacimientos->getNacCod_becerro();
        $NacNom_becerro = $nacimientos->getNacNom_becerro();
        $NacSede = $nacimientos->getNacSede();
        $NacFecha_nacim = $nacimientos->getNacFecha_nacim();
        $NacNombre_Padre = $nacimientos->getNacNombre_Padre();
        $NacNombre_Madre = $nacimientos->getNacNombre_Madre();
        $NacCruce_raza = $nacimientos->getNacCruce_raza();
        $NacNovedad = $nacimientos->getNacNovedad();
        $NacVacuna = $nacimientos->getNacVacuna();
        $NacTratamiento = $nacimientos->getNacTratamiento();
        $NacTiempo_trat = $nacimientos->getNacTiempo_trat();
        $NacEnfermedad = $nacimientos->getNacEnfermedad();
        $NacNacido_vivo = $nacimientos->getNacNacido_vivo();
        $NacPeso = $nacimientos->getNacPeso();
        $NacRaza = $nacimientos->getNacRaza();
        $NacUsuario = $nacimientos->getNacUsuario();
        $NacNsede = $nacimientos->getNacNsede();
        $sql = 'CALL modificar_nacimientos(:NacNom_becerro,:NacSede,:NacFecha_nacim,:NacNombre_Padre,
            :NacNombre_Madre,:NacCruce_raza,:NacNovedad,:NacVacuna,:NacTratamiento,:NacTiempo_trat,
            :NacEnfermedad,:NacNacido_vivo,:NacPeso,:NacRaza,:NacUsuario,:NacNsede,:NacCod_becerro)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(
            ':NacNom_becerro' => $NacNom_becerro, ':NacSede' => $NacSede,
            ':NacFecha_nacim' => $NacFecha_nacim, ':NacNombre_Padre' => $NacNombre_Padre,
            ':NacNombre_Madre' => $NacNombre_Madre, ':NacCruce_raza' => $NacCruce_raza,
            ':NacNovedad' => $NacNovedad, ':NacVacuna' => $NacVacuna, ':NacTratamiento' => $NacTratamiento,
            ':NacTiempo_trat' => $NacTiempo_trat, ':NacEnfermedad' => $NacEnfermedad,
            ':NacNacido_vivo' => $NacNacido_vivo, ':NacPeso' => $NacPeso, ':NacRaza' => $NacRaza,
            ':NacUsuario' => $NacUsuario, ':NacNsede' => $NacNsede, ':NacCod_becerro' => $NacCod_becerro
        ));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado);
        return ($resultado) ? true : false;
    }

    public function eliminarNacimiento($NacCod_becerro)
    {
        $Conexion = new Conexion();
        $sql = 'CALL eliminar_nacimiento(:NacCod_becerro)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array('NacCod_becerro' => $NacCod_becerro));
        $resultado = $consulta->rowCount();
        return ($resultado > 0) ? true : false;
    }
}

class Ingresos
{
    private $IngCod_ingreso;
    private $IngCodSede;
    private $IngSedNom;
    private $IngUsuing;
    private $IngTipo_Insumo_Ingreso;
    private $IngNombre_ingreso;
    private $IngFecha_factura;
    private $IngNumero_factura;
    private $IngCantidad_ingreso;
    private $IngValor_iva;
    private $IngValor_descuentos;
    private $IngValor_unitario;
    private $IngValor_factura;
    private $IngFecha_actual;

    public function Ingresos(
        $IngCod_ingreso,
        $IngCodSede,
        $IngSedNom,
        $IngUsuing,
        $IngTipo_Insumo_Ingreso,
        $IngNombre_ingreso,
        $IngFecha_factura,
        $IngNumero_factura,
        $IngCantidad_ingreso,
        $IngValor_iva,
        $IngValor_descuentos,
        $IngValor_unitario,
        $IngValor_factura,
        $IngFecha_actual
    ) {
        $this->IngCod_ingreso = $IngCod_ingreso;
        $this->IngCodSede = $IngCodSede;
        $this->IngSedNom = $IngSedNom;
        $this->IngUsuing = $IngUsuing;
        $this->IngTipo_Insumo_Ingreso = $IngTipo_Insumo_Ingreso;
        $this->IngNombre_ingreso = $IngNombre_ingreso;
        $this->IngFecha_factura = $IngFecha_factura;
        $this->IngNumero_factura = $IngNumero_factura;
        $this->IngCantidad_ingreso = $IngCantidad_ingreso;
        $this->IngValor_iva = $IngValor_iva;
        $this->IngValor_descuentos = $IngValor_descuentos;
        $this->IngValor_unitario = $IngValor_unitario;
        $this->IngValor_factura = $IngValor_factura;
        $this->IngFecha_actual = $IngFecha_actual;
    }

    public function getIngCod_ingreso()
    {
        return $this->IngCod_ingreso;
    }
    public function getIngCodSede()
    {
        return $this->IngCodSede;
    }
    public function getIngSedNom()
    {
        return $this->IngSedNom;
    }
    public function getIngUsuing()
    {
        return $this->IngUsuing;
    }
    public function getIngTipo_Insumo_Ingreso()
    {
        return $this->IngTipo_Insumo_Ingreso;
    }
    public function getIngNombre_ingreso()
    {
        return $this->IngNombre_ingreso;
    }
    public function getIngFecha_factura()
    {
        return $this->IngFecha_factura;
    }
    public function getIngNumero_factura()
    {
        return $this->IngNumero_factura;
    }
    public function getIngCantidad_ingreso()
    {
        return $this->IngCantidad_ingreso;
    }
    public function getIngValor_iva()
    {
        return $this->IngValor_iva;
    }
    public function getIngValor_descuentos()
    {
        return $this->IngValor_descuentos;
    }
    public function getIngValor_unitario()
    {
        return $this->IngValor_unitario;
    }
    public function getIngValor_factura()
    {
        return $this->IngValor_factura;
    }
    public function getIngFecha_actual()
    {
        return $this->IngFecha_actual;
    }
}

class Gestor_Ingresos
{

    public function agregarIngresos(Ingresos $ingresos)
    {
        $Conexion = new Conexion();
        $IngCodSede = $ingresos->getIngCodSede();
        $IngSedNom = $ingresos->getIngSedNom();
        $IngUsuing = $ingresos->getIngUsuing();
        $IngTipo_Insumo_Ingreso = $ingresos->getIngTipo_Insumo_Ingreso();
        $IngNombre_ingreso = $ingresos->getIngNombre_ingreso();
        $IngFecha_factura = $ingresos->getIngFecha_factura();
        $IngNumero_factura = $ingresos->getIngNumero_factura();
        $IngCantidad_ingreso = $ingresos->getIngCantidad_ingreso();
        $IngValor_iva = $ingresos->getIngValor_iva();
        $IngValor_descuentos = $ingresos->getIngValor_descuentos();
        $IngValor_unitario = $ingresos->getIngValor_unitario();
        $IngValor_factura = $ingresos->getIngValor_factura();
        $sql = 'CALL nuevo_ingreso(:IngCodSede, :IngSedNom, :IngUsuing, :IngTipo_Insumo_Ingreso, :IngNombre_ingreso, :IngFecha_factura, :IngNumero_factura, :IngCantidad_ingreso, :IngValor_iva, :IngValor_descuentos, :IngValor_unitario, :IngValor_factura)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':IngCodSede' => $IngCodSede, ':IngSedNom' => $IngSedNom, ':IngUsuing' => $IngUsuing, ':IngTipo_Insumo_Ingreso' => $IngTipo_Insumo_Ingreso, ':IngNombre_ingreso' => $IngNombre_ingreso, ':IngFecha_factura' => $IngFecha_factura, ':IngNumero_factura' => $IngNumero_factura, ':IngCantidad_ingreso' => $IngCantidad_ingreso, ':IngValor_iva' => $IngValor_iva, ':IngValor_descuentos' => $IngValor_descuentos, ':IngValor_unitario' => $IngValor_unitario, ':IngValor_factura' => $IngValor_factura));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado); 
        return ($resultado) ? true : false;
    }

    public function consultarListadoIngresosSede()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Insumo_Ingreso_Sede(:SedID)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function consultarIngresos()
    {
        $Conexion = new Conexion();
        $sql = 'CALL listado_ingresos()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function modificarIngresos(Ingresos $ingresos)
    {
        $Conexion = new Conexion();
        $IngCod_ingreso = $ingresos->getIngCod_ingreso();
        $IngCodSede = $ingresos->getIngCodSede();
        $IngSedNom = $ingresos->getIngSedNom();
        $IngUsuing = $ingresos->getIngUsuing();
        $IngNombre_ingreso = $ingresos->getIngNombre_ingreso();
        $IngNumero_factura = $ingresos->getIngNumero_factura();
        $IngCantidad_ingreso = $ingresos->getIngCantidad_ingreso();
        $IngValor_iva = $ingresos->getIngValor_iva();
        $IngValor_descuentos = $ingresos->getIngValor_descuentos();
        $IngValor_unitario = $ingresos->getIngValor_unitario();
        $IngValor_factura = $ingresos->getIngValor_factura();
        $sql = 'CALL modificar_ingreso(:IngCodSede, :IngSedNom, :IngUsuing,:IngNombre_ingreso, :IngNumero_factura, :IngCantidad_ingreso, :IngValor_iva, :IngValor_descuentos, :IngValor_unitario, :IngValor_factura, :IngCod_ingreso)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':IngCodSede' => $IngCodSede, ':IngSedNom' => $IngSedNom, ':IngUsuing' => $IngUsuing, ':IngNombre_ingreso' => $IngNombre_ingreso, ':IngNumero_factura' => $IngNumero_factura, ':IngCantidad_ingreso' => $IngCantidad_ingreso, ':IngValor_iva' => $IngValor_iva, ':IngValor_descuentos' => $IngValor_descuentos, ':IngValor_unitario' => $IngValor_unitario, ':IngValor_factura' => $IngValor_factura, ':IngCod_ingreso' => $IngCod_ingreso));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        //$resultado = $consulta->errorInfo();
        //var_dump($resultado); 
        return ($resultado) ? true : false;
    }
}

class Insumos
{
    private $InsCod_insumo;
    private $InsCod_usuario;
    private $InsCod_TipoInsumo;
    private $InsTipo_Insumo;
    private $InsNom_insumo;
    private $InsDescr_insumo;
    private $InsSaldo_insumo;
    private $InsFecha_actual;
    private $InsUsuario_insumo;

    public function Insumos(
        $InsCod_insumo,
        $InsCod_usuario,
        $InsCod_TipoInsumo,
        $InsTipo_Insumo,
        $InsNom_insumo,
        $InsDescr_insumo,
        $InsSaldo_insumo,
        $InsFecha_actual,
        $InsUsuario_insumo
    ) {
        $this->InsCod_insumo = $InsCod_insumo;
        $this->InsCod_usuario = $InsCod_usuario;
        $this->InsCod_TipoInsumo = $InsCod_TipoInsumo;
        $this->InsTipo_Insumo = $InsTipo_Insumo;
        $this->InsNom_insumo = $InsNom_insumo;
        $this->InsDescr_insumo = $InsDescr_insumo;
        $this->InsSaldo_insumo = $InsSaldo_insumo;
        $this->InsFecha_actual = $InsFecha_actual;
        $this->InsUsuario_insumo = $InsUsuario_insumo;
    }

    public function getInsCod_insumo()
    {
        return $this->InsCod_insumo;
    }
    public function getInsCod_usuario()
    {
        return $this->InsCod_usuario;
    }
    public function getInsCod_TipoInsumo()
    {
        return $this->InsCod_TipoInsumo;
    }
    public function getInsTipo_Insumo()
    {
        return $this->InsTipo_Insumo;
    }
    public function getInsNom_insumo()
    {
        return $this->InsNom_insumo;
    }
    public function getInsDescr_insumo()
    {
        return $this->InsDescr_insumo;
    }
    public function getInsSaldo_insumo()
    {
        return $this->InsSaldo_insumo;
    }
    public function getInsFecha_actual()
    {
        return $this->InsFecha_actual;
    }
    public function getInsUsuario_insumo()
    {
        return $this->InsUsuario_insumo;
    }
}

class Gestor_Insumos
{

    public function agregarInsumos(Insumos $insumos)
    {
        $Conexion = new Conexion();
        $InsCod_usuario = $insumos->getInsCod_usuario();
        $InsCod_TipoInsumo = $insumos->getInsCod_TipoInsumo();
        $InsTipo_Insumo = $insumos->getInsTipo_Insumo();
        $InsNom_insumo = $insumos->getInsNom_insumo();
        $InsDescr_insumo = $insumos->getInsDescr_insumo();
        $InsSaldo_insumo = $insumos->getInsSaldo_insumo();
        $sql = 'CALL nuevo_insumo(:InsCod_usuario, :InsCod_TipoInsumo, :InsTipo_Insumo, :InsNom_insumo, :InsDescr_insumo, :InsSaldo_insumo)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':InsCod_usuario' => $InsCod_usuario, ':InsCod_TipoInsumo' => $InsCod_TipoInsumo, ':InsTipo_Insumo' => $InsTipo_Insumo, ':InsNom_insumo' => $InsNom_insumo, ':InsDescr_insumo' => $InsDescr_insumo, ':InsSaldo_insumo' => $InsSaldo_insumo));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarListadoInsumos()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Insumos()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}

class Tipo_Insumos
{
    private $tins_ID;
    private $tins_Nombre;

    public function TipoInsumos($tins_ID, $tins_Nombre)
    {
        $this->tins_ID = $tins_ID;
        $this->tins_Nombre = $tins_Nombre;
    }

    public function gettins_ID()
    {
        return $this->tins_ID;
    }
    public function gettins_Nombre()
    {
        return $this->tins_Nombre;
    }
}

class Gestor_TipoInsumos
{

    public function agregarTipoInsumos(Tipo_Insumos $tipoinsumos)
    {
        $Conexion = new Conexion();
        $tins_Nombre = $tipoinsumos->gettins_Nombre();
        $sql = 'CALL Nuevo_Tipo_Insumo(:tins_Nombre)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':tins_Nombre' => $tins_Nombre));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }

    public function consultarTipoInsumo()
    {
        $Conexion = new Conexion();
        $sql = 'CALL Listado_Tipo_Insumo()';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}

class Traslados
{
    private $TraCod_traslado;
    private $TraUsu_traslado;
    private $TraMotivo_traslado;
    private $TraSede_origen;
    private $TraSede_destino;
    private $TraFecha_traslado;
    private $TraFecha_actual;

    public function Traslados(
        $TraCod_traslado,
        $TraUsu_traslado,
        $TraMotivo_traslado,
        $TraSede_origen,
        $TraSede_destino,
        $TraFecha_traslado,
        $TraFecha_actual
    ) {
        $this->TraCod_traslado = $TraCod_traslado;
        $this->TraUsu_traslado = $TraUsu_traslado;
        $this->TraMotivo_traslado = $TraMotivo_traslado;
        $this->TraSede_origen = $TraSede_origen;
        $this->TraSede_destino = $TraSede_destino;
        $this->TraFecha_traslado = $TraFecha_traslado;
        $this->TraFecha_actual = $TraFecha_actual;
    }

    public function getTraCod_traslado()
    {
        return $this->TraCod_traslado;
    }
    public function getTraUsu_traslado()
    {
        return $this->TraUsu_traslado;
    }
    public function getTraMotivo_traslado()
    {
        return $this->TraMotivo_traslado;
    }
    public function getTraSede_origen()
    {
        return $this->TraSede_origen;
    }
    public function getTraSede_destino()
    {
        return $this->TraSede_destino;
    }
    public function getTraFecha_traslado()
    {
        return $this->TraFecha_traslado;
    }
    public function getTraFecha_actual()
    {
        return $this->TraFecha_actual;
    }
}

class Gestor_Traslados
{

    public function agregarTraslados(Traslados $traslados)
    {
        $Conexion = new Conexion();
        $TraUsu_traslado = $traslados->getTraUsu_traslado();
        $TraMotivo_traslado = $traslados->getTraMotivo_traslado();
        $TraSede_origen = $traslados->getTraSede_origen();
        $TraSede_destino = $traslados->getTraSede_destino();
        $TraFecha_traslado = $traslados->getTraFecha_traslado();
        $sql = 'CALL nuevo_traslado(:TraUsu_traslado, :TraMotivo_traslado, :TraSede_origen, :TraSede_destino, :TraFecha_traslado)';
        $consulta = $Conexion->prepare($sql);
        $consulta->execute(array(':TraUsu_traslado' => $TraUsu_traslado, ':TraMotivo_traslado' => $TraMotivo_traslado, ':TraSede_origen' => $TraSede_origen, ':TraSede_destino' => $TraSede_destino, ':TraFecha_traslado' => $TraFecha_traslado));
        $resultado = $consulta->rowCount();
        $id = $Conexion->lastInsertId();
        return ($resultado) ? true : false;
    }
}

class ProveedorSede
{
    private $PsedCod_proveedor;
    private $PsedCod_sede;

    public function ProveedorSede($PsedCod_proveedor, $PsedCod_sede)
    {
        $this->PsedCod_proveedor = $PsedCod_proveedor;
        $this->PsedCod_sede = $PsedCod_sede;
    }

    public function getPsedCod_proveedor()
    {
        return $this->PsedCod_proveedor;
    }
    public function getPsedCod_sede()
    {
        return $this->PsedCod_sede;
    }
}


class controlador
{

    public function agregarusuario(
        $UsuCod_usuario,
        $UsuCod_sede,
        $Usu_Usuario,
        $UsuContrasena,
        $UsuNombre,
        $UsuNombre2,
        $UsuApellido,
        $UsuApellido2,
        $UsuCorreo,
        $UsuIdentificacion,
        $UsuTelefono,
        $UsuRol,
        $UsuEstado
    ) {
        $usuario = new Usuario(
            $UsuCod_usuario,
            $UsuCod_sede,
            $Usu_Usuario,
            $UsuContrasena,
            $UsuNombre,
            $UsuNombre2,
            $UsuApellido,
            $UsuApellido2,
            $UsuCorreo,
            $UsuIdentificacion,
            $UsuTelefono,
            $UsuRol,
            $UsuEstado
        );
        $gestor_Usuario = new Gestor_Usuario();
        $resultado = $gestor_Usuario->agregarusuario($usuario);
        return $resultado;
    }

    public function Modificar_Usuarios(
        $UsuCod_usuario,
        $UsuCod_sede,
        $Usu_Usuario,
        $UsuContrasena,
        $UsuNombre,
        $UsuNombre2,
        $UsuApellido,
        $UsuApellido2,
        $UsuCorreo,
        $UsuIdentificacion,
        $UsuTelefono,
        $UsuRol,
        $UsuEstado
    ) {
        $usuario = new Usuario(
            $UsuCod_usuario,
            $UsuCod_sede,
            $Usu_Usuario,
            $UsuContrasena,
            $UsuNombre,
            $UsuNombre2,
            $UsuApellido,
            $UsuApellido2,
            $UsuCorreo,
            $UsuIdentificacion,
            $UsuTelefono,
            $UsuRol,
            $UsuEstado
        );
        $gestor_usuario = new Gestor_Usuario();
        $resultado = $gestor_usuario->Modificar_Usuarios($usuario);
        return $resultado;
    }

    public function consultarusuarios()
    {
        $gestor_Usuario = new Gestor_Usuario();
        $resultado = $gestor_Usuario->consultarusuarios();
        return $resultado;
    }

    public function eliminarusuario($UsuCod_usuario)
    {
        $gestor_Usuario = new Gestor_Usuario();
        $resultado = $gestor_Usuario->eliminarusuario($UsuCod_usuario);
        return $resultado;
    }

    public function agregarproveedor(
        $ProCod_proveedor,
        $ProNombre_prov,
        $ProDireccion_prov,
        $ProTelefono_prov,
        $ProCiudad_prov,
        $ProPais,
        $ProvCorreo_prov,
        $ProWeb_website,
        $ProRed_facebook,
        $ProRed_twitter,
        $ProRed_instragram,
        $ProTipo_insumo,
        $ProCedulaNIT,
        $ProCre_lineacredito
    ) {
        $proveedor = new Proveedor(
            $ProCod_proveedor,
            $ProNombre_prov,
            $ProDireccion_prov,
            $ProTelefono_prov,
            $ProCiudad_prov,
            $ProPais,
            $ProvCorreo_prov,
            $ProWeb_website,
            $ProRed_facebook,
            $ProRed_twitter,
            $ProRed_instragram,
            $ProTipo_insumo,
            $ProCedulaNIT,
            $ProCre_lineacredito
        );
        $gestor_proveedor = new Gestor_Proveedor();
        $resultado = $gestor_proveedor->agregarproveedor($proveedor);
        return $resultado;
    }

    public function consultarproveedor()
    {
        $gestor_proveedor = new Gestor_Proveedor();
        $resultado = $gestor_proveedor->consultarproveedor();
        return $resultado;
    }

    public function consultarproveedorsede($SedID)
    {
        $gestor_proveedor = new Gestor_Proveedor($SedID);
        $resultado = $gestor_proveedor->consultarproveedor();
        return $resultado;
    }

    public function modificarproveedor(
        $ProCod_proveedor,
        $ProNombre_prov,
        $ProDireccion_prov,
        $ProTelefono_prov,
        $ProCiudad_prov,
        $ProPais,
        $ProvCorreo_prov,
        $ProWeb_website,
        $ProRed_facebook,
        $ProRed_twitter,
        $ProRed_instragram,
        $ProTipo_insumo,
        $ProCedulaNIT,
        $ProCre_lineacredito
    ) {
        $proveedor = new Proveedor(
            $ProCod_proveedor,
            $ProNombre_prov,
            $ProDireccion_prov,
            $ProTelefono_prov,
            $ProCiudad_prov,
            $ProPais,
            $ProvCorreo_prov,
            $ProWeb_website,
            $ProRed_facebook,
            $ProRed_twitter,
            $ProRed_instragram,
            $ProTipo_insumo,
            $ProCedulaNIT,
            $ProCre_lineacredito
        );
        $gestor_proveedor = new Gestor_Proveedor();
        $resultado = $gestor_proveedor->modificarproveedor($proveedor);
        return $resultado;
    }

    public function agregarveterinario(
        $VetCod_veterinario,
        $VetNom_veterinario,
        $VetApe_veterinario,
        $VetDireccion,
        $VetCorreo,
        $VetTelefono,
        $VetTarj_profesional,
        $VetIdentificacion,
        $VetCiudad,
        $VetPais
    ) {
        $veterinario = new Veterinario(
            $VetCod_veterinario,
            $VetNom_veterinario,
            $VetApe_veterinario,
            $VetDireccion,
            $VetCorreo,
            $VetTelefono,
            $VetTarj_profesional,
            $VetIdentificacion,
            $VetCiudad,
            $VetPais
        );
        $gestor_veterinario = new Gestor_Veterinario();
        $resultado = $gestor_veterinario->agregarveterinario($veterinario);
        return $resultado;
    }
    public function consultarveterinario()
    {
        $gestor_veterinario = new Gestor_Veterinario();
        $resultado = $gestor_veterinario->consultarveterinario();
        return $resultado;
    }

    public function modificarveterinario(
        $VetCod_veterinario,
        $VetNom_veterinario,
        $VetApe_veterinario,
        $VetDireccion,
        $VetCorreo,
        $VetTelefono,
        $VetTarj_profesional,
        $VetIdentificacion,
        $VetCiudad,
        $VetPais
    ) {
        $veterinario = new Veterinario(
            $VetCod_veterinario,
            $VetNom_veterinario,
            $VetApe_veterinario,
            $VetDireccion,
            $VetCorreo,
            $VetTelefono,
            $VetTarj_profesional,
            $VetIdentificacion,
            $VetCiudad,
            $VetPais
        );
        $gestor_veterinario = new Gestor_Veterinario();
        $resultado = $gestor_veterinario->modificarveterinario($veterinario);
        return $resultado;
    }

    public function eliminarveterinario($VetCod_veterinario)
    {
        $gestor_Veterinario = new Gestor_Veterinario();
        $resultado = $gestor_Veterinario->eliminarveterinario($VetCod_veterinario);
        return $resultado;
    }

    public function agregarsede($SedID, $SedNombre, $SedDireccion, $SedCiudad, $SedPais)
    {
        $sede = new Sede($SedID, $SedNombre, $SedDireccion, $SedCiudad, $SedPais);
        $gestor_Sede = new Gestor_Sede();
        $resultado = $gestor_Sede->agregarsede($sede);
        return $resultado;
    }

    public function consultarsede()
    {
        $gestor_Sede = new Gestor_Sede();
        $resultado = $gestor_Sede->consultarsede();
        return $resultado;
    }

    public function modificarsede($SedID, $SedNombre, $SedDireccion, $SedCiudad, $SedPais)
    {
        $sede = new Sede($SedID, $SedNombre, $SedDireccion, $SedCiudad, $SedPais);
        $gestor_Sede = new Gestor_Sede();
        $resultado = $gestor_Sede->modificarsede($sede);
        return $resultado;
    }

    public function agregarvacuna(
        $VacCod_vacuna,
        $VacTipo_vacuna,
        $VacLaboratorio,
        $VacNombre_vac,
        $VacFec_ultvac,
        $VacFec_proxvac,
        $VacFec_actual,
        $VacFec_vacuna,
        $VacDosis_vac,
        $VacDosis_sum,
        $VacDosisasum,
        $VacFec_ultpalp,
        $VacFec_proxpalp
    ) {
        $vacuna = new Vacuna(
            $VacCod_vacuna,
            $VacTipo_vacuna,
            $VacLaboratorio,
            $VacNombre_vac,
            $VacFec_ultvac,
            $VacFec_proxvac,
            $VacFec_actual,
            $VacFec_vacuna,
            $VacDosis_vac,
            $VacDosis_sum,
            $VacDosisasum,
            $VacFec_ultpalp,
            $VacFec_proxpalp
        );
        $gestor_Vacuna = new Gestor_Vacuna();
        $resultado = $gestor_Vacuna->agregarvacuna($vacuna);
        return $resultado;
    }

    public function consultarvacuna()
    {
        $gestor_Vacuna = new Gestor_Vacuna();
        $resultado = $gestor_Vacuna->consultarvacuna();
        return $resultado;
    }

    public function modificarvacuna(
        $VacCod_vacuna,
        $VacTipo_vacuna,
        $VacLaboratorio,
        $VacNombre_vac,
        $VacFec_ultvac,
        $VacFec_proxvac,
        $VacFec_actual,
        $VacFec_vacuna,
        $VacDosis_vac,
        $VacDosis_sum,
        $VacDosisasum,
        $VacFec_ultpalp,
        $VacFec_proxpalp
    ) {
        $vacuna = new Vacuna(
            $VacCod_vacuna,
            $VacTipo_vacuna,
            $VacLaboratorio,
            $VacNombre_vac,
            $VacFec_ultvac,
            $VacFec_proxvac,
            $VacFec_actual,
            $VacFec_vacuna,
            $VacDosis_vac,
            $VacDosis_sum,
            $VacDosisasum,
            $VacFec_ultpalp,
            $VacFec_proxpalp
        );
        $gestor_Vacuna = new Gestor_Vacuna();
        $resultado = $gestor_Vacuna->modificarvacuna($vacuna);
        return $resultado;
    }

    public function agregarenfermedad(
        $EnfCod_enfermedad,
        $EnfNombre,
        $EnfDescripcion,
        $EnfTratamiento,
        $EnfDesc_tratamiento,
        $EnfMeses_trata,
        $EnfDias_trata,
        $EnfDias_transc,
        $EnfDias_rest,
        $EnfMuerto,
        $EnfFecha_actual
    ) {
        $enfermedad = new Enfermedad(
            $EnfCod_enfermedad,
            $EnfNombre,
            $EnfDescripcion,
            $EnfTratamiento,
            $EnfDesc_tratamiento,
            $EnfMeses_trata,
            $EnfDias_trata,
            $EnfDias_transc,
            $EnfDias_rest,
            $EnfMuerto,
            $EnfFecha_actual
        );
        $gestor_Enfermedad = new Gestor_Enfermedad();
        $resultado = $gestor_Enfermedad->agregarenfermedad($enfermedad);
        return $resultado;
    }

    public function modificarenfermedad(
        $EnfCod_enfermedad,
        $EnfNombre,
        $EnfDescripcion,
        $EnfTratamiento,
        $EnfDesc_tratamiento,
        $EnfMeses_trata,
        $EnfDias_trata,
        $EnfDias_transc,
        $EnfDias_rest,
        $EnfMuerto,
        $EnfFecha_actual
    ) {
        $enfermedad = new Enfermedad(
            $EnfCod_enfermedad,
            $EnfNombre,
            $EnfDescripcion,
            $EnfTratamiento,
            $EnfDesc_tratamiento,
            $EnfMeses_trata,
            $EnfDias_trata,
            $EnfDias_transc,
            $EnfDias_rest,
            $EnfMuerto,
            $EnfFecha_actual
        );
        $gestor_Enfermedad = new Gestor_Enfermedad();
        $resultado = $gestor_Enfermedad->modificarenfermedad($enfermedad);
        return $resultado;
    }
    public function consultarenfermedad()
    {
        $gestor_Enfermedad = new Gestor_Enfermedad();
        $resultado = $gestor_Enfermedad->consultarenfermedad();
        return $resultado;
    }

    public function agregarnovedad(
        $NovCod_novedad,
        $NovCod_sede,
        $NovSed_ganado,
        $NovUsu_repnovedad,
        $NovDescr_novedad,
        $NovFecha_novedad,
        $NovFecha_actual
    ) {
        $novedad = new Novedad(
            $NovCod_novedad,
            $NovCod_sede,
            $NovSed_ganado,
            $NovUsu_repnovedad,
            $NovDescr_novedad,
            $NovFecha_novedad,
            $NovFecha_actual
        );
        $gestor_novedad = new Gestor_Novedad();
        $resultado = $gestor_novedad->agregarnovedad($novedad);
        return $resultado;
    }

    public function consultarnovedad()
    {
        $gestor_Novedad = new Gestor_Novedad();
        $resultado = $gestor_Novedad->consultarnovedad();
        return $resultado;
    }

    public function modificarnovedades(
        $NovCod_novedad,
        $NovCod_sede,
        $NovSed_ganado,
        $NovUsu_repnovedad,
        $NovDescr_novedad,
        $NovFecha_novedad,
        $NovFecha_actual
    ) {
        $novedad = new Novedad(
            $NovCod_novedad,
            $NovCod_sede,
            $NovSed_ganado,
            $NovUsu_repnovedad,
            $NovDescr_novedad,
            $NovFecha_novedad,
            $NovFecha_actual
        );
        $gestor_novedad = new Gestor_Novedad();
        $resultado = $gestor_novedad->modificarnovedades($novedad);
        return $resultado;
    }

    /*
        public function agregarsalidagan($SalCod_salida,$SalUsu_salida,$SalFecha_salida,
        $SalFecha_actual,$SalMotivo_salida)
        {
            $salidagan = new Salidagan($SalCod_salida,$SalUsu_salida,$SalFecha_salida,
            $SalFecha_actual,$SalMotivo_salida);
            $gestor_Salidagan = new Gestor_Salidagan();
            $resultado = $gestor_Salidagan->agregarSalidagan($salidagan);
            return $resultado;           
        }*/


    public function consultarsalidagansede()
    {
        $gestor_Salidagansede = new Gestor_Salidagan();
        $resultado = $gestor_Salidagansede->consultarsalidagansede();
        return $resultado;
    }

    public function consultarsalidagan()
    {
        $gestor_Salidagan = new Gestor_Salidagan();
        $resultado = $gestor_Salidagan->consultarsalidagan();
        return $resultado;
    }

    public function agregarsalidains(
        $SinsCod_salida,
        $SinsCodSede,
        $SinsSedNom,
        $SinsUsu_usuario,
        $SinsFecha_salida,
        $SinsCant_salida,
        $SinsObservacion,
        $SinsFecha_actual
    ) {
        $salidains = new Salidains(
            $SinsCod_salida,
            $SinsCodSede,
            $SinsSedNom,
            $SinsUsu_usuario,
            $SinsFecha_salida,
            $SinsCant_salida,
            $SinsObservacion,
            $SinsFecha_actual
        );
        $gestor_Salidains = new Gestor_Salidains();
        $resultado = $gestor_Salidains->agregarsalidains($salidains);
        return $resultado;
    }

    public function consultarsalidainssede()
    {
        $gestor_Salidainssede = new Gestor_Salidains();
        $resultado = $gestor_Salidainssede->consultarsalidainssede();
        return $resultado;
    }

    public function consultarsalidains()
    {
        $gestor_Salidains = new Gestor_Salidains();
        $resultado = $gestor_Salidains->consultarsalidains();
        return $resultado;
    }

    public function Modificarsalinsumos(
        $SinsCod_salida,
        $SinsCodSede,
        $SinsSedNom,
        $SinsUsu_usuario,
        $SinsFecha_salida,
        $SinsCant_salida,
        $SinsObservacion,
        $SinsFecha_actual
    ) {
        $salidains = new Salidains(
            $SinsCod_salida,
            $SinsCodSede,
            $SinsSedNom,
            $SinsUsu_usuario,
            $SinsFecha_salida,
            $SinsCant_salida,
            $SinsObservacion,
            $SinsFecha_actual
        );
        $gestor_Salidains = new Gestor_Salidains();
        $resultado = $gestor_Salidains->Modificarsalinsumos($salidains);
        return $resultado;
    }

    /*
        public function agregarsolicitud_insumos($Sol_ID,$EnfNombre,$SolSede,$Sol_usuario,$SolTipo_Insumo,
        $SolNombre_Insumo,$SolCant_Insumo,$SolFecha_Solicitud,$SolFecha_Actual)
        {
            $solicitud_insumos = new Solicitud_Insumos($Sol_ID,$EnfNombre,$SolSede,$Sol_usuario,$SolTipo_Insumo,
            $SolNombre_Insumo,$SolCant_Insumo,$SolFecha_Solicitud,$SolFecha_Actual);
            $gestor_Solicitud_Insumos = new Gestor_Solicitud_Insumos();
            $resultado = $gestor_Solicitud_Insumos->agregarsolicitud_insumos($solicitud_insumos);
            return $resultado;           
        }*/

    public function consultarsolicitudespendientes()
    {
        $gestor_Solicitud_Insumos = new Gestor_Solicitud_Insumos();
        $resultado = $gestor_Solicitud_Insumos->consultarsolicitudespendientes();
        return $resultado;
    }

    public function consultarsolicitudinsumosede()
    {
        $gestor_Solicitud_Insumos = new Gestor_Solicitud_Insumos();
        $resultado = $gestor_Solicitud_Insumos->consultarsolicitudinsumosede();
        return $resultado;
    }

    /*public function agregardespacho($DesID,$DesEstado,$DesObservacion,$DesFecha_actual,$DesUsuario)
        {
            $despacho = new Despacho($DesID,$DesEstado,$DesObservacion,$DesFecha_actual,$DesUsuario);
            $gestor_Despacho = new Gestor_Despacho();
            $resultado = $gestor_Despacho->agregardespacho($despacho);
            return $resultado;             
        }*/

    public function consultarsolicitudesdespachada()
    {
        $gestor_Despacho = new Gestor_Despacho();
        $resultado = $gestor_Despacho->consultarsolicitudesdespachada();
        return $resultado;
    }

    public function agregarnuevoganado(
        $GanCod_ganado,
        $GanCod_sede,
        $GanSed_ganado,
        $GanCod_usuario,
        $GanNombre,
        $GanColor,
        $GanRaza,
        $GanClasificacion,
        $GanGenero,
        $GanPeso,
        $GanPais_origen,
        $GanNovedad,
        $GanTraslado,
        $GanVacuna,
        $GanEnfermedad,
        $GanTratamiento,
        $GanDias_trata,
        $GanPrecio_comp,
        $GanPrenez,
        $GanDias_pren,
        $GanFecha_compra,
        $GanFecha_venta,
        $GanPrecio_venta,
        $GanFecha_actual
    ) {
        $ganado = new Ganado(
            $GanCod_ganado,
            $GanCod_sede,
            $GanSed_ganado,
            $GanCod_usuario,
            $GanNombre,
            $GanColor,
            $GanRaza,
            $GanClasificacion,
            $GanGenero,
            $GanPeso,
            $GanPais_origen,
            $GanNovedad,
            $GanTraslado,
            $GanVacuna,
            $GanEnfermedad,
            $GanTratamiento,
            $GanDias_trata,
            $GanPrecio_comp,
            $GanPrenez,
            $GanDias_pren,
            $GanFecha_compra,
            $GanFecha_venta,
            $GanPrecio_venta,
            $GanFecha_actual
        );
        $gestor_Ganado = new Gestor_Ganado();
        $resultado = $gestor_Ganado->agregarnuevoganado($ganado);
        return $resultado;
    }

    public function consultarlistadoganadosede()
    {
        $gestor_Ganado = new Gestor_Ganado();
        $resultado = $gestor_Ganado->consultarlistadoganadosede();
        return $resultado;
    }

    public function consultarganado()
    {
        $gestor_Ganado = new Gestor_Ganado();
        $resultado = $gestor_Ganado->consultarganado();
        return $resultado;
    }

    public function Modificarganado(
        $GanCod_ganado,
        $GanCod_sede,
        $GanSed_ganado,
        $GanCod_usuario,
        $GanNombre,
        $GanColor,
        $GanRaza,
        $GanClasificacion,
        $GanGenero,
        $GanPeso,
        $GanPais_origen,
        $GanNovedad,
        $GanTraslado,
        $GanVacuna,
        $GanEnfermedad,
        $GanTratamiento,
        $GanDias_trata,
        $GanPrecio_comp,
        $GanPrenez,
        $GanDias_pren,
        $GanFecha_compra,
        $GanFecha_venta,
        $GanPrecio_venta,
        $GanFecha_actual
    ) {
        $ganado = new Ganado(
            $GanCod_ganado,
            $GanCod_sede,
            $GanSed_ganado,
            $GanCod_usuario,
            $GanNombre,
            $GanColor,
            $GanRaza,
            $GanClasificacion,
            $GanGenero,
            $GanPeso,
            $GanPais_origen,
            $GanNovedad,
            $GanTraslado,
            $GanVacuna,
            $GanEnfermedad,
            $GanTratamiento,
            $GanDias_trata,
            $GanPrecio_comp,
            $GanPrenez,
            $GanDias_pren,
            $GanFecha_compra,
            $GanFecha_venta,
            $GanPrecio_venta,
            $GanFecha_actual
        );
        $gestor_Ganado = new Gestor_Ganado();
        $resultado = $gestor_Ganado->Modificarganado($ganado);
        return $resultado;
    }

    public function eliminarganado($GanCod_ganado)
    {
        $gestor_ganado = new Gestor_Ganado();
        $resultado = $gestor_ganado->eliminarganado($GanCod_ganado);
        return $resultado;
    }

    public function agregarnacimientos(
        $NacCod_becerro,
        $NacNom_becerro,
        $NacSede,
        $NacFecha_nacim,
        $NacNombre_Padre,
        $NacNombre_Madre,
        $NacCruce_raza,
        $NacNovedad,
        $NacVacuna,
        $NacTratamiento,
        $NacTiempo_trat,
        $NacEnfermedad,
        $NacNacido_vivo,
        $NacGenero,
        $NacPeso,
        $NacRaza,
        $NacFecha_actual,
        $NacUsuario,
        $NacNsede
    ) {
        $nacimientos = new Nacimientos(
            $NacCod_becerro,
            $NacNom_becerro,
            $NacSede,
            $NacFecha_nacim,
            $NacNombre_Padre,
            $NacNombre_Madre,
            $NacCruce_raza,
            $NacNovedad,
            $NacVacuna,
            $NacTratamiento,
            $NacTiempo_trat,
            $NacEnfermedad,
            $NacNacido_vivo,
            $NacGenero,
            $NacPeso,
            $NacRaza,
            $NacFecha_actual,
            $NacUsuario,
            $NacNsede
        );
        $gestor_Nacimientos = new Gestor_Nacimientos();
        $resultado = $gestor_Nacimientos->agregarnacimientos($nacimientos);
        return $resultado;
    }

    public function consultarlistadonacimientosede()
    {
        $gestor_Nacimientos = new Gestor_Nacimientos();
        $resultado = $gestor_Nacimientos->consultarlistadonacimientosede();
        return $resultado;
    }

    public function consultarnacimiento()
    {
        $gestor_nacimientos = new Gestor_Nacimientos();
        $resultado = $gestor_nacimientos->consultarnacimiento();
        return $resultado;
    }

    public function modificarnacimientos(
        $NacCod_becerro,
        $NacNom_becerro,
        $NacSede,
        $NacFecha_nacim,
        $NacNombre_Padre,
        $NacNombre_Madre,
        $NacCruce_raza,
        $NacNovedad,
        $NacVacuna,
        $NacTratamiento,
        $NacTiempo_trat,
        $NacEnfermedad,
        $NacNacido_vivo,
        $NacGenero,
        $NacPeso,
        $NacRaza,
        $NacFecha_actual,
        $NacUsuario,
        $NacNsede
    ) {
        $nacimientos = new Nacimientos(
            $NacCod_becerro,
            $NacNom_becerro,
            $NacSede,
            $NacFecha_nacim,
            $NacNombre_Padre,
            $NacNombre_Madre,
            $NacCruce_raza,
            $NacNovedad,
            $NacVacuna,
            $NacTratamiento,
            $NacTiempo_trat,
            $NacEnfermedad,
            $NacNacido_vivo,
            $NacGenero,
            $NacPeso,
            $NacRaza,
            $NacFecha_actual,
            $NacUsuario,
            $NacNsede
        );
        $gestor_Nacimientos = new Gestor_Nacimientos();
        $resultado = $gestor_Nacimientos->modificarnacimientos($nacimientos);
        return $resultado;
    }

    public function eliminarnacimiento($NacCod_becerro)
    {
        $gestor_Nacimiento = new Gestor_Nacimientos();
        $resultado = $gestor_Nacimiento->eliminarnacimiento($NacCod_becerro);
        return $resultado;
    }

    public function agregaringresos(
        $IngCod_ingreso,
        $IngCodSede,
        $IngSedNom,
        $IngUsuing,
        $IngTipo_Insumo_Ingreso,
        $IngNombre_ingreso,
        $IngFecha_factura,
        $IngNumero_factura,
        $IngCantidad_ingreso,
        $IngValor_iva,
        $IngValor_descuentos,
        $IngValor_unitario,
        $IngValor_factura,
        $IngFecha_actual
    ) {
        $ingresos = new Ingresos(
            $IngCod_ingreso,
            $IngCodSede,
            $IngSedNom,
            $IngUsuing,
            $IngTipo_Insumo_Ingreso,
            $IngNombre_ingreso,
            $IngFecha_factura,
            $IngNumero_factura,
            $IngCantidad_ingreso,
            $IngValor_iva,
            $IngValor_descuentos,
            $IngValor_unitario,
            $IngValor_factura,
            $IngFecha_actual
        );
        $gestor_Ingresos = new Gestor_Ingresos();
        $resultado = $gestor_Ingresos->agregaringresos($ingresos);
        return $resultado;
    }

    public function consultarlistadoingresossede()
    {
        $gestor_Ingresos = new Gestor_Ingresos();
        $resultado = $gestor_Ingresos->consultarlistadoingresossede();
        return $resultado;
    }

    public function consultaringresos()
    {
        $gestor_Ingresos = new Gestor_Ingresos();
        $resultado = $gestor_Ingresos->consultaringresos();
        return $resultado;
    }

    public function modificaringresos(
        $IngCod_ingreso,
        $IngCodSede,
        $IngSedNom,
        $IngUsuing,
        $IngTipo_Insumo_Ingreso,
        $IngNombre_ingreso,
        $IngFecha_factura,
        $IngNumero_factura,
        $IngCantidad_ingreso,
        $IngValor_iva,
        $IngValor_descuentos,
        $IngValor_unitario,
        $IngValor_factura,
        $IngFecha_actual
    ) {
        $ingresos = new Ingresos(
            $IngCod_ingreso,
            $IngCodSede,
            $IngSedNom,
            $IngUsuing,
            $IngTipo_Insumo_Ingreso,
            $IngNombre_ingreso,
            $IngFecha_factura,
            $IngNumero_factura,
            $IngCantidad_ingreso,
            $IngValor_iva,
            $IngValor_descuentos,
            $IngValor_unitario,
            $IngValor_factura,
            $IngFecha_actual
        );
        $gestor_Ingresos = new Gestor_Ingresos();
        $resultado = $gestor_Ingresos->modificaringresos($ingresos);
        return $resultado;
    }

    public function agregarinsumos(
        $InsCod_insumo,
        $InsCod_usuario,
        $InsCod_TipoInsumo,
        $InsTipo_Insumo,
        $InsNom_insumo,
        $InsDescr_insumo,
        $InsSaldo_insumo,
        $InsFecha_actual,
        $InsUsuario_insumo
    ) {
        $insumos = new Insumos(
            $InsCod_insumo,
            $InsCod_usuario,
            $InsCod_TipoInsumo,
            $InsTipo_Insumo,
            $InsNom_insumo,
            $InsDescr_insumo,
            $InsSaldo_insumo,
            $InsFecha_actual,
            $InsUsuario_insumo
        );
        $gestor_Insumos = new Gestor_Insumos();
        $resultado = $gestor_Insumos->agregarinsumos($insumos);
        return $resultado;
    }

    public function consultarlistadoinsumos()
    {
        $gestor_Insumos = new Gestor_Insumos();
        $resultado = $gestor_Insumos->consultarlistadoinsumos();
        return $resultado;
    }

    public function agregartipoinsumos($tins_ID, $tins_Nombre)
    {
        $tipoinsumos = new Tipo_Insumos($tins_ID, $tins_Nombre);
        $gestor_TipoInsumos = new Gestor_Tipoinsumos();
        $resultado = $gestor_TipoInsumos->agregartipoinsumos($tipoinsumos);
        return $resultado;
    }

    public function consultartipoinsumo()
    {
        $gestor_tipoinsumos = new Gestor_TipoInsumos();
        $resultado = $gestor_tipoinsumos->consultartipoinsumo();
        return $resultado;
    }

    public function agregartraslados(
        $TraCod_traslado,
        $TraUsu_traslado,
        $TraMotivo_traslado,
        $TraSede_origen,
        $TraSede_destino,
        $TraFecha_traslado,
        $TraFecha_actual
    ) {
        $traslados = new Traslados(
            $TraCod_traslado,
            $TraUsu_traslado,
            $TraMotivo_traslado,
            $TraSede_origen,
            $TraSede_destino,
            $TraFecha_traslado,
            $TraFecha_actual
        );
        $gestor_Traslados = new Gestor_Traslados();
        $resultado = $gestor_Traslados->agregartraslados($traslados);
        return $resultado;
    }


    public function limpiarDatos($datos)
    {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        if (gettype($datos) == 'string') {
            $datos = filter_var($datos, FILTER_SANITIZE_STRING);
        }
        return $datos;
    }

    public function encriptar($UsuContrasena)
    {
        $UsuContrasena = hash('sha512', $UsuContrasena);
        //var_dump($UsuContrasena);  
        return $UsuContrasena;
        //echo $UsuContrasena;
    }

    public function validarusuario($usuide, $usucon)
    {
        $loguin = new Loguin($usuide, $usucon);
        $gestorloguin = new GestorLoguin();
        $resultado = $gestorloguin->validarusuario($loguin);
        return $resultado;
    }

    public function comprobarsesion()
    {
        if (!isset($_SESSION['usu'])) {
            return false;
        } else {
            return true;
        }
    }

    public function variablesesion()
    {
        $_SESSION['id'];
        $_SESSION['doc'];
        $_SESSION['cod'];
        $_SESSION['sed'];
        $_SESSION['usu'];
        $_SESSION['nom'];
        $_SESSION['ape'];
        $_SESSION['rol'];
        $_SESSION['est'];
    }
}
