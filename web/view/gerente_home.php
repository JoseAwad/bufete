<?php
include('header.php');
require('../utils/utils.php');
require('../model/usuario.class.php');

session_start();

$usuario = Usuario::fromJson($_SESSION['model_usuario']);

if ($usuario->perfil == Usuario::$PERFIL_GERENTE) {
    
    include('gerente_menu.php');
    include('gerente_body.php');
    include('footer.php');

} else {
    //error perfil invalido para acceder a esta pagina
    headerWrapper('/view/home.php'); 
}
