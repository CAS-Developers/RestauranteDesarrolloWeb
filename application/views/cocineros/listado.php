<?php
        if(isset($resultado)){
            if($resultado){
                echo "<p>Guardado correctamente</p>";
            }else{
                echo "<p>Error al guardar, ya existe el cocinero</p>";
            }
        }

    ?>
<table class="table table-hover"><br>
  <tr>
    <td>Nombre</td>
    <td>Empresa</td>
    <td>Pais</td>
    <td>Editar</td>
  </tr>
  <?php foreach($cocineros as $fila){ ?>
  <tr>
      <td><?php echo $fila["nombre"]; ?></td>
      <td><?php echo $fila["empresa"]; ?></td>
      <td><?php echo $fila["pais"]; ?></td>
      <td><?php echo anchor("crudcocineros/editar/".$fila["id"], 'Editar', 'title="Editar Cocinero"'); ?></td>
      <td><?php echo anchor("crudcocineros/eliminar/".$fila["id"], 'Eliminar'); ?></td>
  </tr>
  <?php } ?>
  </table>
