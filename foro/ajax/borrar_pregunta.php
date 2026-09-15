<?php
  require_once '../../conexion.php';
  $id_pregunta = $_POST['id_pregunta'];
  $sql = "DELETE FROM `preguntas` WHERE `id_pregunta` = :id_pregunta";
  $res = $conexion->prepare($sql);
  $res->execute(['id_pregunta'=> $id_pregunta]);

?>