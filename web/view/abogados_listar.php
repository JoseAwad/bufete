<div class="container" style="width: 100%;">

<script>
     $(document).ready(function(){
        $('#tablaAbogados').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
        });
    });
</script>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 Formulario_TablaAbogados">
             <h1>Lista Abogados</h1>
             <br>
            <table id="tablaAbogados" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>Nombre Completo</th>
                <th>Fecha contratación</th>
                <th>valor Hora</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                require('../utils/bd.class.php');
                require('../model/abogado.class.php');

                $lista = Abogado::buscarTodos();

                foreach ($lista as $obj) {
                echo "<tr>";
                echo "<td>".$obj->id."</td>";
                echo "<td>".$obj->rutNumero."</td>";
                echo "<td>".$obj->nombreCompleto."</td>";
                echo "<td>".$obj->fechaContratacion."</td>";
                echo "<td>".$obj->valorHora."</td>";
                echo "<td class=''><a class='deleteAbogado_btn' href='../controller/abogados.php?accion=eliminar&id=".$obj->id."' ><img src='img/eliminar.png' width='24' height='24' /></a> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
            </table>
        </div>  
        <div class="col-lg-1"></div>
    </div>

</div>
