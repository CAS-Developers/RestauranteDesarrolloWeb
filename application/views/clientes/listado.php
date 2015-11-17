<?php
        if(isset($resultado)){
            if($resultado){
                echo "<p>Guardado correctamente</p>";
            }else{
                echo "<p>Error al guardar, ya existe el usuario</p>";
            }
        }

    ?>

<a class="btn btn-success" href="<?php echo base_url(); ?>index.php/crudclientes/crear" role="button">Crear Cliente</a>

	<table class="table table-hover">
		<tr>
			<td>Nombre</td>
			<td>Usuario</td>
			<td>Password</td>
			<td>Editar</td>
		</tr>
		<?php foreach($clientes as $fila){ ?>
		<tr>
        <td><?php echo $fila["nombre"]; ?></td>
        <td><?php echo $fila["usuario"]; ?></td>
        <td><?php echo "---"; ?></td>
        <td><?php echo anchor("crudusuarios/editar/".$fila["id"], 'Editar', 'title="Editar Usuario"'); ?></td>
        <td><?php echo anchor("crudusuarios/eliminar/".$fila["id"], 'Eliminar'); ?></td>
    </tr>
    <?php } ?>
    </table>
