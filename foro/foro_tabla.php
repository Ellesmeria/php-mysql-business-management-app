<div class="main_table">  
  <table class="foro_table">
    <tr>
      <th>Pregunta</th>
      <th>Cantidad de mensajes</th>
      <th>Autor</th>
      <th>Acciones</th>
    </tr>
    <?php  
  while ($fila = $res->fetch()) { ?>
    <tr data-id= <?= $fila['id_pregunta'] ?>>
      <td class="foro_titulo_pregunta">
        <form action="" method="post" class="mostrar_mas_pregunta">
          <button type="submit" name="mostrar_mas" value="<?=$fila['id_pregunta'] ?>"><span class="foro_titulo"><?= $fila['titulo']?></span></button>
        </form>
        <p class="foro_pregunta"><?= $fila['pregunta_corto'] ?></p>
      </td>
      <td><?= $fila['cantidad_respuestas'] ?></td>
      <td>
        <div class="foro_autor_fecha">
          <span class="foro_autor"><?= $fila['autor'] ?? 'Usuario eliminado'?></span>
          <span class="foro_fecha"><?= $fila['fecha'] ?></span>
        </div>
      </td>
      <td>
        <div>
          <form action="foro.php" method="post" class="worker-actions">
            <button type="submit" name="borrar" value="<?= $fila['id_pregunta'] ?>" class="buttons_icons button_borrar">
              <img src="../img/borrar.png" alt="Borrar" class="icon">
            </button>
          </form>
        </div>
    </td>
    </tr>
      <?php
  }
  ?>
    </table>
  </div>