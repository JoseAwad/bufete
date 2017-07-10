<?php
include('header.php');
require('../utils/utils.php');
require('../utils/bd.class.php');
require('../model/abogado.class.php');
require('../model/abogadoEspecialidad.class.php');
require('../model/atencion.class.php');
require('../model/especialidad.class.php');
require('../model/usuario.class.php');

session_start();

$usuario = Usuario::fromJson($_SESSION['model_usuario']);

if ($usuario->perfil == Usuario::$PERFIL_SECRETARIA) {
    
    $objeto = getParam("objeto", postParam("objeto", ""));
    $accion = getParam("accion", postParam("accion", ""));
    
    include('secretaria_menu.php');

    //incluye la pagina de acuerdo al tipo de objeto y accion
    if (!empty($objeto) && !empty($accion)) {
        include($objeto.'_'.$accion.'.php');
    }
    
    include('footer.php');

} else {
    //error perfil invalido para acceder a esta pagina
    headerWrapper('/view/home.php'); 
}
