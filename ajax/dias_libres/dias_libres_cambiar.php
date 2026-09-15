<?php

require_once '../../conexion.php';
$id_ausencia = $_POST['id_ausencia'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$motivo = $_POST['motivo'];

$inicio = new DateTime($fecha_inicio);
$fin = new DateTime($fecha_fin);
$total_dias = $inicio->diff($fin)->days + 1;

$sql = "UPDATE `dias_libres` SET `fecha_inicio`=:fecha_inicio, `fecha_fin`=:fecha_fin, `motivo`=:motivo WHERE `id_ausencia` = :id_ausencia";
    
$res = $conexion->prepare($sql);
$res->execute([
  'id_ausencia' => $id_ausencia,
  'fecha_inicio' =>$fecha_inicio,
  'fecha_fin' => $fecha_fin,
  'motivo' =>$motivo
]);

require_once 'dias_libres_tr_cambiar.php';
?>