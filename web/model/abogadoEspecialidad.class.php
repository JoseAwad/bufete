<?php
class AbogadoEspecialidad {
    
    var  $id;
    var  $idAbogados;
    var  $idEspecialidades;

    public static function fromJson($json) {
        $data = json_decode($json, true);
        $u = new AbogadoEspecialidad();
        foreach ($data AS $key => $value) {
            $u->{$key} = $value;
        }
        return $u;
    }
    
    public static function crear($idAbogados, $idEspecialidades){
        $conn = BD::conn();
        $sql = "insert into abogadosEspecialidades(idAbogados, idEspecialidades) values(:idAbogados, :idEspecialidades)";
        $rs = $conn->prepare($sql);
        $exito = $rs->execute(array(':idAbogados' => $idAbogados, 
                                    ":idEspecialidades" => $idEspecialidades));
        if ($exito) {
            $rs = $conn->query("select LAST_INSERT_ID()")->fetch();
            $id = $rs[0];
            $obj = new AbogadoEspecialidad();
            $obj->id = $id;
            $obj->idAbogados = $idAbogados;
            $obj->idEspecialidades = $idEspecialidades;
            return $obj;
        } else {
            return null;
        }

    }

    public static function buscarPorIdAbogados($idAbogados) {
        $conn = BD::conn();
        $sql = "select * from abogadosEspecialidades where idAbogados = ".$idAbogados;
        $rs = $conn->query($sql);
        if ($rs) {
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            $obj = new AbogadoEspecialidad();
            $obj->id = $row["id"];
            $obj->idAbogados = $row["idAbogados"];
            $obj->idEspecialidades = $row["idEspecialidades"];
            return $obj;
        } else {
            return null;
        }
    }

    public static function borrarPorIdAbogados($idAbogados) {
        $conn = BD::conn();
        $sql = "delete from abogadosEspecialidades where idAbogados = :idAbogados";
        $rs = $conn->prepare($sql);
        if ($rs->execute(array(":idAbogados" => $idAbogados))) {
            return true;
        } else {
            return false;
        }
    }

}
?>