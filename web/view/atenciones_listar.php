<div class="container" style="width: 100%;">
<?php

$filtroEstado= getParam('estado','');

$rutNumeroClienteConectado = $_SESSION['rutNumero'];
$perfil = $_SESSION['perfil'];
$lista = array();

if ($perfil == Usuario::$PERFIL_CLIENTE) {
    $usuarioConectado = Usuario::buscarPorRutNumero($rutNumeroClienteConectado);
    $lista = Atencion::buscarAtencionesCliente($filtroEstado, $usuarioConectado->id);
} else {
    $lista = Atencion::buscarTodosAtenciones($filtroEstado);
}
 
?>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-11 listadoDiv">
        <h1>Listado Atenciones</h1>
        <br>
        <table class="display" width="100%" cellspacing="0">
            <thead>
                <?php
                $perfil = strtolower($_SESSION['perfil']);
                $action = "../view/".$perfil."_home.php";
                ?>
                <form method="GET" action="<?php echo $action;?>">
                    <input type="hidden" name="objeto" value="atenciones">
                    <input type="hidden" name="accion" value="listar">                    
                <th>
                <select  name="estado">
                    <option value="" selected >todos</option>
                    <option value="AGENDADA" >AGENDADA</option>
                    <option value="CONFIRMADA" >CONFIRMADA</option>
                    <option value="ANULADA" >ANULADA</option>
                    <option value="PERDIDA" >PERDIDA</option>
                    <option value="REALIZADA">REALIZADA</option>
                </select>
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
        <table class="display" width="100%" cellspacing="0">
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
            <td><?php
                $abogado = Abogado::buscarPorId($obj->idAbogados);  
                echo $abogado->nombreCompleto; ?>
            </td>
            <td><?php
                $usuario = Usuario::buscarPorId($obj->idUsuarios); 
                echo $usuario->nombreCompleto; ?>
            </td>
            <td>
            <?php
                if($_SESSION['perfil']!="CLIENTE") {
            ?>
                <select class="selectCambioEstado" atencionId="<?php echo $obj->id ?>">
                    <option value="AGENDADA" <?php if($obj->estado == 'AGENDADA') { echo "selected"; } ?> >AGENDADA</option>
                    <option value="CONFIRMADA" <?php if($obj->estado == 'CONFIRMADA') { echo "selected"; } ?>>CONFIRMADA</option>
                    <option value="ANULADA" <?php if($obj->estado == 'ANULADA') { echo "selected"; } ?>>ANULADA</option>
                    <option value="PERDIDA" <?php if($obj->estado == 'PERDIDA') { echo "selected"; } ?>>PERDIDA</option>
                    <option value="REALIZADA" <?php if($obj->estado == 'REALIZADA') { echo "selected"; } ?>>REALIZADA</option>
                </select>
            <?php
                } else {
                    echo $obj->estado;
                }
            ?>    
            </td>
            <td>$ <?php echo $obj->valor ?></td>
            <td>

            <?php
                if($_SESSION['perfil']!="CLIENTE") {
            ?>
            <form method="POST" action="../controller/atenciones.php?objeto=atenciones&accion=listar&operacion=eliminar"
                  onsubmit="return confirm('Esta seguro que desea eliminar la atención.');">
                <input type="hidden" name="id" value="<?php echo $obj->id ?>" />
                <button type="submit"><img src='img/eliminarAtencion.png' width='24' height='24' />Eliminar</button>
            </form>

            <form method="POST" action="../controller/atenciones.php?objeto=atenciones&accion=listar&operacion=cambiarEstado"
                  onsubmit="return confirm('Esta seguro que desea cambiar el estado?');">
                <input type="hidden" name="id" value="<?php echo $obj->id ?>" />
                <input type="hidden" name="estado" value="<?php echo $obj->estado ?>" id="atencion_estado_<?php echo $obj->id; ?>"/>
                <button type="submit"><img src='img/actualizar.png' width='24' height='24' />Actualizar</button>
            </form>
<?php            
            }
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

<script>

    $('.selectCambioEstado').change(function() {
        var id = $(this).attr('atencionId');
        var valor = $(this).val();
        $('#atencion_estado_' + id).val(valor);
    });

</script>