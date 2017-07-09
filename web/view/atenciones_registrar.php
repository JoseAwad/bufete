
<script>
  function validarFormulario_formAddAtenciones() {
    var listaCampos = [
      {
        id: 'formAddAtencion_fechaHora',
        tipo: 'date',
        mensaje: 'Ingrese fecha de incorporación'
      },
      {
        id: 'formAddAtencion_idAbogado',
        tipo: 'number',
        mensaje: 'Ingrese nombre'
      },
      {
        id: 'formAddAtencion_idUsuario',
        tipo: 'number',
        mensaje: 'Ingrese dirección'
      },
      {
        id: 'formAddAtencion_valor',
        tipo: 'number',
        mensaje: 'Ingrese perfil'
      },
    ];
    return validarFormulario(listaCampos);
  }
</script>

<?php
  if(!empty($_SESSION['error_atenciones'])) {
    echo "<script>alert('".$_SESSION['error_atenciones']."');</script>";
    $_SESSION['error_atenciones']="";

  }
?>

<div class="container" style="width: 100%;">

  <form method="POST" action="../controller/atenciones.php?objeto=atenciones&accion=registrar&operacion=registrar"
        onsubmit="return validarFormulario_formAddAtenciones();">

  <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 formAddAtencion formData">
              <h1>Nueva Atencion</h1>
              <div class="casillaFormulario">
                <input type="text" id="formAddAtencion_fechaHora" name="fechaHora" >
              </div>
              <div class="casillaFormulario">
                <select id="formAddAtencion_idAbogado" name="idAbogados" class="selectPicker">
                <?php
                $data = Abogado::buscarTodos("","",1);
                echo '<option value="-1" selected="true" disabled>'."Seleccione abogado".'</option>';
                foreach ($data as $value) {
                echo '<option id="abogado_'.$value->id.'" value="'.$value->id.'" valorHora="'.$value->valorHora.'">'.$value->nombreCompleto.'</option>';
                }?>
                </select>
              </div>
              <div class="casillaFormulario">
                <select id="formAddAtencion_idUsuario" name="idUsuarios" class="selectPicker">
                <?php
                $data = Usuario::buscarTodosPorPerfil("","",Usuario::$PERFIL_CLIENTE);
                echo '<option value="-1" selected="true" disabled>'."Seleccione cliente".'</option>';
                foreach ($data as $value) {
                echo '<option value="'.$value->id.'">'.$value->rutNumero." - ".$value->nombreCompleto.'</option>';
                }?>
                </select>
              </div>
              <div class="casillaFormulario">
                <input type="number" readOnly id="formAddAtencion_valor" name="valor">
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
  $('#formAddAtencion_fechaHora').datetimepicker();

  $('#formAddAtencion_idAbogado').change(function() {
    var idAbogado = $(this).val();
    var valorHora = $('#abogado_' + idAbogado).attr('valorHora');
    $('#formAddAtencion_valor').val(valorHora);
  });

</script>
