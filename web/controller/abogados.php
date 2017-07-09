<?php
require('../utils/utils.php');
require('../utils/bd.class.php');
require('../model/abogado.class.php');
require('../model/abogadoEspecialidad.class.php');

$objeto = getParam("objeto", "");
$accion = getParam("accion", "");
$operacion = getParam("operacion", "");

session_start();
$_SESSION['error_abogados'] = '';

if (!empty($objeto) && !empty($accion) && !empty($operacion)) {
    
    if ($operacion == 'registrar') {

        $rutNumero = postParam('rutNumero',0);
        $nombreCompleto = postParam('nombreCompleto','');
        $fechaContratacion = postParam('fechaContratacion','');
        $valorHora = postParam('valorHora',0);
        $idEspecialidad = postParam('idEspecialidad',0);

        $abogado = Abogado::crear($rutNumero, $nombreCompleto, $fechaContratacion, $valorHora);
        if ($abogado) {
            $abogadoEspecialidad = AbogadoEspecialidad::crear($abogado->id, $idEspecialidad);
        } else {
            $_SESSION['error_abogados'] = 'No fue posible crear el abogado';
        }

    } else if ($operacion == 'despedir') {    

        $id = postParam('id', 0);
        if (!Abogado::despedir($id)) {
            $_SESSION['error_abogados'] = 'No fue posible despedir al abogado';
        }
    }

    headerWrapper('/view/administrador_home.php?objeto='.$objeto.'&accion='.$accion);
}

?>