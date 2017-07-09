<?php

require('../model/usuario.class.php');
require('../model/especialidad.class.php');

$data = Especialidad::buscarTodos();
                print_r($data);

echo '<option value="" selected="true" disabled>'."Seleccione proyecto".'</option>';
                foreach ($data as $value) {
                    echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
                }

/*
$esp2 = Especialidad::buscarPorId(3);

echo "=====";
echo $esp2->id;
echo $esp2->nombre;

Especialidad::actualizar(3, "pepito");

$esp2 = Especialidad::buscarPorId(3);

echo "=====";
echo $esp2->id;
echo $esp2->nombre;
*/
/*
$rutNumero=1;
$nombreCompleto="a";
$fechaIncorporacion="09/09/2017";
$tipoUsuario="qw";
$direccion="ww";
$telefonoCelular=" ";
$telefonoFijo= " ";
$perfil="sdd";
$clave="123";
$conn = BD::conn();
        $clave_encriptada=password_hash($clave, PASSWORD_DEFAULT);
        $sql = "insert into usuarios(rutNumero, nombreCompleto, fechaIncorporacion, tipoUsuario, direccion, telefonoCelular, telefonoFijo, perfil, clave) values(:rutNumero, :nombreCompleto, :fechaIncorporacion, :tipoUsuario, :direccion, :telefonoCelular, :telefonoFijo, :perfil, :clave)";
        $rs = $conn->prepare($sql);
        $exito = $rs->execute(array(':rutNumero' => $rutNumero, 
                                    ":nombreCompleto" => $nombreCompleto, 
                                    ":fechaIncorporacion" => $fechaIncorporacion, 
                                    ":tipoUsuario" => $tipoUsuario,
                                    ":direccion" => $direccion,
                                    ":telefonoCelular" => $telefonoCelular,
                                    ":telefonoFijo" => $telefonoFijo,
                                    ":perfil" => $perfil,
                                    ":clave" => $clave_encriptada));
echo $exito;*/
/*
$u= Usuario::crear(18279316, "Jose", "2017/09/09", "natural", "ddd", "", "", "administrador", "pepito");
echo $u->clave;
print_r( Usuario::validarClave(182793167,"pepito"));
*/