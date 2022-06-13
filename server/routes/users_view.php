<h2>Usuarios</h2>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="table">
        <div class="row">
            <div class="col">ID</div>
            <div class="col">Usuario</div>
            <div class="col">Password</div>
        </div>
        <?php

        foreach ($arrTable as $row) {
            echo '<div class="row">';
            echo '<div class="col">' . $row->id . '</div>';
            echo '<div class="col">' .  $row->user_name . '</div>';
            echo '<div class="col">' .  $row->password . '</div>';
            echo "<div class='col'><a href='index.php?m=edit&id={$row->id}'>Editar</a></div>";
            echo "<div class='col'><a href='index.php?m=delete&id={$row->id}'>Borrar</a></div>";
            echo '</div>';
        }
        ?>

        <div class="row">
            <div class="col"></div>
            <div class="col"><input type="text" name="usuario" size="10"></div>
            <div class="col"><input type="text" name="password" size="10"></div>
            <div class="col"><input type="submit" name="create" id="create" value="Insertar" size="10"></div>
        </div>

    </div>
</form>