<?php

require_once '../../conexion.php';
$id_ausencia = $_POST['id_ausencia'];
$sql = "DELETE FROM `dias_libres` WHERE `id_ausencia` = :id_ausencia";
$res = $conexion->prepare($sql);
$res->execute([
  'id_ausencia' => $id_ausencia
]);

?>