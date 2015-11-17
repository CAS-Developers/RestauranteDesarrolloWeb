<?php

    echo form_open("crudclientes/guardar");
    ?>
    <table>
    <tr>
        <td>Nombre</td>
        <td>
            <?php
                echo form_input('nombre', $cli->nombre);
            ?>
        </td>
    </tr>
    <tr>
        <td>Usuario</td>
        <td>
            <?php
                echo form_input('direccion', $cli->direccion);
            ?>
        </td>
    </tr>
    <tr>
        <td>Telefono</td>
        <td>
            <?php
                echo form_input('telefono',$cli->telefono);
            ?>
        </td>
    </tr>
    </table>
    <?php
     echo form_hidden('id', $cli->id);
    ?>
    <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary" />
    <input type="reset" name="boton_reset" value="Resetear" class="btn btn-warning" >
    <?php
    echo form_close();
    ?>
