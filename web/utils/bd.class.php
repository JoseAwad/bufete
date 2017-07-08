<?php
class BD {

    public static function conn(){
        $gbd;
        $dsn = 'mysql:dbname=bufete;host=127.0.0.1';
        $usuario = 'root';
        $contrasena = '';
        try {
            $gbd = new PDO($dsn, $usuario, $contrasena);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $gbd;
    }
}
