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