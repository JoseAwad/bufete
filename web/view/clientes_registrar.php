<script>
  function validarFormulario_formAddCliente() {
    var listaCampos = [
      {
        id: 'formAddCliente_rutNumero',
        tipo: 'number',
        mensaje: 'Ingrese rut'
      },
      {
        id: 'formAddCliente_nombreCompleto',
        tipo: 'text',
        mensaje: 'Ingrese nombre'
      },
      {
        id: 'formAddCliente_fechaIncorporacion',
        tipo: 'date',
        mensaje: 'Ingrese fecha de incorporación'
      },
      {
        id: 'formAddCliente_direccion',
        tipo: 'text',
        mensaje: 'Ingrese dirección'
      },
      {
        id: 'formAddCliente_clave',
        tipo: 'text',
        mensaje: 'Ingrese clave'
      }
    ];
    return validarFormulario(listaCampos);
  }
</script>

<?php
  if(!empty($_SESSION['error_clientes'])) {
    echo "<script>alert('".$_SESSION['error_clientes']."');</script>";
  }
?>

<div class="container" style="width: 100%;">

  <form method="POST" action="../controller/clientes.php?objeto=clientes&accion=registrar&operacion=registrar"
        onsubmit="return validarFormulario_formAddCliente();">

  <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 formAddCliente">
              <h1>Nuevo cliente</h1>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_rutNumero" name="rutNumero" placeholder="Ingrese rut">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_nombreCompleto" name="nombreCompleto" placeholder="Ingrese nombre">
              </div>
              <div class="casillaFormulario">
                <input type="date" id="formAddCliente_fechaIncorporacion" name="fechaIncorporacion" placeholder="Ingrese fecha incorporacion">
              </div>  
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_direccion" name="direccion" placeholder="Ingrese dirección">
              </div> 
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_telefonoCelular" name="telefonoCelular" placeholder="Ingrese telefono Celular">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_telefonoFijo" name="telefonoFijo" placeholder="Ingrese telefono Fijo">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_clave" name="clave" placeholder="Ingrese clave">
              </div>
              <div>                
                  <button type="submit" class="addUsuario_btn">Agregar</button>
              </div>
        </div>  
        <div class="col-lg-1"></div>
    </div>
  </form>

</div>
