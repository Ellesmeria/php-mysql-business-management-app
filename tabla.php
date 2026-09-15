

<div class="main_table">  
  <table>
    <tr>
    <?php
    require_once $_POST['tabla'] .'/'. $_POST['tabla'] .'_config.php';
    foreach($datos as $key=>$dato) {
      echo '<th>' . $key . '</th>';
    }
    ?>
    </tr>
    <?php

    while ($fila = $res->fetch()) {
      echo '<tr data-id="' . $fila[$id] . '">';
      foreach($datos as $dato) {
        echo '<td>';
        if (is_string($dato)) {
          echo $fila[$dato];
        }
        elseif(isset($dato['botones'])) {
          echo '<div><form action="" method="post" class="worker-actions">';
          foreach ($dato['botones'] as $boton) {
            if ($boton === 'cambiar') {
              echo '<button type="submit" name="cambiar" value="' . $fila[$id] . '" class="buttons_icons button_cambiar">
              <img src="../img/cambiar.png" alt="Cambiar" class="icon">
            </button>';
            }
            if ($boton === 'borrar') {
              echo '<button type="submit" name="borrar" value="' . $fila[$id] . '" class="buttons_icons button_borrar">
              <img src="../img/borrar.png" alt="Borrar" class="icon">
            </button>';
            }
            if ($boton === 'mostrar_mas') {
              echo '<button type="submit" name="mostrar_mas" value="' . $fila[$id]  . '" class="buttons_icons button_mostrar_mas"><img src="../img/mostrar.png" alt="Mostrar mas" class="icon"></button>';
            }

            if ($boton === 'documentos') {
              echo '<button type="button" name="documetos"  value="' . $fila[$id]  . '" class="buttons_icons button_documetos"><img src="../img/documentos.png" alt="Documentos" class="icon"></button>';
              $documentos = '<script src="../trabajadores/script_documentos.js"></script>';
            }
            if ($boton === 'imprimir') {
              $boton_imprimir =  '
              <form action="../descargar_pdf_vertical.php" method="post" target="_blank" class="worker-actions">
              <input type="hidden" name="descargar" value="' . $_POST['tabla'] . '">
              <input type="hidden" name="' . $id . '" value="' . $fila[$id] . '">
              <button type="submit" name="imprimir" class="buttons_icons button_imprimir"><img src="../img/imprimir.png" alt="Imprimir" class="icon"></button>
              </form>';
            }
            if($boton === 'dias_libres') {
              echo '<button type="button" name="dias_libres"  value="' . $fila[$id]  . '" class="buttons_icons button_dias_libres"><img src="../img/dias_libres.png" alt="Dias libres" class="icon"></button>';
              $dias_libres = '<script src="../trabajadores/script_dias_libres.js"></script>';
            }


            if($boton === 'descargar') {
              $boton_descargar = '<form action="../descargar_pdf.php" method="post"  target="_blank">
              <button type="submit" name="descargar" class="buttons_icons button_descargar" value="' . $_POST['tabla'] . '">
                <img src="../img/imprimir.png" alt="Imprimir" class="icon">
              </button>
            </form>';
            }
          }
          echo '</form>';
          echo isset($boton_imprimir) ? $boton_imprimir . '</div>' : '</div>';
        }
        else {
          foreach($dato as $parte) {
            if (isset($parte['texto'])) {
              echo $parte['texto'];
            }
            elseif(isset($parte['campo'])) {
              echo $fila[$parte['campo']] ?? $parte['default'];
            }
            elseif(isset($parte['fecha'])) {
              echo date('d/m/Y H:i', strtotime($fila[$parte['fecha']])); 
            }
            elseif(isset($parte['checkbox'])) {
              echo $fila[$parte['checkbox']];
            }
          }
        }
        echo '</td>';
      }
      echo '</tr>';
    }
    ?>
  </table>
  <?= $boton_descargar ?? '' ?>
</div>


