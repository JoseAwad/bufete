<?php
require('../utils/utils.php');
require('../utils/bd.class.php');
require('../model/abogado.class.php');
require('../model/abogadoEspecialidad.class.php');

if (!empty($_GET['objeto']) && !empty($_GET['accion']) && !empty($_GET['operacion'])) {
    
    if ($_GET['operacion'] == 'registrar') {

        $rutNumero = $_POST['rutNumero'];
        $nombreCompleto = $_POST['nombreCompleto'];
        $fechaContratacion = $_POST['fechaContratacion'];
        $valorHora = $_POST['valorHora'];
        $idEspecialidad = $_POST['idEspecialidad'];

        $abogado = Abogado::crear($rutNumero, $nombreCompleto, $fechaContratacion, $valorHora);

        if ($abogado) {
            $abogadoEspecialidad = AbogadoEspecialidad::crear($abogado->id, $idEspecialidad);
        }

    } else if ($_GET['operacion'] == 'eliminar') {    

    }

    headerWrapper('/view/administrador_home.php?objeto='.$_GET['objeto'].'&accion='.$_GET['accion']);
}

?>