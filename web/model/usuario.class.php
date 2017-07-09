<?php 
  class Usuario {

    public static $TIPO_JURIDICO = 'J';
    public static $TIPO_NATURAL = 'N';

    public static $PERFIL_GERENTE = 'GERENTE';
    public static $PERFIL_ADMINISTRADOR = 'ADMINISTRADOR';
    public static $PERFIL_SECRETARIA = 'SECRETARIA';
    public static $PERFIL_CLIENTE = 'CLIENTE';
        
    var $id;
    var $rutNumero;
    var $nombreCompleto;
    var $fechaIncorporacion;
    var $tipoUsuario;
    var $direccion;
    var $telefonoCelular;
    var $telefonoFijo;
    var $perfil;
    var $clave;
    
    public static function fromJson($json) {
        $data = json_decode($json, true);
        $u = new Usuario();
        foreach ($data AS $key => $value) {
            $u->{$key} = $value;
        }
        return $u;
    }

    public static function crear($rutNumero, $nombreCompleto, $fechaIncorporacion, $tipoUsuario, $direccion, $telefonoCelular, $telefonoFijo, $perfil, $clave) {
        
        $u = Usuario::buscarPorRutNumero($rutNumero);
        if ($u != null) {
            return $u;
        }

        $conn = BD::conn();
        $clave_encriptada=password_hash($clave, PASSWORD_DEFAULT);
        $sql = "insert into usuarios(rutNumero, nombreCompleto, fechaIncorporacion, tipoUsuario, direccion, telefonoCelular, telefonoFijo, perfil, clave) values(:rutNumero, :nombreCompleto, :fechaIncorporacion, :tipoUsuario, :direccion, :telefonoCelular, :telefonoFijo, :perfil, :clave)";
        $rs = $conn->prepare($sql);
        $exito = $rs->execute(array(':rutNumero' => $rutNumero, 
                                    ":nombreCompleto" => $nombreCompleto, 
                                    ":fechaIncorporacion" => $fechaIncorporacion, 
                                    ":tipoUsuario" => $tipoUsuario,
                                    ":direccion" => $direccion,
                                    ":telefonoCelular" => $telefonoCelular,
                                    ":telefonoFijo" => $telefonoFijo,
                                    ":perfil" => $perfil,
                                    ":clave" => $clave_encriptada));
        if ($exito) {
            $rs = $conn->query("select LAST_INSERT_ID()")->fetch();
            $id = $rs[0];
            $obj = new Usuario();
            $obj->id = $id;
            $obj->rutNumero = $rutNumero;
            $obj->nombreCompleto = $nombreCompleto;
            $obj->fechaIncorporacion = $fechaIncorporacion;
            $obj->tipoUsuario = $tipoUsuario;
            $obj->direccion = $direccion;
            $obj->telefonoCelular = $telefonoCelular;
            $obj->telefonoFijo = $telefonoFijo;
            $obj->perfil = $perfil;
            $obj->clave = $clave_encriptada;
            return $obj;
        } else {
            return null;
        }
    }

    public static function actualizar($id, $nombreCompleto, $tipoUsuario, $direccion, $telefonoCelular, $telefonoFijo, $perfil, $clave) {
        $conn = BD::conn();
        $sql = "update usuarios set nombreCompleto = :nombreCompleto, tipoUsuario = :tipoUsuario, direccion = :direccion, telefonoCelular = :telefonoCelular, telefonoFijo = :telefonoFijo, perfil = :perfil, clave = :clave where id = :id";
        $rs = $conn->prepare($sql);
        return $rs->execute(array(':nombreCompleto' => $nombreCompleto, 
                                    ":tipoUsuario" => $tipoUsuario,
                                    ":direccion" => $direccion,
                                    ":telefonoCelular" => $telefonoCelular,
                                    ":telefonoFijo" => $telefonoFijo,
                                    ":perfil" => $perfil,
                                    ":clave" => $clave,
                                    ":id" => $id));

    }

    public static function buscarPorRutNumero($rutNumero) {
        $conn = BD::conn();
        $sql = "select * from usuarios where rutNumero = ".$rutNumero;
        $rs = $conn->query($sql);
        if ($rs) {
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            if ($row["id"]=="") {
                return null;
            }
            $obj = new Usuario();
            $obj->id = $row["id"];
            $obj->rutNumero = $row["rutNumero"];
            $obj->nombreCompleto = $row["nombreCompleto"];
            $obj->fechaIncorporacion = $row["fechaIncorporacion"];
            $obj->tipoUsuario = $row["tipoUsuario"];
            $obj->direccion = $row["direccion"];
            $obj->telefonoCelular = $row["telefonoCelular"];
            $obj->telefonoFijo = $row["telefonoFijo"];
            $obj->perfil = $row["perfil"];
            $obj->clave = $row["clave"];
            return $obj;
        } else {
            return null;
        }
    }

    public static function buscarPorId($id) {
        $conn = BD::conn();
        $sql = "select * from usuarios where id = ".$id;
        $rs = $conn->query($sql);
        if ($rs) {
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            if ($row["id"]=="") {
                return null;
            }
            $obj = new Usuario();
            $obj->id = $row["id"];
            $obj->rutNumero = $row["rutNumero"];
            $obj->nombreCompleto = $row["nombreCompleto"];
            $obj->fechaIncorporacion = $row["fechaIncorporacion"];
            $obj->tipoUsuario = $row["tipoUsuario"];
            $obj->direccion = $row["direccion"];
            $obj->telefonoCelular = $row["telefonoCelular"];
            $obj->telefonoFijo = $row["telefonoFijo"];
            $obj->perfil = $row["perfil"];
            $obj->clave = $row["clave"];
            return $obj;
        } else {
            return null;
        }
    }

    public static function buscarTodos() {
        $conn = BD::conn();
        $sql = "select * from usuarios";
        $rs = $conn->query($sql);
        if ($rs) {
            $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            foreach ($rows as &$row) {
                $obj = new Usuario();
                $obj->id = $row["id"];
                $obj->rutNumero = $row["rutNumero"];
                $obj->nombreCompleto = $row["nombreCompleto"];
                $obj->fechaIncorporacion = $row["fechaIncorporacion"];
                $obj->tipoUsuario = $row["tipoUsuario"];
                $obj->direccion = $row["direccion"];
                $obj->telefonoCelular = $row["telefonoCelular"];
                $obj->telefonoFijo = $row["telefonoFijo"];
                $obj->perfil = $row["perfil"];
                $obj->clave = $row["clave"];
                array_push($arr, $obj);
            }
            return $arr;
        } else {
            return null;
        }
    }

    public static function borrar($id) {
        $conn = BD::conn();
        $sql = "delete from usuarios where id = :id";
        $rs = $conn->prepare($sql);
        if ($rs->execute(array(":id" => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public static function validarClave($rutNumero,$clave){
        $conn = BD::conn();
        $sql="SELECT clave FROM usuarios WHERE rutNumero=".$rutNumero;
        $rs=$conn->query($sql);
        if($rs){
            $row=$rs->fetch(PDO::FETCH_ASSOC);
            if (password_verify($clave, $row['clave'])) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
        
    }
  }

?>