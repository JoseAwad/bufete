<?php
require('../utils/utils.php');
require('../utils/bd.class.php');
require('../model/usuario.class.php');


$objeto = getParam("objeto", "");
$accion = getParam("accion", "");
$operacion = getParam("operacion", "");

if (!empty($objeto) && !empty($accion) && !empty($operacion)) {
    
    if ($operacion == 'registrar') {

        $rutNumero = postParam('rutNumero',0);
        $nombreCompleto = postParam('nombreCompleto','');
        $fechaIncorporacion = postParam('fechaIncorporacion','');
        $tipoUsuario = postParam('tipoUsuario','');
        $direccion = postParam('direccion','');
        $telefonoCelular = postParam('telefonoCelular','');
        $telefonoFijo = postParam('telefonoFijo','');
        $perfil =  Usuario::$PERFIL_CLIENTE;
        $clave = postParam('clave','');

        $cliente = Usuario::crear($rutNumero, $nombreCompleto, $fechaIncorporacion, $tipoUsuario, $direccion, $telefonoCelular, $telefonoFijo, $perfil, $clave);

    } else if ($operacion == 'eliminar') {    

        $id = postParam('id', 0);
        Usuario::borrar($id);
    }

    headerWrapper('/view/administrador_home.php?objeto='.$objeto.'&accion='.$accion);
}

?>