<div class="container" style="width: 100%;">
<?php

$filtroRutNumero = getParam('rutNumero', '');

$lista = Atencion::buscarTodos($filtroRutNumero); 
?>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-11 FormTablaAtenciones">
        <h1>Listado Atenciones</h1>
        <br>
        <table class="display" width="100%" cellspacing="0">
            <thead>
                <form method="GET" action="../view/administrador_home.php">
                    <input type="hidden" name="objeto" value="atenciones">
                    <input type="hidden" name="accion" value="listar">
                    <th>Rut número: 
                        <input type="text" name="rutNumero" value="<?php echo $filtroRutNumero; ?>">
                    </th>
                    <th>
                        <button type="submit">Buscar</button>
                    </th>
                </form>
            </thead>
            <tbody>
            </tbody>
        </table>
        <br>
        <table  class="display" width="100%" cellspacing="0">
            <thead>
                <th>Id</th>
                <th>Fecha hora atención</th>
                <th>Abogado</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Valor</th>
            </thead>
            <tbody>
<?php
        foreach ($lista as $obj) {
?>
        <tr>
            <td><?php echo $obj->id ?></td>
            <td><?php echo $obj->fechaHora ?></td>
            <td><?php echo $obj->idAbogado ?></td>
            <td><?php echo $obj->idCliente ?></td>
            <td><?php echo $obj->estado ?></td>
            <td><?php echo $obj->valor ?></td>
            <td>
            
            <form method="POST" action="../controller/atenciones.php?objeto=atenciones&accion=listar&operacion=eliminar"
                  onsubmit="return confirm('Esta seguro que desea eliminar la atención.');">
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
