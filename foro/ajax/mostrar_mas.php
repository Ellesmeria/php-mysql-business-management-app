<?php

  require_once '../../conexion.php';
  $id_pregunta = $_POST['id_pregunta'];
  
  $sql = "SELECT 
    preguntas.id_pregunta,
    preguntas.titulo,
    preguntas.pregunta,
    autor_pregunta.nombre AS autor_pregunta,
    preguntas.fecha AS fecha_pregunta,
    autor_respuesta.nombre AS autor_respuesta,
    respuestas.fecha AS fecha_respuesta,
    respuestas.texto,
    respuestas.id_respuesta
    FROM preguntas
    LEFT JOIN usuarios AS autor_pregunta
    ON preguntas.id_usuario = autor_pregunta.id_usuario
    LEFT JOIN respuestas
    ON respuestas.id_pregunta = preguntas.id_pregunta 
    LEFT JOIN usuarios AS autor_respuesta
    ON respuestas.id_usuario = autor_respuesta.id_usuario
    WHERE preguntas.id_pregunta = :id_pregunta";
  $res = $conexion->prepare($sql);
  $res->execute(['id_pregunta' => $id_pregunta]);
  $filas = $res->fetchAll(PDO::FETCH_ASSOC);
?>
  <div class="foro_pregunta_pagina">
    <div class="foro_pregunta_pagina_pregunta">
      <h2><?= $filas[0]['titulo'] ?></h2>
      <div class="foro_pregunta_pagina_pregunta_autor_fecha">
        <span>
          <img src="../img/usuario.png" alt="">
          <?= $filas[0]['autor_pregunta'] ?? 'Usuario eliminado' ?>
        </span>
        <span class="middot">&middot</span>
        <span>
          <img src="../img/calendario.png" alt="">
          <?= $filas[0]['fecha_pregunta'] ?>
        </span>
      </div>
      <div class ="foro_pregunta_pagina_pregunta_texto">
        <p>
          <?= $filas[0]['pregunta'] ?>
        </p>
      </div>
    </div>
    <div class="foro_pregunta_pagina_respuestas">
      <?php
      foreach ($filas as $fila) {
        if ($fila['id_respuesta']) {
          ?>
          <div data-id="<?=$fila['id_respuesta'] ?>">
            <div class="foro_pregunta_pagina_respuestas_autor_fecha">
              <div>
                <?= $fila['autor_respuesta'] ?? 'Usuario eliminado' ?> 
              </div>
              <div>
                <?= $fila['fecha_respuesta'] ?>
              </div>
            </div>
            <div class="foro_pregunta_pagina_respuestas_texto">
                <?= $fila['texto'] ?>
            </div>
            <div class="foro_pregunta_pagina_respuestas_forms">
              <form action="" method="post" class="worker-actions">
                <button type="submit" name="borrar_respuesta" value="<?= $fila['id_respuesta'] ?>" class="buttons_icons button_borrar"><img src="../img/borrar.png" alt="Borrar" class="icon"></button>
              </form>
            </div>
          </div>
          <?php      
        }
      }
      ?>
    </div>
    <div class="foro_pregunta_pagina_forms">
      
      <div class="foro_pregunta_pagina_forms_anadir">
        <h4>Agregar nueva resuesta</h4>
        <form action="anadir_comentario.php" method="post" class="foro_pregunta_anadir_comentario">
          <textarea name="texto" id="texto"></textarea>
          <div class="foro_pregunta_pagina_forms_accions">
            <button type="submit" name="guardar" value="<?= $filas[0]['id_pregunta'] ?>" class="buttons_icons button_descargar"><img src="../img/guardar.png" alt="Guardar"></button>
          </div>
        </form>
      </div>
      <div class="foro_pregunta_pagina_forms_descargar">
        <form action="descargar_pdf.php" method="post" target="_blank">
          <button type="submit" name="descargar" value="<?=$filas[0]['id_pregunta'] ?>" class="button_icon_pdf">
            <img src="../img/pdf.png" alt="PDF" class="icon_pdf">
            Descargar en PDF
          </button>
        </form>
      </div>
    </div>
  </div>
<?php

?>
