<div class="container" style="width: 100%;">
<?php

$filtroRutNumero = getParam('rutNumero', '');
$filtroNombreCompleto = getParam('nombreCompleto','');
$filtroPerfilAExcluir = Usuario::$PERFIL_CLIENTE;

$lista = Usuario::buscarTodosUsuarios($filtroRutNumero, $filtroNombreCompleto, $filtroPerfilAExcluir); 
?>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-11 FormTablaClientes">
        <h1>Lista Usuarios</h1>
        <br>
        <table class="display" width="100%" cellspacing="0">
            <thead>
                <?php
                $perfil = strtolower($_SESSION['perfil']);
                $action = "../view/".$perfil."_home.php";
                ?>
                <form method="GET" action="<?php echo $action;?>">
                    <input type="hidden" name="objeto" value="usuarios">
                    <input type="hidden" name="accion" value="listar">
                    <th>Rut número: 
                        <input type="text" name="rutNumero" value="<?php echo $filtroRutNumero; ?>">
                    </th>
                    <th>Nombre Completo:
                        <input type="text" name="nombreCompleto" value="<?php echo $filtroNombreCompleto; ?>">
                    </th>
                    <th>
                        <button type="submit">Buscar</button>
                    </th>
                </form>
            </thead>
            <tbody>
            </tbody>
        <table>
        <br>
        <table  class="display" width="100%" cellspacing="0">
            <thead>
                <th>Id</th>
                <th>Rut Número</th>
                <th>Nombre Completo</th>
                <th>Fecha Incorporacion</th>
                <th>tipo usuario</th>
                <th>Direccion</th>
                <th>Telefono celular</th>
                <th>Telefono fijo</th>
                <th>Perfil</th>
                <th>clave</th>
            </thead>
            <tbody>
<?php
        foreach ($lista as $obj) {
?>
        <tr>
            <td><?php echo $obj->id ?></td>
            <td><?php echo $obj->rutNumero ?></td>
            <td><?php echo $obj->nombreCompleto ?></td>
            <td><?php echo $obj->fechaIncorporacion ?></td>
            <td><?php echo $obj->tipoUsuario ?></td>
            <td><?php echo $obj->direccion ?></td>
            <td><?php echo $obj->telefonoCelular ?></td>
            <td><?php echo $obj->telefonoFijo ?></td>
            <td><?php echo $obj->perfil ?></td>
            <td><?php echo $obj->clave ?></td>
            <td>
            
            <form method="POST" action="../controller/usuarios.php?objeto=usuarios&accion=listar&operacion=eliminar"
                  onsubmit="return confirm('Esta seguro que desea eliminar al usuario.');">
                <input type="hidden" name="id" value="<?php echo $obj->id ?>" />
                <button type="submit"><img src='img/eliminar.png' width='24' height='24' />Eliminar</button>
            </form>
<?php            
        }
?>
            </td>
        </tr>
<?php
        
?>
            </tbody>
        </table>
    </div>
    </div>
</div>
