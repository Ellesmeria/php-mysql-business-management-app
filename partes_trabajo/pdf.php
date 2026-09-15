<?php
require_once 'conexion.php';
$id_parte_trabajo = $_POST['id_parte_trabajo'];

$sql = "SELECT * FROM `partes_trabajo` WHERE id_parte_trabajo = :id_parte_trabajo";  
$res = $conexion->prepare($sql);
$res->execute(['id_parte_trabajo' => $id_parte_trabajo]);
$fila = $res->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: DejaVu Sans, Arial, sans-serif;
      color: #1f2933;
      font-size: 14px;
      line-height: 1.55;
      margin: 35px;
    }

    h2 {
      font-size: 30px;
      color: #0b2d57;
      text-align: center;
      margin: 0 0 28px 0;
      padding-bottom: 10px;
      border-bottom: 2px solid #0b2d57;
      font-weight: 300;
    }

   .fecha_resultado {
      width: 260px;
      margin-left: auto;
      margin-right: 0;
      margin-bottom: 38px;
    }

    .fecha, .resultado {
      display: flex;
      align-items: center;
      padding: 8px 0;
      font-size: 14px;
    }

    span {
      margin-right:30px
    }

    .fecha span:first-child,
    .resultado span:first-child {
      font-weight: 700;
      color: #0b2d57;
    }

    .fecha span:last-child,
    .resultado span:last-child {
      color: #1f2933;
      text-align: left;
    }

    body > div:not(.fecha_resultado) {
      margin-bottom: 28px;
    }

    h3 {
      font-size: 20px;
      color: #0b2d57;
      margin: 0 0 10px 0;
      padding-bottom: 6px;
      border-bottom: 2px solid #0b2d57;
    }

    p {
      font-size: 14px;
      color: #1f2933;
      margin: 0;
      padding: 8px 0 14px 0;
    }

    
  </style>
</head>
<body>
  <h2>Partes de trabajo</h2>
  <div class="fecha_resultado">
    <div class="fecha">
      <span>Fecha:</span>
      <span><?= date('d/m/Y H:i', strtotime($fila['fecha'])) ?></span>
    </div>
    <div class="resultado">
      <span>Tarea resuelta:</span>
      <span><?= $fila['solucionado'] ?></span>
    </div>
  </div>
  <div>
    <h3>Problema</h3>
    <p><?= $fila['problema'] ?></p>
  </div>
  <div>
    <h3>Solución</h3>
    <p><?= $fila['solucion'] ?></p>
  </div>
  <div>
    <h3>Observaciones</h3>
    <p><?= $fila['observaciones'] ?></p>
  </div>
</body>
</html>