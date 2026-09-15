<?php
require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    h2 {
      font-family: Arial, sans-serif;
      font-size: 22px;
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
      font-size: 11px;
    }

    th,
    td {
      border: 1px solid #999;
      padding: 8px;
      text-align: left;
      width: 20%;
    }

    th {
      background: #d9e2f3;
    }

    td:nth-child(odd) {
      background: #f2f6ff;
    }

    td:nth-child(even) {
      background: #ffffff;
    }
  </style>
</head>
<body>
  <h2>Tabla de trabajadores</h2>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Contraseña de PC</th>
      <th>IP</th>
      <th>Puerto</th>
      <th>Email</th>
    </tr>
    <?php
      $sql = "SELECT * FROM `trabajadores`";
      
      $res = $conexion->query($sql);

      while ($fila = $res->fetch()) {
        echo "<tr>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['contrasena_pc'] . "</td>";
            echo "<td>" . $fila['ip'] . "</td>";
            echo "<td>" . $fila['puerto'] . "</td>";
            echo "<td>" . $fila['email'] . "</td>";
        echo "<tr>";    
      }

    ?>
  </table>
</body>
</html>