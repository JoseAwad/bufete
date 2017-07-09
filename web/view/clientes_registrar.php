<script>
  function validarFormulario_formAddCliente() {
    var listaCampos = [
      {
        id: 'formAddCliente_rutNumero',
        tipo: 'number',
        mensaje: 'Ingrese rut'
      },
      {
        id: 'formAddCliente_dvNumero',
        tipo: 'text',
        mensaje: 'Ingrese dígito verificador'
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
        id: 'formAddCliente_tipoUsuario',
        tipo: 'text',
        mensaje: 'Seleccione tipo cliente'
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

    var rutCompleto = $('#formAddCliente_rutNumero').val() + '-' + $('#formAddCliente_dvNumero').val()
    if (!validaRut(rutCompleto)) {
      alert('Ingrese un rut valido');
      return false;
    } 

    return validarFormulario(listaCampos);
  }
</script>

<?php
  if(!empty($_SESSION['error_clientes'])) {
    echo "<script>alert('".$_SESSION['error_clientes']."');</script>";
    $_SESSION['error_clientes'] = '';
  }
?>

<div class="container" style="width: 100%;">

  <form method="POST" action="../controller/clientes.php?objeto=clientes&accion=registrar&operacion=registrar"
        onsubmit="return validarFormulario_formAddCliente();">

  <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 formAddCliente formData">
              <h1>Nuevo cliente</h1>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_rutNumero" name="rutNumero" placeholder="Ingrese rut" maxlength="10">
                <input type="text" id="formAddCliente_dvNumero" name="dvNumero" class="digitoVerficador" placeholder="Dv" maxlength="1">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_nombreCompleto" name="nombreCompleto" placeholder="Ingrese nombre" maxlength="100">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_fechaIncorporacion" name="fechaIncorporacion" placeholder="Ingrese fecha incorporacion" maxlength="20">
              </div>
              <div>
                  <select id="formAddCliente_tipoUsuario" name="tipoUsuario" class="selectPicker">
                      <option value="">Seleccione tipo Cliente</option>
                      <option value="N">NATURAL</option>
                      <option value="J">JURIDICO</option>
                  </select>
              </div> 
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_direccion" name="direccion" placeholder="Ingrese dirección" maxlength="100">
              </div> 
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_telefonoCelular" name="telefonoCelular" placeholder="Ingrese telefono Celular" maxlength="12">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_telefonoFijo" name="telefonoFijo" placeholder="Ingrese telefono Fijo" maxlength="12">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddCliente_clave" name="clave" placeholder="Ingrese clave" maxlength="6">
              </div>
              <div>                
                  <button type="submit" class="btn">Agregar</button>
              </div>
        </div>  
        <div class="col-lg-1"></div>
    </div>
  </form>

</div>

<script>
  $('#formAddCliente_fechaIncorporacion').datepicker({
    dateFormat: 'yy-mm-dd'
  });
</script>