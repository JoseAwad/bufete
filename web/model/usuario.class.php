<?php 
	class Usuario {
        
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

        public static function crear($rutNumero, $nombreCompleto, $fechaIncorporacion, $tipoUsuario, $direccion, $telefonoCelular, $telefonoFijo, $perfil, $clave) {
        
        }

        public static function actualizar($id, $rutNumero, $nombreCompleto, $fechaIncorporacion, $tipoUsuario, $direccion, $telefonoCelular, $telefonoFijo, $perfil, $clave) {
        
        }

        public static function buscarPorId($id) {

        }

        public static function buscarTodos() {

        }
	}

?>