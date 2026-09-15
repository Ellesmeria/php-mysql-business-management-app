<?php

require_once '../../conexion.php';

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
  WHERE 1=1";
  $param =[];
  if (!empty($_POST['titulo'])) {
    $sql .= " AND `titulo` = :titulo";
    $param['titulo'] = $_POST['titulo'];
  }

  if (!empty($_POST['autor'])) {
    $sql .= " AND usuarios.nombre = :autor";
    $param['autor'] = $_POST['autor'];
  }
  if (empty($param)) {
    $sql = "SELECT * FROM `preguntas` WHERE 1=0";
  }
  else {
    $sql .= " GROUP BY preguntas.id_pregunta";
  }

  $res = $conexion->prepare($sql);
  $res->execute($param);
  require_once '../foro_tabla.php';
?>
