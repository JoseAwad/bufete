<?php 
  class Usuario {

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