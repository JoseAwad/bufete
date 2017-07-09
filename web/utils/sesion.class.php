<?php

class Sesion {
    function iniciar(){
        session_start();
        $_SESSION['vigente']=true;
    }
    function validar(){
        session_start();
        if(isset($_SESSION['vigente']) && $_SESSION['vigente']){
            return true;
        }else{
            return false;
        }
    }
    function cerrar(){
        session_start();
        $_SESSION=array();
        session_destroy();
    }
}
