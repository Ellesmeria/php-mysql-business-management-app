<?php

$tabla = $_POST['tabla'];
require_once '../conexion.php';
require_once '../' . $tabla . '/' . $tabla . '_config.php';

$sql = $sql_principio ?? "SELECT * FROM `" . $tabla . "` WHERE 1=1";
$param =[];
foreach($columnas_buscar_avanzada as $columna) {
  if($columna[1] === 'intervalo') {
    if (!empty($_POST['fecha_desde']) || !empty($_POST['fecha_hasta'])) {
      $fecha_desde = $_POST['fecha_desde'] ?: '1900-01-01 00:00:00';
      $fecha_hasta = $_POST['fecha_hasta'] ?: '9999-12-31 00:00:00';
      $sql .= " AND " . $columna[0] . " BETWEEN :fecha_desde AND :fecha_hasta ";
      $param['fecha_desde'] = $fecha_desde;
      $param['fecha_hasta'] = $fecha_hasta;
    }
  }
  elseif (!empty($_POST[$columna])) {
    $sql .= " AND " . $columna . " = :" . $columna ."";
    $param[$columna] = $_POST[$columna];
  }
}
$sql .= $sql_fin ?? '';
if (empty($param)) {
  $sql = "SELECT * FROM " . $tabla . " WHERE 1=0";
}
$res = $conexion->prepare($sql);
$res->execute($param);
require_once '../tabla.php';
?>