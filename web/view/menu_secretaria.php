<?php

require('../utils/utils.php');
require('../model/usuario.class.php');

session_start();

$usuario = Usuario::fromJson($_SESSION['model_usuario']);

if ($usuario->perfil == Usuario::$PERFIL_SECRETARIA) {

} else {
    //error perfil invalido para acceder a esta pagina
    headerWrapper('/view/menu.php'); 
}