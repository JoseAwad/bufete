<?php
class Abogado {
    
    var  $id;
    var  $rutNumero;
    var  $nombreCompleto;
    var  $fechaContratacion;
    var  $valorHora;

    public static function fromJson($json) {
        $data = json_decode($json, true);
        $u = new Abogado();
        foreach ($data AS $key => $value) {
            $u->{$key} = $value;
        }
        return $u;
    }
    
    public static function crear($rutNumero, $nombreCompleto, $fechaContratacion, $valorHora){
        $conn = BD::conn();
        $sql = "insert into abogados(rutNumero, nombreCompleto, fechaContratacion, valorHora) values(:rutNumero, :nombreCompleto, :fechaContratacion, :valorHora)";
        $rs = $conn->prepare($sql);
        $exito = $rs->execute(array(':rutNumero' => $rutNumero, 
                                    ":nombreCompleto" => $nombreCompleto, 
                                    ":fechaContratacion" => $fechaContratacion, 
                                    ":valorHora" => $valorHora));
        if ($exito) {
            $rs = $conn->query("select LAST_INSERT_ID()")->fetch();
            $id = $rs[0];
            $obj = new Abogado();
            $obj->id = $id;
            $obj->rutNumero = $rutNumero;
            $obj->nombreCompleto = $nombreCompleto;
            $obj->fechaContratacion = $fechaContratacion;
            $obj->valorHora = $valorHora;
            return $obj;
        } else {
            return null;
        }

    }

    public static function actualizar($id,$nombreCompleto, $valorHora){
        $conn = BD::conn();
        $sql = "update abogados set nombreCompleto = :nombreCompleto, valorHora = :valorHora where id = :id";
        $rs = $conn->prepare($sql);
        return $rs->execute(array(':nombreCompleto' => $nombreCompleto, 
                                    ":valorHora" => $valorHora));

    }

    public static function buscarPorId($id) {
        $conn = BD::conn();
        $sql = "select * from abogados where id = ".$id;
        $rs = $conn->query($sql);
        if ($rs) {
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            $obj = new Abogado();
            $obj->id = $row["id"];
            $obj->rutNumero = $row["rutNumero"];
            $obj->nombreCompleto = $row["nombreCompleto"];
            $obj->fechaContratacion = $row["fechaContratacion"];
            $obj->valorHora = $row["valorHora"];
            return $obj;
        } else {
            return null;
        }
    }

    public static function buscarTodos() {
        $conn = BD::conn();
        $sql = "select * from abogados";
        $rs = $conn->query($sql);
        if ($rs) {
            $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            foreach ($rows as &$row) {
                $obj = new Abogado();
                $obj->id = $row["id"];
                $obj->rutNumero = $row["rutNumero"];
                $obj->nombreCompleto = $row["nombreCompleto"];
                $obj->fechaContratacion = $row["fechaContratacion"];
                $obj->valorHora = $row["valorHora"];
                array_push($arr, $obj);
            }
            return $arr;
        } else {
            return null;
        }
    }

    public static function borrar($id) {
        $conn = BD::conn();
        $sql = "delete from abogados where id = :id";
        $rs = $conn->prepare($sql);
        if ($rs->execute(array(":id" => $id))) {
            return true;
        } else {
            return false;
        }
    }

}
?>