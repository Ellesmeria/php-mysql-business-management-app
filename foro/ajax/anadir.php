<?php

  require_once '../../conexion.php';

  $titulo = $_POST['titulo'];
  $pregunta = $_POST['pregunta'];
  $id_usuario =  $_COOKIE['id_usuario'];

  $sql = "INSERT INTO `preguntas`(`titulo`, `pregunta`, `id_usuario`, `fecha`) VALUES (:titulo, :pregunta, :id_usuario, NOW())";
  $res = $conexion->prepare($sql);
  $res->execute(['titulo' => $titulo, 'pregunta' => $pregunta, 'id_usuario' => $id_usuario]);
  $id_pregunta = $conexion->lastInsertId();
  require_once 'tr_anadir.php';

?>