<script>
  function validarFormulario_formAddUsuario() {
    var listaCampos = [
      {
        id: 'formAddUsuario_rutNumero',
        tipo: 'number',
        mensaje: 'Ingrese rut'
      },
      {
        id: 'formAddUsuario_nombreCompleto',
        tipo: 'text',
        mensaje: 'Ingrese nombre'
      },
      {
        id: 'formAddUsuario_fechaIncorporacion',
        tipo: 'date',
        mensaje: 'Ingrese fecha de incorporación'
      },
      {
        id: 'formAddUsuario_direccion',
        tipo: 'text',
        mensaje: 'Ingrese dirección'
      },
      {
        id: 'formAddUsuario_perfil',
        tipo: 'text',
        mensaje: 'Ingrese perfil'
      },
      {
        id: 'formAddUsuario_clave',
        tipo: 'text',
        mensaje: 'Ingrese clave'
      }
    ];
    return validarFormulario(listaCampos);
  }
</script>

<?php
  if(!empty($_SESSION['error_usuarios'])) {
    echo "<script>alert('".$_SESSION['error_usuarios']."');</script>";
  }
?>

<div class="container" style="width: 100%;">

  <form method="POST" action="../controller/usuarios.php?objeto=usuarios&accion=registrar&operacion=registrar"
        onsubmit="return validarFormulario_formAddUsuario();">

  <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 formAddUsuario">
              <h1>Nuevo usuario</h1>
              <div class="casillaFormulario">
                <input type="text" id="formAddUsuario_rutNumero" name="rutNumero" placeholder="Ingrese rut">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddUsuario_nombreCompleto" name="nombreCompleto" placeholder="Ingrese nombre">
              </div>
              <div class="casillaFormulario">
                <input type="date" id="formAddUsuario_fechaIncorporacion" name="fechaIncorporacion" placeholder="Ingrese fecha incorporacion">
              </div>  
              <div class="casillaFormulario">
                <input type="text" id="formAddUsuario_direccion" name="direccion" placeholder="Ingrese dirección">
              </div> 
              <div class="casillaFormulario">
                <input type="text" id="formAddUsuario_telefonoCelular" name="telefonoCelular" placeholder="Ingrese telefono Celular">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddUsuario_telefonoFijo" name="telefonoFijo" placeholder="Ingrese telefono Fijo">
              </div>
              <div>
                  <select id="formAddUsuario_perfil" name="perfil" class="selectpicker" data-style="btn">
                      <option value="">Seleccione perfil</option>
                      <option value="GERENTE">Gerente</option>
                      <option value="ADMINISTRADOR">Administrador</option>
                      <option value="SECRETARIA">Secretaria</option>
                  </select>
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddUsuario_clave" name="clave" placeholder="Ingrese clave">
              </div>
              <div>                
                  <button type="submit" class="addUsuario_btn">Agregar</button>
              </div>
        </div>  
        <div class="col-lg-1"></div>
    </div>
  </form>

</div>
