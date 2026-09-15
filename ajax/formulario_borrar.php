<?php
  $tabla = $_POST['tabla'];
  require_once '../' . $tabla . '/' . $tabla . '_config.php';
?>

<div class="data_form">
  <form action="" method="post" class="data_form_borrar">
    <p>Estas segura de que quieres eliminar a la <?= $nombre_id?>?</p>
    <div>
      <button type="submit" name="borrar" value = "<?= $_POST[$id] ?>" class="data_boton_borrar"><img src="../img/borrar.png" alt="Borrar" class="icon icon_borrar"></button>
      <button type="button" class="data_boton_volver"><img src="../img/volver.png" alt="Volver" class="icon icon_volver"></button>
    </div>
  </form>
</div>
