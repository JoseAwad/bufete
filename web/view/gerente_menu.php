<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="gerente_home.php">Menú Gerente</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="gerente_home.php?objeto=clientes">Clientes</a></li>
                        <li><a href="gerente_home.php?objeto=abogados">Abogados</a></li>
                        <li><a href="gerente_home.php?objeto=atenciones">Atenciones</a></li>
                        <li><a href="gerente_home.php?objeto=estadisticas&accion=listar">Estadisticas</a></li>
                    </ul>
                    <div class="right">
                        <div  class="menuCerrarSesion">
                            <a href="../controller/cerrarSesion.php" class="btn-xs btn-danger" role="button">Cerrar sesión</a>	
                        </div>
                        <div class="menuNombreUsuario">
                        <?php
                            echo $_SESSION['perfil'].": ".$_SESSION['nombreCompleto'];  
                        ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>   
</div>


<?php
if (!empty($_GET['objeto']) && $_GET['objeto'] == 'clientes') {
?>
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="gerente_home.php?objeto=clientes&accion=listar">Listar</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>   
</div>
<?php
}
?>

<?php
if (!empty($_GET['objeto']) && $_GET['objeto'] == 'abogados') {
?>
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="gerente_home.php?objeto=abogados&accion=listar">Listar</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>   
</div>
<?php
}
?>

<?php
if (!empty($_GET['objeto']) && $_GET['objeto'] == 'atenciones') {
?>
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="gerente_home.php?objeto=atenciones&accion=listar">Listar</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>   
</div>
<?php
}
?>