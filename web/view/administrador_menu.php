<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="administrador_home.php">Menú Administrador</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="administrador_home.php?objeto=clientes">Clientes</a></li>
                        <li><a href="administrador_home.php?objeto=abogados">Abogados</a></li>
                        <li><a href="administrador_home.php?objeto=usuarios">Usuarios</a></li>
                    </ul>
                    <div class="right">
                        <a href="../controller/cerrarSesion.php" class="btn-xs btn-danger" role="button" style="margin-left: 55%;">Cerrar sesión</a>	
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
                        <li><a href="administrador_home.php?objeto=clientes&accion=listar">Listar</a></li>
                        <li><a href="administrador_home.php?objeto=clientes&accion=registrar">Registrar</a></li>
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
                        <li><a href="administrador_home.php?objeto=abogados&accion=listar">Listar</a></li>
                        <li><a href="administrador_home.php?objeto=abogados&accion=registrar">Contratar</a></li>
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
if (!empty($_GET['objeto']) && $_GET['objeto'] == 'usuarios') {
?>
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="administrador_home.php?objeto=usuarios&accion=listar">Listar</a></li>
                        <li><a href="administrador_home.php?objeto=usuarios&accion=registrar">Registrar</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>   
</div>
<?php
}
?>