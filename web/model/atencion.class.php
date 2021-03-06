<?php
class Atencion {

    public static $ESTADO_AGENDADA="AGENDADA";
    public static $ESTADO_CONFIRMADA="CONFIRMADA";
    public static $ESTADO_ANULADA="ANULADA";
    public static $ESTADO_PERDIDA="PERDIDA";
    public static $ESTADO_REALIZADA="REALIZADA";

    var $id;
    var $fechaHora;
    var $idAbogados;
    var $idUsuarios;
    var $estado;
    var $valor;

    public static function fromJson($json) {
        $data = json_decode($json, true);
        $u = new Atencion();
        foreach ($data AS $key => $value) {
            $u->{$key} = $value;
        }
        return $u;
    }

    public static function crear($fechaHora, $idAbogados, $idUsuarios, $estado, $valor){
        $conn = BD::conn();
        $sql = "insert into atenciones(fechaHora, idAbogados, idUsuarios, estado, valor) values(:fechaHora, :idAbogados, :idUsuarios, :estado, :valor)";
        $rs = $conn->prepare($sql);
        $exito = $rs->execute(array(':fechaHora' => $fechaHora, 
                                    ":idAbogados" => $idAbogados, 
                                    ":idUsuarios" => $idUsuarios, 
                                    ":estado" => $estado,
                                    ":valor" => $valor));
        if ($exito) {
            $rs = $conn->query("select LAST_INSERT_ID()")->fetch();
            $id = $rs[0];
            $obj = new Atencion();
            $obj->id = $id;
            $obj->fechaHora = $fechaHora;
            $obj->idAbogados = $idAbogados;
            $obj->idUsuarios = $idUsuarios;
            $obj->estado = $estado;
            $obj->valor = $valor;
            return $obj;
        } else {
            return null;
        }
    }

    public static function actualizar($id, $fechaHora, $idAbogados, $idUsuarios, $estado, $valor){
        $conn = BD::conn();
        $sql = "update atenciones set fechaHora = :fechaHora, idAbogados = :idAbogados, idUsuarios = :idUsuarios, estado = :estado, valor = :valor where id = :id";
        $rs = $conn->prepare($sql);
        return $rs->execute(array(':fechaHora' => $fechaHora, 
                                    ":idAbogados" => $idAbogados, 
                                    ":idUsuarios" => $idUsuarios, 
                                    ":estado" => $estado,
                                    ":valor" => $valor,
                                    ":id" => $id));
    }

    public static function buscarPorId($id) {
        $conn = BD::conn();
        $sql = "select * from atenciones where id = ".$id;
        $rs = $conn->query($sql);
        if ($rs) {
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            $obj = Atencion::rowToObject($row);
            return $obj;
        } else {
            return null;
        }
    }

    public static function buscarTodos() {
        $conn = BD::conn();
        $sql = "select * from atenciones";
        $rs = $conn->query($sql);
        if ($rs) {
            $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            foreach ($rows as &$row) {
                $obj = Atencion::rowToObject($row);
                array_push($arr, $obj);
            }
            return $arr;
        } else {
            return null;
        }
    }

    public static function borrar($id) {
        $conn = BD::conn();
        $sql = "delete from atenciones where id = :id";
        $rs = $conn->prepare($sql);
        if ($rs->execute(array(":id" => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public static function cambiarEstado($id,$estado){
        $conn = BD::conn();
        $sql = "update atenciones set estado = :estado where id = :id";
        $rs = $conn->prepare($sql);
        return $rs->execute(array(':id' => $id,':estado'=>$estado));
    }

    public static function buscarTodosAtenciones($estado) {
        $conn = BD::conn();
        $sql = "select * from atenciones";
        if (!empty($estado)) {
            $sqlWhere = array();
            if (!empty($estado)) {
                array_push($sqlWhere, " estado like  '%".$estado."%'");
            }
            $sql = $sql." where ".implode(" and ", $sqlWhere);
        }
        $rs = $conn->query($sql);
        if ($rs) {
            $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            foreach ($rows as &$row) {
                $obj = Atencion::rowToObject($row);
                array_push($arr, $obj);
            }
            return $arr;
        } else {
            return array();
        }
    }

    public static function buscarAtencionesCliente($estado, $idClienteConectado) {
        $conn = BD::conn();
        $sql = "select * from atenciones";
        if (!empty($estado) || $idClienteConectado > 0) {
            $sqlWhere = array();
            if (!empty($estado)) {
                array_push($sqlWhere, " estado like  '%".$estado."%'");
            }
            if ($idClienteConectado > 0) {
                array_push($sqlWhere, " idUsuarios = ".$idClienteConectado);
            }
            $sql = $sql." where ".implode(" and ", $sqlWhere);
        }
        $rs = $conn->query($sql);
        if ($rs) {
            $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            foreach ($rows as &$row) {
                $obj = Atencion::rowToObject($row);
                array_push($arr, $obj);
            }
            return $arr;
        } else {
            return array();
        }
    }

    private static function rowToObject($row) {
        $obj = new Atencion();
        $obj->id = $row["id"];
        $obj->fechaHora = $row["fechaHora"];
        $obj->idAbogados = $row["idAbogados"];
        $obj->idUsuarios = $row["idUsuarios"];
        $obj->estado = $row["estado"];
        $obj->valor = $row["valor"];
        return $obj;
    }
}
?>