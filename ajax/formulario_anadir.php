<div class="data_form">
  <form action="" method="post" class="data_form_anadir">

<?php
  $tabla = $_POST['tabla'];
  require_once '../' . $tabla . '/' . $tabla . '_config.php';
  foreach($datos_cambiar_anadir as $key=>$columna) {
    if ($columna[1] === 'text'){
    ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <input type="text" name=<?= $columna[0] ?> id=<?= $columna[0] ?>>
    <?php
    }
    elseif($columna[1] === 'textarea') {
    ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <textarea name="<?= $columna[0] ?>" id="<?= $columna[0] ?>"></textarea>
    <?php
    }
    elseif($columna[1] === 'select') {
    ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <select name="<?= $columna[0] ?>" id="<?= $columna[0] ?>">
      <?php
      $i=1;
      foreach($columna[2] as $option_text => $option) {
        if ($columna[3] == $i){
        ?>
        <option value="<?= $option ?>" selected><?= $option_text ?></option>
        <?php
        }
        else {
          ?>
          <option value="<?= $option ?>"><?= $option_text ?></option>
          <?php
        }
        $i++;
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
      <input type="datetime-local" name="<?= $columna[0] ?>" value="" id="<?= $columna[0] ?>">
      <?php
    }
    elseif($columna[1] === 'checkbox') {
      ?>
      <label for="<?= $columna[0] ?>"><?= $key ?>:</label>
      <input type="hidden" name="<?= $columna[0] ?>" value="No">
      <input type="checkbox" name="<?= $columna[0] ?>" id="<?= $columna[0] ?>" value="Si" class="checkbox">
      <?php
    }
  }
?>
    <div class="data_form_buttons">
      <button type="submit" name="guardar" class="data_boton_guardar"><img src="../img/guardar.png" alt="Guardar" class="icon"></button>
      <button type="button" class="data_boton_volver"><img src="../img/volver.png" alt="Volver" class="icon"></button>
    </div>
    
  </form>
</div>  