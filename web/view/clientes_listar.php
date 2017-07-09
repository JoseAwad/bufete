<div class="container" style="width: 100%;">
<?php

$filtroRutNumero = getParam('rutNumero', '');
$filtroNombreCompleto = getParam('nombreCompleto','');
$filtroPerfil = Usuario::$PERFIL_CLIENTE;

$lista = Usuario::buscarTodosPorPerfil($filtroRutNumero, $filtroNombreCompleto, $filtroPerfil); 
?>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-11 FormTablaClientes">
        <h1>Lista clientes</h1>
        <br>
        <table class="display" width="100%" cellspacing="0">
            <thead>
                <form method="GET" action="../view/administrador_home.php">
                    <input type="hidden" name="objeto" value="clientes">
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

            <form method="POST" action="../controller/clientes.php?objeto=clientes&accion=listar&operacion=eliminar"
                  onsubmit="return confirm('Esta seguro que desea eliminar al cliente.');">
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
