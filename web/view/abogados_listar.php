<div class="container" style="width: 100%;">

<?php
require('../utils/bd.class.php');
require('../model/abogado.class.php');

$lista = Abogado::buscarTodos();

foreach ($lista as $obj) {
    echo $obj->nombreCompleto.'<br>';
}

?>

</div>
