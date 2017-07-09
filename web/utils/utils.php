<?php

function headerWrapper($path) {
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        $uri .= '/bufete/web';
    }
    return header('Location: '.$uri.$path);
}

function getParam($key, $value) {
    return isset($_GET[$key]) ? $_GET[$key] : $value;
}

function postParam($key, $value) {
    return isset($_POST[$key]) ? $_POST[$key] : $value;
}

function calcularRutDv( $T ) {
    $M=0;
    $S=1;
    for(;$T;$T=floor($T/10))
        $S=($S+$T%10*(9-$M++%6))%11;
    return $S?$S-1:'k';
}