<?php
  require_once '../../conexion.php';
  $id_seguimiento = $_POST['id_seguimiento'];
  $sql = "DELETE FROM `seguimientos` WHERE `id_seguimiento` = :id_seguimiento";
  $res = $conexion->prepare($sql);
  $res->execute(['id_seguimiento'=> $id_seguimiento]);
?>