<?php
session_start();
?>
<html lang="en">
<head>
  <title>Bufete</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <?php
    if(!empty($_SESSION['error'])){ 
    ?>
        <div class="alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>ERROR!</strong><?php echo $_SESSION['error']; ?>
        </div>
    <?php
        $_SESSION['error'] = '';
    }
    ?>
    <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4  Login_Form">
            <h1>Login</h1>
                <form action="../controller/login.php" method="POST">
                    <div class="form-group">
                        <input type="text" class=" casillaFormulario" id="rutNumero" name="rutNumero" placeholder="Ingrese Rut" maxlength="10">
                    </div>
                    <div class="form-group">
                        <input type="password" class=" casillaFormulario" id="clave" name="clave"  placeholder="Ingrese Contraseña" maxlength="6">
                    </div>
                    <button type="submit" class="btn btn-default Login_btn">Ingresar</button>
                </form>
	</div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>
</html>