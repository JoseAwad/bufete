<?php
require('../utils/utils.php');
require('../utils/bd.class.php');
require('../model/usuario.class.php');

session_start();

$rutNumero = $_POST['rutNumero'];
$clave = $_POST['clave'];
$_SESSION['error'] = '';

if (!empty($rutNumero) && !empty($clave)) {

    if (Usuario::validarClave($rutNumero, $clave)) {        
        $u = Usuario::buscarPorRutNumero($rutNumero);
        $_SESSION['rutNumero'] = $rutNumero;
        $_SESSION['perfil'] = $u->perfil;
        $_SESSION['model_usuario'] = json_encode($u);
        headerWrapper('/view/menu.php');
    } else {
        $_SESSION['error'] = 'Clave invalida';
        headerWrapper('/view/login.php');
    }    
} else {
    $_SESSION['error'] ='Ingrese rut y clave';
    headerWrapper('/view/login.php');
}