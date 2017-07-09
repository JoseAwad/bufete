<div class="container" style="width: 100%;">
  abogados registrar

  <form method="POST" action="../controller/abogados.php?objeto=abogados&accion=registrar&operacion=registrar">
  <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 Formulario_AddUser">
            <h1>Nuevo abogado</h1>
            <form action="../Controlador/usuario.php" method="POST">
              <input type="hidden" name="accion" value="agregar" id="accion">
              <input type="hidden" name="idUsuario" value="" id="idUsuario">
              <div class="casilla_addUser">
                <input type="text" class="" id="rutNumero" name="rutNumero" placeholder="Ingrese rut">
              </div>
              <div class="casilla_addUser">
                <input type="text" class="" id="nombreCompleto" name="nombreCompleto" placeholder="Ingrese nombre">
              </div>
              <div class="casilla_addUser">
                <input type="date" class="" id="fechaContratacion" name="fechaContratacion" placeholder="Ingrese fecha contratacion">
              </div>  
               <div class="casilla_addUser">
              <select name="idEspecialidad" class="selectpicker" data-style="btn">
                <?php
                require('../model/especialidad.class.php');
                $data = Especialidad::buscarTodos();
                echo '<option value="" selected="true" disabled>'."Seleccione especialidad".'</option>';
                foreach ($data as $value) {
                    echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
                }?>
                </select>
              </div>
              <div class="casilla_addUser">
                <input type="number" class="" id="valorHora" name="valorHora" placeholder="Ingrese valor hora">
              </div>  
              <div>
                  <button  type="submit" class="addUsuario_btn"><img class="img_AddUser" src="img/addUser2.png">Agregar</button>
              </div>
            </form>
        </div>  
        <div class="col-lg-1"></div>
    </div>
  </form>

</div>
