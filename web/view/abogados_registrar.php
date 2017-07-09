<div class="container" style="width: 100%;">

<script>
  function validarFormulario_formAddAbogado() {
    var listaCampos = [
      {
        id: 'formAddAbogado_rutNumero',
        tipo: 'number',
        mensaje: 'Ingrese rut'
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
    return validarFormulario(listaCampos);
  }
</script>

<?php
  if(!empty($_SESSION['error_abogados'])) {
    echo "<script>alert('".$_SESSION['error_abogados']."');</script>";
    $_SESSION['error_abogados'] = '';
  }
?>

  <form method="POST" action="../controller/abogados.php?objeto=abogados&accion=registrar&operacion=registrar"
        onsubmit="return validarFormulario_formAddAbogado();">
  <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 formAddAbogado">
              <h1>Nuevo abogado</h1>
              <div class="casillaFormulario">
                <input type="text" id="formAddAbogado_rutNumero" name="rutNumero" placeholder="Ingrese rut" maxlength="10">-
                <input type="text" id="formAddAbogado_dvNumero" name="dvNumero" placeholder="Ingrese digito verificador" maxlength="1">
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddAbogado_nombreCompleto" name="nombreCompleto" placeholder="Ingrese nombre">
              </div>
              <div class="casillaFormulario">
                <input type="date" id="formAddAbogado_fechaContratacion" name="fechaContratacion" placeholder="Ingrese fecha contratacion">
              </div>  
              <div class="casillaFormulario">
                <select id="formAddAbogado_idEspecialidad" name="idEspecialidad" class="selectpicker" data-style="btn">
                <?php
                $data = Especialidad::buscarTodos();
                echo '<option value="-1" selected="true" disabled>'."Seleccione especialidad".'</option>';
                foreach ($data as $value) {
                    echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
                }?>
                </select>
              </div>
              <div class="casillaFormulario">
                <input type="text" id="formAddAbogado_valorHora" name="valorHora" placeholder="Ingrese valor hora">
              </div>  
              <div>
                  <button type="submit" class="btn">Agregar</button>
              </div>
        </div>  
        <div class="col-lg-1"></div>
    </div>
  </form>

</div>
