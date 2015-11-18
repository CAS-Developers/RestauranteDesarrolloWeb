<?php
        if(isset($resultado)){
            if($resultado){
                echo "<p>Guardado correctamente</p>";
            }else{
                echo "<p>Error al guardar, ya existe el usuario</p>";
            }
        }

    ?>
<div class="">
  <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/crudclientes/crear" role="button" >Crear Cliente</a>
</div>
	<br><table class="table table-hover">
		<tr>
			<td>Nombre</td>
			<td>Direccion</td>
			<td>Telefono</td>
      <td>Receta Favorita</td>
			<td>Editar</td>
		</tr>
		<?php foreach($clientes as $fila){ ?>
		<tr>
        <td><?php echo $fila["nombre"]; ?></td>
        <td><?php echo $fila["direccion"]; ?></td>
        <td><?php echo $fila["telefono"]; ?></td>
        <td><?php echo $recetas[$fila["id_receta"]];?></td>
        <td><?php echo anchor("crudclientes/editar/".$fila["id"], 'Editar', 'title="Editar Cliente"'); ?></td>
        <td><?php echo anchor("crudclientes/eliminar/".$fila["id"], 'Eliminar'); ?></td>
    </tr>
    <?php } ?>
    </table>
