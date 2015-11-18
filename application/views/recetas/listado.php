<div id="listaRecetas" >
  <?php
          if(isset($resultado)){
              if($resultado){
                  echo "<p>Guardado correctamente</p>";
              }else{
                  echo "<p>Error al guardar, ya existe la receta</p>";
              }
          }

      ?>
  <?php foreach ($recetas as $recetas_item){ ?>
    <br>

  		<div><blockquote>
        <h4><strong><?php echo $recetas_item["nombre"]; ?></strong></h4>
        <p class="text-justify">

  			<?php echo $recetas_item["indicaciones"]; ?><br><br>

        Realizada por: <?php echo $cocineros[$recetas_item["id_cocinero"]];?>

        <div class="" align="right">
          <a class="btn btn-success" href="<?php echo base_url('index.php/crudrecetas/editar/'.$recetas_item["id"]); ?>" role="button" >Editar</a>
          <a class="btn btn-danger" href="<?php echo base_url('index.php/crudrecetas/eliminar/'.$recetas_item["id"]); ?>" role="button" >Eliminar</a>
        </div>
      </p>
    </blockquote>
  		<hr></div>
  <?php } ?>
</div>
