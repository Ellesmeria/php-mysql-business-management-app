<?php

require_once '../../conexion.php';

$year = $_POST['year'];
$month = $_POST['month'];

$fecha_inicio_mes = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-01';
$fecha_fin_mes = date('Y-m-t', strtotime($fecha_inicio_mes));

$sql = "SELECT 
          trabajadores.nombre,
          dias_libres.motivo,
          dias_libres.fecha_inicio,
          dias_libres.fecha_fin,
          dias_libres.id_ausencia
        FROM dias_libres
        LEFT JOIN trabajadores
          ON dias_libres.id_trabajador = trabajadores.id_trabajador
        WHERE dias_libres.fecha_inicio <= :fecha_fin_mes
          AND dias_libres.fecha_fin >= :fecha_inicio_mes";

$res = $conexion->prepare($sql);
$res->execute([
  'fecha_inicio_mes' => $fecha_inicio_mes,
  'fecha_fin_mes' => $fecha_fin_mes
]);

$ausencias = [];

while ($fila = $res->fetch()) {
  $inicio = new DateTime($fila['fecha_inicio']);
  $fin = new DateTime($fila['fecha_fin']);

  while ($inicio <= $fin) {
    $fecha = $inicio->format('Y-m-d');

    if ($fecha >= $fecha_inicio_mes && $fecha <= $fecha_fin_mes) {
      $ausencias[] = [
        'fecha' => $fecha,
        'nombre' => $fila['nombre'],
        'motivo' => $fila['motivo'],
        'id_ausencia' => $fila['id_ausencia']
      ];
    }

    $inicio->modify('+1 day');
  }
}

header('Content-Type: application/json');
echo json_encode($ausencias);