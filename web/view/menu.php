<?php

require('../utils/utils.php');
require('../model/usuario.class.php');

session_start();

//si el usuario no tiene sesion
if (empty($_SESSION['model_usuario'])) {
    headerWrapper('/view/login.php');
}

$usuario = Usuario::fromJson($_SESSION['model_usuario']);

//print_r($_SESSION['rutNumero']);
//print_r($_SESSION['perfil']);
//print_r($usuario->perfil);

if ($usuario->perfil == Usuario::$PERFIL_GERENTE) {
    headerWrapper('/view/menu_gerente.php');
} else if ($usuario->perfil == Usuario::$PERFIL_ADMINISTRADOR) {
    headerWrapper('/view/menu_administrador.php');
} else if ($usuario->perfil == Usuario::$PERFIL_SECRETARIA) {
    headerWrapper('/view/menu_secretaria.php');
} else if ($usuario->perfil == Usuario::$PERFIL_CLIENTE) {
    headerWrapper('/view/menu_cliente.php');
}