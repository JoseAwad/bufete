<div class="container" style="width: 100%;">
<?php

$filtroRutNumero = getParam('rutNumero', '');
$filtroNombreCompleto = getParam('nombreCompleto','');
$filtroEstado = getParam('estado', '');

$lista = Abogado::buscarTodos($filtroRutNumero, $filtroNombreCompleto, $filtroEstado);
?>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-11 listadoDiv">
        <h1>Lista Abogados</h1>
        <br>
        <table id="tablaAbogados" class="display" width="100%" cellspacing="0">
            <thead>
                <?php
                $perfil = strtolower($_SESSION['perfil']);
                $action = "../view/".$perfil."_home.php";
                ?>
                <form method="GET" action="<?php echo $action;?>">
                    <input type="hidden" name="objeto" value="abogados">
                    <input type="hidden" name="accion" value="listar">
                    <th>Rut número: 
                        <input type="text" name="rutNumero" value="<?php echo $filtroRutNumero; ?>">
                    </th>
                    <th>Nombre Completo:
                        <input type="text" name="nombreCompleto" value="<?php echo $filtroNombreCompleto; ?>">
                    </th>
                    <th>Estado: 
                        <select name="estado">
                            <option value='0' <?php if ($filtroEstado == 0){ echo 'selected'; } ?> >Todos</option>
                            <option value='1' <?php if ($filtroEstado == 1){ echo 'selected'; } ?>>Activos</option>
                            <option value='2' <?php if ($filtroEstado == 2){ echo 'selected'; } ?>>Despedidos</option>
                        </seect>
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
        <table id="tablaAbogados" class="display" width="100%" cellspacing="0">
            <thead>
                <th>Id</th>
                <th>Rut Número</th>
                <th>Nombre Completo</th>
                <th>Fecha Contratación</th>
                <th>Valor Hora</th>
                <th>Especialidad</th>
                <th>Estado</th>
            </thead>
            <tbody>
<?php
        foreach ($lista as $obj) {
?>
        <tr>
            <td><?php echo $obj->id ?></td>
            <td><?php echo $obj->rutNumero."-".$obj->rutDv ?></td>
            <td><?php echo $obj->nombreCompleto ?></td>
            <td><?php echo $obj->fechaContratacion ?></td>
            <td><?php echo $obj->valorHora ?></td>
            <td>
<?php
            $abogadoEspecialidad = AbogadoEspecialidad::buscarPorIdAbogados($obj->id);
            $especialidad = null;
            if ($abogadoEspecialidad) {
                $especialidad = Especialidad::buscarPorId($abogadoEspecialidad->idEspecialidades);
            }
            if ($especialidad) {
                echo $especialidad->nombre;
            } else {
                echo "Sin especialidad";
            }
?>            
            </td>
            <td>
<?php
        if ($obj->estado == 2) {
?>           
            Despedido
<?php
        } else {
?>
<?php
            if($_SESSION['perfil']=="ADMINISTRADOR") {
        ?>
            <form method="POST" action="../controller/abogados.php?objeto=abogados&accion=listar&operacion=despedir"
                  onsubmit="return confirm('Esta seguro que desea despedir al abogado.');">
                <input type="hidden" name="id" value="<?php echo $obj->id ?>" />
                <button type="submit"><img src='img/eliminar.png' width='24' height='24' />Despedir</button>
            </form>
<?php            
            } else{
                echo "Activo";
            }
        }
?>
            </td>
        </tr>
<?php
        }
?>
            </tbody>
        </table>
    </div>
    </div>
</div>
