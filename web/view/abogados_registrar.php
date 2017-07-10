<script>
  function validarFormulario_formAddAbogado() {
    var listaCampos = [
      {
        id: 'formAddAbogado_rutNumero',
        tipo: 'number',
        mensaje: 'Ingrese rut'
      },
      {
        id: 'formAddAbogado_dvNumero',
        tipo: 'text',
        mensaje: 'Ingrese dígito verificador'
      },
      {
        id: 'formAddAbogado_nombreCompleto',
        tipo: 'text',
        mensaje: 'Ingrese nombre'
      },
      {
        id: 'formAddAbogado_fechaContratacion',
        tipo: 'text',
        mensaje: 'Ingrese fecha de contratación'
      },
      {
        id: 'formAddAbogado_idEspecialidad',
        tipo: 'number',
        mensaje: 'Seleccione especialidad'
      },
      {
        id: 'formAddAbogado_valorHora',
        tipo: 'number',
        mensaje: 'Seleccione valor hora'
      }
    ];

    var rutCompleto = $('#formAddAbogado_rutNumero').val() + '-' + $('#formAddAbogado_dvNumero').val()
    if (!validaRut(rutCompleto)) {
      alert('Ingrese un rut valido');
      return false;
    } 

    return validarFormulario(listaCampos);
  }
</script>

<?php
  if(!empty($_SESSION['error_abogados'])) {
    echo "<script>alert('".$_SESSION['error_abogados']."');</script>";
    $_SESSION['error_abogados'] = '';
  }
?>

<div class="container" style="width: 100%;">

  <form method="POST" action="../controller/abogados.php?objeto=abogados&accion=registrar&operacion=registrar"
        onsubmit="return validarFormulario_formAddAbogado();">
  
  <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 formAddAbogado formData">
              <h1>Nuevo abogado</h1>
              <div class="casillaFormulario">
                <input type="text" id="formAddAbogado_rutNumero" name="rutNumero" placeholder="Ingrese rut" maxlength="10">-
                <input type="text" id="formAddAbogado_dvNumero" name="dvNumero" class="digitoVerficador" placeholder="Dv" maxlength="1">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddAbogado_nombreCompleto" name="nombreCompleto" placeholder="Ingrese nombre" maxlength="100">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddAbogado_fechaContratacion" name="fechaContratacion" placeholder="fecha contratacion"  maxlength="20">
              </div>  
              <div class="casillaFormulario">
                <select id="formAddAbogado_idEspecialidad" name="idEspecialidad" class="selectPicker">
                <?php
                $data = Especialidad::buscarTodos();
                echo '<option value="-1" selected disabled>'."Seleccione especialidad".'</option>';
                foreach ($data as $value) {
                    echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
                }?>
                </select>
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddAbogado_valorHora" name="valorHora" placeholder="Ingrese valor hora" maxlength="10">
              </div>  
              <div>
                  <button type="submit" class="btn">Contratar</button>
              </div>
        </div>  
        <div class="col-lg-1"></div>
    </div>
  </form>

</div>

<script>
  $('#formAddAbogado_fechaContratacion').datepicker({
    dateFormat: 'yy-mm-dd'
  });
</script>