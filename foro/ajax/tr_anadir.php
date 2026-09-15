<?php

$sql = "SELECT 
  preguntas.id_pregunta,
  preguntas.fecha,
  preguntas.titulo,
  CASE 
    WHEN CHAR_LENGTH(preguntas.pregunta) > 200
    THEN CONCAT(LEFT(preguntas.pregunta,200),'...')
    ELSE preguntas.pregunta
    END AS `pregunta_corto`, 
  COUNT(respuestas.id_respuesta) AS cantidad_respuestas,
  usuarios.nombre AS autor 
FROM `preguntas` 
LEFT JOIN respuestas 
  ON respuestas.id_pregunta = preguntas.id_pregunta
LEFT JOIN usuarios
  ON preguntas.id_usuario = usuarios.id_usuario  
WHERE preguntas.id_pregunta LIKE :id_pregunta
GROUP BY preguntas.id_pregunta";

$res = $conexion->prepare($sql);
$res->execute([
  'id_pregunta' => $id_pregunta
]);
$fila = $res->fetch();
?>
<tr data-id= <?= $fila['id_pregunta'] ?>>
      <td class="foro_titulo_pregunta">
        <form action="foro.php" method="post">
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
          

?>