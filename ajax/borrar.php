<?php

  $tabla = $_POST['tabla'];
  require_once '../conexion.php';
  require_once '../' . $tabla . '/' . $tabla . '_config.php';
  $id_tabla = $_POST[$id];
  $sql = "DELETE FROM `$tabla` WHERE `$id` = :$id";
  $res = $conexion->prepare($sql);
  $res->execute([$id=> $id_tabla]);
?>