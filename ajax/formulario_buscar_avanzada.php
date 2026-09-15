<?php
  $tabla = $_POST['tabla'];
  require_once '../' . $tabla . '/' . $tabla . '_config.php';
?>

<div class="form_buscar_avanzada" id="div_buscar_avanzado">
  <form action="" method="post" class="buscar_avanzada_form">
    <h3>Buscar avanzada</h3>
    <?php
    foreach($columnas_buscar_avanzada as $key=>$columna) {
      if (is_string($columna)) {
        ?>
        <label for="<?= $columna ?>"><?= $key ?>:</label>
        <input type="text" name="<?= $columna ?>" id="<?= $columna ?>">
        <?php
      }
      else if ($columna[1] === 'intervalo') {
        ?>
        <label for="fecha_desde"><?= $key ?> desde:</label>
        <input type="datetime-local" name="fecha_desde" id="fecha_desde">

        <label for="fecha_hasta"><?= $key ?> hasta:</label>
        <input type="datetime-local" name="fecha_hasta" id="fecha_hasta">

        <?php
      }
    }

    ?>
    <div>
      <button id="form_buscar_avanzada_cerrar" type="button" class="boton_buscar_avanzado_cerrar"><img src="../img/cerrar.png" alt="Cerrar" ></button>
      <button type="submit" name="buscar_avanzado" class="boton_buscar_avanzado_buscar"><img src="../img/buscar.png" alt="Buscar" ></button>
    </div>
  </form>
</div>