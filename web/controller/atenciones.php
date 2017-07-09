<?php
require('../utils/utils.php');
require('../utils/bd.class.php');
require('../model/atencion.class.php');


$objeto = getParam("objeto", "");
$accion = getParam("accion", "");
$operacion = getParam("operacion", "");

session_start();
$_SESSION['error_atenciones'] = '';

if (!empty($objeto) && !empty($accion) && !empty($operacion)) {
    
    if ($operacion == 'registrar') {

        $fechaHora = postParam('fechaHora','');
        $idAbogados = postParam('idAbogados','');
        $idUsuarios = postParam('idUsuarios','');
        $estado = Atencion::$ESTADO_AGENDADA;
        $valor = postParam('valor','');

        $atencion = Atencion::crear($fechaHora, $idAbogados, $idUsuarios, $estado, $valor);
        if(!$atencion){
            $_SESSION['error_atenciones'] = 'No fue posible crear la atencion';
        }
    } else if ($operacion == 'cambiarEstado') { 

        $estado = postParam('estado','');
        $id = postParam('id', 0);
        if (!Atencion::cambiarEstado($id,$estado)) {
            $_SESSION['error_atenciones'] = 'No fue posible eliminar la Atencion';
        }
    }else if ($operacion == 'eliminar') {    

        $id = postParam('id', 0);
        Atencion::borrar($id);
    }

    headerWrapper('/view/secretaria_home.php?objeto='.$objeto.'&accion='.$accion);
}

?>