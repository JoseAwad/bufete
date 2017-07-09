<?php
require('../utils/utils.php');
require('../utils/bd.class.php');
require('../model/usuario.class.php');


$objeto = getParam("objeto", "");
$accion = getParam("accion", "");
$operacion = getParam("operacion", "");

session_start();
$_SESSION['error_usuarios'] = '';

if (!empty($objeto) && !empty($accion) && !empty($operacion)) {
    
    if ($operacion == 'registrar') {

        $rutNumero = postParam('rutNumero',0);
        $nombreCompleto = postParam('nombreCompleto','');
        $fechaIncorporacion = postParam('fechaIncorporacion','');
        $tipoUsuario = postParam('tipoUsuario','');
        $direccion = postParam('direccion','');
        $telefonoCelular = postParam('telefonoCelular','');
        $telefonoFijo = postParam('telefonoFijo','');
        $perfil =  postParam('perfil','');
        $clave = postParam('clave','');

        $cliente = Usuario::crear($rutNumero, $nombreCompleto, $fechaIncorporacion, $tipoUsuario, $direccion, $telefonoCelular, $telefonoFijo, $perfil, $clave);
        if(!$cliente){
            $_SESSION['error_usuarios'] = 'No fue posible crear al usuario';
        }
    } else if ($operacion == 'eliminar') {    

        $id = postParam('id', 0);
        if (!Usuario::borrar($id)) {
            $_SESSION['error_usuarios'] = 'No fue posible eliminar al usuario';
        }
    }

    headerWrapper('/view/administrador_home.php?objeto='.$objeto.'&accion='.$accion);
}

?>