<?php

require_once '../../conexion.php';
$id_trabajador = $_POST['id_trabajador'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$motivo = $_POST['motivo'];

$sql = "INSERT INTO `dias_libres`(`id_trabajador`, `fecha_inicio`, `fecha_fin`, `motivo`) VALUES (:id_trabajador, :fecha_inicio, :fecha_fin, :motivo)";
$res = $conexion->prepare($sql);
$res->execute([
  'id_trabajador' => $id_trabajador,
  'fecha_inicio' => $fecha_inicio,
  'fecha_fin' => $fecha_fin,
  'motivo' => $motivo
]);

$id_ausencia = $conexion->lastInsertId();

$inicio = new DateTime($fecha_inicio);
$fin = new DateTime($fecha_fin);
$total_dias = $inicio->diff($fin)->days + 1;

require_once 'dias_libres_tr.php';
?>