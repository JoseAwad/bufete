<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="administrador_home.php">Menú Cliente</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="cliente_home.php?objeto=atenciones&accion=listar">Atenciones</a></li>
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

