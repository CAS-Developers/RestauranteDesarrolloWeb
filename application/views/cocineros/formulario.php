<div class="col-md-6">
  <?php

      echo form_open("crudcocineros/guardar");
      ?>
      <form class="form-control">
        <label for="nombre"><br>Nombre </label>
        <?php  echo form_input('nombre', $coc->nombre, "class='form-control' placeholder='Nombre'");  ?>
        <label for="empresa"><br>Empresa</label> <br>
        <?php echo form_input('empresa', $coc->empresa, "class='form-control' placeholder='Escriba su lugar de trabajo'");?>
        <label for="pais"><br>Pais de nacimiento</label>
        <?php echo form_input('pais', $coc->pais, "class='form-control' placeholder='Ejemplo: Colombia'");?>
        <?php echo form_hidden('id', $coc->id); ?>
        <br>
        <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
        <input type="reset" name="boton_reset" value="Resetear" class="btn btn-warning" >
      </form>
      <?php
      echo form_close();
      ?>
