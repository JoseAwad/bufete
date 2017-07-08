<?php 
	class Especialidad {

        var $id;
        var $nombre;

        public static function crear($nombre) {
            $conn = BD:conn();
            $sql = "insert into especialidades(nombre) values(:nombre)";
            $rs = $conn->prepare($sql);
            return $rs->execute(array(':nombre' => $nombre));
        }

        public static function actualizar($id, $nombre) {
        
        }

        public static function buscarPorId($id) {

        }

        public static function buscarTodos() {

        }
	}
?>