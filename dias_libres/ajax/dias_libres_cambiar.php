<?php
require_once '../../conexion.php';


$id_ausencia = $_POST['id_ausencia'];
$sql = "SELECT * from `dias_libres` WHERE `id_ausencia` = :id_ausencia";
$res = $conexion->prepare($sql);
$res->execute(['id_ausencia'=> $id_ausencia]);
$fila = $res->fetch();
$fecha = $_POST['fecha'];
$id_trabajador = $fila['id_trabajador'];
$fecha_inicio = $fila['fecha_inicio'];
$fecha_fin = $fila['fecha_fin'];
$motivo = $fila['motivo'];

if($_POST['motivo'] !== 'laboral') {
  $sql = "INSERT INTO `dias_libres`(`id_trabajador`, `fecha_inicio`, `fecha_fin`, `motivo`) VALUES (:id_trabajador, :fecha_inicio, :fecha_fin, :motivo)";
  $res = $conexion->prepare($sql);
  $res->execute([
    'id_trabajador' => $id_trabajador,
    'fecha_inicio' => $fecha,
    'fecha_fin' => $fecha,
    'motivo' => $_POST['motivo']
  ]);
}
$sql = "DELETE FROM `dias_libres` WHERE `id_ausencia` = :id_ausencia";
$res = $conexion->prepare($sql);
$res->execute([
  'id_ausencia' => $id_ausencia
]);

if ($fecha !== $fila['fecha_fin']) {

  $sql = "INSERT INTO `dias_libres`(`id_trabajador`, `fecha_inicio`, `fecha_fin`, `motivo`) VALUES (:id_trabajador, :fecha_inicio, :fecha_fin, :motivo)";
  $res = $conexion->prepare($sql);
  $res->execute([
    'id_trabajador' => $id_trabajador,
    'fecha_inicio' => date('Y-m-d', strtotime($fecha . ' +1 day')),
    'fecha_fin' => $fila['fecha_fin'],
    'motivo' => $fila['motivo']
  ]);
}

if ($fecha !== $fila['fecha_inicio']) {
  $sql = "INSERT INTO `dias_libres`(`id_trabajador`, `fecha_inicio`, `fecha_fin`, `motivo`) VALUES (:id_trabajador, :fecha_inicio, :fecha_fin, :motivo)";
  $res = $conexion->prepare($sql);
  $res->execute([
    'id_trabajador' => $id_trabajador,
    'fecha_inicio' => $fila['fecha_inicio'],
    'fecha_fin' => date('Y-m-d', strtotime($fecha . ' -1 day')),
    'motivo' => $fila['motivo']
  ]);
}



