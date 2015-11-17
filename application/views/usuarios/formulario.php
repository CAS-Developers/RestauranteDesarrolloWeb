<?php
  
    echo form_open("crudusuarios/guardar");
    ?>
    <table>
    <tr>
        <td>Nombre</td>
        <td>
            <?php
                echo form_input('nombre', $usu->nombre);
            ?>
        </td>
    </tr>
    <tr>
        <td>Usuario</td>
        <td>
            <?php
                echo form_input('usuario', $usu->usuario);
            ?>
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td>
            <?php
                echo form_password('password', '');
            ?>
        </td>
    </tr>
    </table>
    <?php
     echo form_hidden('id', $usu->id);
    ?>
    <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
    <input type="reset" name="boton_reset" value="Resetear" class="btn btn-warning" >
    <?php
    echo form_close();
    ?>