<?php
  require_once '../../conexion.php';
  $id_empresa = $_POST['id_empresa'];
  $id_servicio = $_POST['id_servicio'];
  $sql = "DELETE FROM `seguimientos` WHERE `id_empresa` = :id_empresa AND id_servicio = :id_servicio";
  $res = $conexion->prepare($sql);
  $res->execute(['id_empresa'=> $id_empresa, 'id_servicio'=>$id_servicio]);

?>