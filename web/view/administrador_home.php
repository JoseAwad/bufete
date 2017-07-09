<?php
include('header.php');
require('../utils/utils.php');
require('../model/usuario.class.php');

session_start();

$usuario = Usuario::fromJson($_SESSION['model_usuario']);

if ($usuario->perfil == Usuario::$PERFIL_ADMINISTRADOR) {
    
    include('administrador_menu.php');
    if (!empty($_GET['objeto']) && !empty($_GET['accion'])) {
        include($_GET['objeto'].'_'.$_GET['accion'].'.php');
    }
    include('footer.php');

} else {
    //error perfil invalido para acceder a esta pagina
    headerWrapper('/view/home.php'); 
}
