<div class="col-md-6">
  <?php echo validation_errors(); ?>
  <?php echo form_open("crudclientes/guardar");?>

      <form class="form-control">
        <label for="nombre"><br>Nombre</label>
        <?php  echo form_input('nombre', $cli->nombre, "class='form-control' placeholder='Escriba su nombre'");  ?>
        <label for="direccion"><br>Direccion</label>
        <?php echo form_input('direccion', $cli->direccion, "class='form-control' placeholder='Escriba su direccion'");?>
        <label for="telefono"><br>Telefono</label>
        <?php echo form_input('telefono', $cli->direccion, "class='form-control' placeholder='Escriba su numero de telefono'");?>
        <label for="receta"> <br> Receta </label>
        <?php  echo form_dropdown('id_receta', $recetas, "---", "class='form-dropdown'" );  ?>
        <?php echo form_hidden('id', $cli->id); ?>
        <br>
        <br>
        <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
        <input type="reset" name="boton_reset" value="Resetear" class="btn btn-warning" >
      </form>
      <?php
      echo form_close();
      ?>
