<?php
class Abogado {
    
    var  $id;
    var  $rutNumero;
    var  $nombreCompleto;
    var  $fechaContratacion;
    var  $valorHora;
    var  $estado;

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
        $sql = "insert into abogados(rutNumero, nombreCompleto, fechaContratacion, valorHora, estado) values(:rutNumero, :nombreCompleto, :fechaContratacion, :valorHora, :estado)";
        $rs = $conn->prepare($sql);
        $exito = $rs->execute(array(':rutNumero' => $rutNumero, 
                                    ":nombreCompleto" => $nombreCompleto, 
                                    ":fechaContratacion" => $fechaContratacion, 
                                    ":valorHora" => $valorHora,
                                    ":estado" => 1));
        if ($exito) {
            $rs = $conn->query("select LAST_INSERT_ID()")->fetch();
            $id = $rs[0];
            $obj = new Abogado();
            $obj->id = $id;
            $obj->rutNumero = $rutNumero;
            $obj->nombreCompleto = $nombreCompleto;
            $obj->fechaContratacion = $fechaContratacion;
            $obj->valorHora = $valorHora;
            $obj->estado = 0;
            return $obj;
        } else {
            return null;
        }

    }

    public static function despedir($id){
        $conn = BD::conn();
        $sql = "update abogados set estado = 2 where id = :id";
        $rs = $conn->prepare($sql);
        return $rs->execute(array(':id' => $id ));

    }

    public static function actualizar($id,$nombreCompleto, $valorHora){
        $conn = BD::conn();
        $sql = "update abogados set nombreCompleto = :nombreCompleto, valorHora = :valorHora where id = :id";
        $rs = $conn->prepare($sql);
        return $rs->execute(array(':nombreCompleto' => $nombreCompleto, 
                                  ":valorHora" => $valorHora,
                                  ":id" => $id));

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
            $obj->estado = $row["estado"];
            return $obj;
        } else {
            return null;
        }
    }

    public static function buscarTodos($rutNumero, $nombreCompleto, $estado) {
        $conn = BD::conn();
        $sql = "select * from abogados";
        if (!empty($rutNumero) || !empty($nombreCompleto) || $estado > 0) {
            $sqlWhere = array();
            if (!empty($rutNumero)) {
                array_push($sqlWhere, " rutNumero = ".$rutNumero);      
            }
            if (!empty($nombreCompleto)) {
                array_push($sqlWhere, " nombreCompleto like '".$nombreCompleto."'");
            }
            if ($estado > 0) {
                array_push($sqlWhere, " estado = ".$estado);
            }
            $sql = $sql." where ".implode(" and ", $sqlWhere);
        }
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
                $obj->estado = $row["estado"];
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