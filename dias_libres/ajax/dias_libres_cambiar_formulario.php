<?php

$tabla = 'dias_libres';
$id = 'id_ausencia';
$datos_cambiar_anadir = [
  'Fecha'=>['fecha', 'hidden'],
  'Motivo'=>['motivo','select',['Enfermedad'=>'enfermedad','Vacaciones'=>'vacaciones','Asuntos propios'=>'asuntos_propios','Fuerza mayor'=>'fuerza_mayor', 'Laboral'=>'laboral'],1]
];
require_once '../../conexion.php';
$id_fila = $_POST[$id];
$sql = "SELECT * FROM `$tabla` WHERE `$id` = ?";
$res = $conexion->prepare($sql);
$res->bindValue(1, $id_fila, PDO::PARAM_INT);
$res->execute();
$fila = $res->fetch();
?>
<div class="data_form">
  <form action="" method="post" class="dias_libres_data_form_cambiar">
    <?php
    foreach($datos_cambiar_anadir as $key=>$columna) {
    if ($columna[1] === 'text'){
    ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <input type="text" name=<?= $columna[0] ?> id=<?= $columna[0] ?> value="<?= $fila[$columna[0]] ?>">
    <?php
    }
    elseif($columna[1] === 'textarea') {
    ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <textarea name="<?= $columna[0] ?>" id="<?= $columna[0] ?>"><?= $fila[$columna[0]] ?></textarea>
    <?php
    }
    elseif($columna[1] === 'hidden') {
    ?>
      <input type="hidden" name="<?= $columna[0] ?>" value="<?=$_POST[$columna[0]] ?>" id="<?= $columna[0] ?>">
    <?php
    }
    elseif($columna[1] === 'select') {
    ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <select name="<?= $columna[0] ?>" id="<?= $columna[0] ?>">
      <?php
      $i=1;
      foreach($columna[2] as $option_text => $option) {
        ?>
        <option value="<?= $option ?>" <?=$fila[$columna[0]] === $option ? 'selected': '' ?> ><?= $option_text ?></option>
        <?php
      }
      ?>
      </select>
      <?php
    } 
    elseif($columna[1] === 'id') {
      ?>
      <input type="hidden" name="<?= $columna[0] ?>" value="<?=$_COOKIE[$columna[0]] ?>" id="<?= $columna[0] ?>">
      <?php
    }
    elseif($columna[1] === 'datetime') {
      ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <input type="datetime-local" name="<?= $columna[0] ?>" value="<?= $fila[$columna[0]] ?>" id="<?= $columna[0] ?>">
      <?php
    }
    elseif($columna[1] === 'date') {
      ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <input type="date" name="<?= $columna[0] ?>" value="<?= $fila[$columna[0]] ?>" id="<?= $columna[0] ?>">
      <?php
    }
    elseif($columna[1] === 'checkbox') {
      $texto_checkbox =  $fila[$columna[0]]=== 'Si' ? 'value="Si" checked' : 'value="Si"';
      ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <input type="hidden" name="<?= $columna[0] ?>" value="No">
      <input type="checkbox" name="<?= $columna[0] ?>" id="<?= $columna[0] ?>" <?= $texto_checkbox ?>  class="checkbox">
      <?php
    }
  }
?>
    <div class="data_form_buttons">
      <button type="submit" name="guardar" class="data_boton_guardar" value ="<?= $id_fila ?>"><img src="../img/guardar.png" alt="Guardar" class="icon"></button>
      <button type="button" class="data_boton_volver"><img src="../img/volver.png" alt="Volver" class="icon"></button>
    </div>
  </form>
</div>
