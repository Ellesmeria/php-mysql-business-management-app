<?php

  require_once '../../conexion.php';

  $texto = $_POST['texto'];
  $id_usuario = $_COOKIE['id_usuario'];
  $id_pregunta =  $_POST['id_pregunta'];
  $sql = "SELECT `nombre` from `usuarios` WHERE `id_usuario` = :id_usuario";
  $res = $conexion->prepare($sql);
  $res->execute(['id_usuario'=>$id_usuario]);
  $fila = $res->fetch(); 
  $nombre = $fila['nombre'];
  $sql = "INSERT INTO `respuestas`(`id_pregunta`, `id_usuario`, `texto`, `fecha`) VALUES (:id_pregunta, :id_usuario, :texto, NOW())";
  $res = $conexion->prepare($sql);
  $res->execute(['id_pregunta' => $id_pregunta, 'id_usuario' => $id_usuario, 'texto' => $texto]);
  $id_respuesta = $conexion->lastInsertId();
?>



<div data-id="<?=$id_respuesta ?>">
  <div class="foro_pregunta_pagina_respuestas_autor_fecha">
    <div>
      <?= $nombre ?> 
    </div>
    <div>
      <?= date('Y-m-d'); ?>
    </div>
  </div>
  <div class="foro_pregunta_pagina_respuestas_texto">
      <?= $texto ?>
  </div>
  <div class="foro_pregunta_pagina_respuestas_forms">
    <form action="" method="post" class="worker-actions">
      <button type="submit" name="borrar_respuesta" value="<?= $id_respuesta ?>" class="buttons_icons button_borrar"><img src="../img/borrar.png" alt="Borrar" class="icon"></button>
    </form>
  </div>
</div>
