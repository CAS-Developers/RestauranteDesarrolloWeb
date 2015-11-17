<!--<pre><?//php var_dump($cocineros); ?></pre>-->

<div class="col-md-6">
  <?php

      echo form_open("crudrecetas/guardar");
      ?>
      <form class="form-control">
        <label for="nombre"><br>Nombre</label>
        <?php  echo form_input('nombre', $rec->nombre, "class='form-control' placeholder='Nombre'");  ?>
        <label for="indicaciones"><br>Indicaciones</label>
        <?php echo form_TextArea('indicaciones', $rec->indicaciones, "class='form-control' placeholder='Nombre'");?>
        <label for="nombre"> <br> Cocinero </label>
        <?php  echo form_dropdown('id_cocinero', $cocineros, "---", "class='form-dropdown'" );  ?>
        <?php echo form_hidden('id', $rec->id); ?>
        <br>
        <br>
        <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
        <input type="reset" name="boton_reset" value="Resetear" class="btn btn-warning" >
      </form>
      <?php
      echo form_close();
      ?>
