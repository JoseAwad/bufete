<?php
require('../utils/utils.php');
    session_start();
    $_SESSION=array();
    session_destroy();
    headerWrapper('/view/login.php');
    exit;
?>