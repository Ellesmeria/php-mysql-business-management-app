<?php
require_once '../conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 28px;
      background: #F4F7FB;
      font-family: Arial, sans-serif;
      color: #1F2937;
    }

    header {
      margin-bottom: 24px;
      background: #FFFFFF;
      border: 1px solid #B8C7D9;
      border-radius: 10px;
      padding: 24px 28px;
    }

    .titulo h1 {
      margin: 0 0 16px;
      font-size: 26px;
      line-height: 1.25;
      color: #111827;
    }

    .pregunta_autor_fecha {
      display: flex;
      align-items: center;
      gap: 12px;
      padding-bottom: 14px;
      margin-bottom: 18px;

      border-bottom: 1px solid #DDE3EC;

      font-size: 14px;
      color: #4B5563;
    }

    .autor_fecha b {
      color: #111827;
    }

    .fecha {
      color: #878e98;
      font-size: 10px;
    }

    .pregunta p {
      margin: 0;
      font-size: 15px;
      color: #111827;
      white-space: pre-line;
    }

    
    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 12px;
    }
    
    td {
      border-top: 1px solid #B8C7D9;
      border-bottom: 1px solid #B8C7D9;
      vertical-align: top;
    }

    td:first-child {
      border-left: 1px solid #B8C7D9;
    }

    td:last-child {
      border-right: 1px solid #B8C7D9;
    }

    .respuesta_autor_fecha {
      width: 110px;
      padding: 16px 8px;
      border-radius: 10px 0 0 10px;
      text-align: center;
      border-right: 1px solid #DDE3EC;
      background: #FFFFFF;
    }

    .respuesta_autor {
      margin-bottom: 18px;

      font-size: 16px;
      font-weight: bold;
      color: #111827;
    }

    .respuesta_texto {
      padding: 14px 16px;
      border-radius: 0 10px 10px 0;
      font-size: 15px;
      color: #111827;
      background: #FFFFFF;
      word-wrap: break-word;
    }

  </style>
</head>
<body>
  <?php
  $id_pregunta = $_POST['descargar'];

  $sql = "SELECT 
  respuestas.id_respuesta,
  preguntas.titulo,
  preguntas.pregunta,
  autor_pregunta.nombre AS autor_pregunta,
  preguntas.fecha AS fecha_pregunta,
  autor_respuesta.nombre AS autor_respuesta,
  respuestas.fecha AS fecha_respuesta,
  respuestas.texto
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
  <header>
    <div class="titulo">
    <h1><?= $filas[0]['titulo'] ?></h1>
    <div class="pregunta_autor_fecha">
      <img src="" alt="">Autor: <b><?= $filas[0]['autor_pregunta'] ?? 'Usuario eliminado' ?></b>
      <img src="" alt=""><span class="fecha"><?= $filas[0]['fecha_pregunta'] ?></span>
    </div>
  </div>
  <div class="pregunta">
    <p>
      <?= $filas[0]['pregunta'] ?>
    </p>
  </div>
  </header>
  <main>
    <table>
    <?php
    foreach ($filas as $fila) {

      if ($fila['id_respuesta']) {
      ?>
      <tr>
        <td class="respuesta_autor_fecha"><div class="respuesta_autor"><?= $fila['autor_respuesta'] ?? 'Usuario eliminado'?></div>
          <div class="fecha"><?= $fila['fecha_respuesta']?></div></td>
        <td class="respuesta_texto"><?= $fila['texto'] ?></td>
      </tr>
      <?php
      }
    }

  ?>
    </table>
  </main>
</body>
</html>
