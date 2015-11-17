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
	<h4><a href="#"> <strong><?php echo $recetas_item["nombre"]; ?></strong></a></h4>
		<div><blockquote><p class="text-justify">
			<?php echo $recetas_item["indicaciones"]; ?><br><br>
      Realizada por: <?php echo $cocineros[$recetas_item["id_cocinero"]]; ?>
    </p></blockquote>
		</div>
<?php } ?>
