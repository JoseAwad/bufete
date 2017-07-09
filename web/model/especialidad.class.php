<?php 

require("../utils/bd.class.php");

class Especialidad {

    var $id;
    var $nombre;

    public static function fromJson($json) {
        $data = json_decode($json, true);
        $u = new Especialidad();
        foreach ($data AS $key => $value) {
            $u->{$key} = $value;
        }
        return $u;
    }

    public static function crear($nombre) {
        $conn = BD::conn();
        $sql = "insert into especialidades(nombre) values(:nombre)";
        $rs = $conn->prepare($sql);
        $exito = $rs->execute(array(':nombre' => $nombre));
        if ($exito) {
            $rs = $conn->query("select LAST_INSERT_ID()")->fetch();
            $id = $rs[0];
            $obj = new Especialidad();
            $obj->id = $id;
            $obj->nombre = $nombre;
            return $obj;
        } else {
            return null;
        }
    }

    public static function actualizar($id, $nombre) {
        $conn = BD::conn();
        $sql = "update especialidades set nombre = :nombre where id = :id";
        $rs = $conn->prepare($sql);
        return $rs->execute(array(':nombre' => $nombre, ":id" => $id));
    }

    public static function buscarPorId($id) {
        $conn = BD::conn();
        $sql = "select * from especialidades where id = ".$id;
        $rs = $conn->query($sql);
        if ($rs) {
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            $obj = new Especialidad();
            $obj->id = $row["id"];
            $obj->nombre = $row["nombre"];
            return $obj;
        } else {
            return null;
        }
    }

    public static function buscarTodos() {
        $conn = BD::conn();
        $sql = "select * from especialidades";
        $rs = $conn->query($sql);
        if ($rs) {
            $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            foreach ($rows as &$row) {
                $obj = new Especialidad();
                $obj->id = $row["id"];
                $obj->nombre = $row["nombre"];
                array_push($arr, $obj);
            }
            return $arr;
        } else {
            return null;
        }
    }

    public static function borrar($id) {
        $conn = BD::conn();
        $sql = "delete from especialidades where id = :id";
        $rs = $conn->prepare($sql);
        if ($rs->execute(array(":id" => $id))) {
            return true;
        } else {
            return false;
        }
    }
}
?>