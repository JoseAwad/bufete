<?php

require('../model/usuario.class.php');
require('../utils/utils.php');

$flagError = '';

$rutNumero = $_POST['rutNumero'];
$clave = $_POST['clave'];

if (!empty($rutNumero) && !empty($clave)) {

    

} else {
    $flagError = 'Ingrese rut numero y clave';
    headerWrapper('/view/login.php');
}