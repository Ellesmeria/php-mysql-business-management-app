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
      width: 11%;
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
  <h2>Tabla de correos</h2>
  <table>
    <tr>
      <th>Tipo de cuenta</th>
      <th>Cuenta</th>
      <th>Puerto correo entrante</th>
      <th>Puerto correo saliente</th>
      <th>Servidor correo entrante</th>
      <th>Servidor correo saliente</th>
      <th>Seguridad correo entrante</th>
      <th>Seguridad correo saliente</th>
      <th>Password</th>
    </tr>
    <?php
      $sql = "SELECT * FROM `correos`";
      
      $res = $conexion->query($sql);

      while ($fila = $res->fetch()) {
        echo "<tr>";
            echo "<td>" . $fila['tipo_cuenta'] . "</td>";
            echo "<td>" . $fila['cuenta'] . "</td>";
            echo "<td>" . $fila['puerto_correo_entrante'] . "</td>";
            echo "<td>" . $fila['puerto_correo_saliente'] . "</td>";
            echo "<td>" . $fila['servidor_correo_entrante'] . "</td>";
            echo "<td>" . $fila['servidor_correo_saliente'] . "</td>";
            echo "<td>" . $fila['seguridad_correo_entrante'] . "</td>";
            echo "<td>" . $fila['seguridad_correo_saliente'] . "</td>";
            echo "<td>" . $fila['password'] . "</td>";
        echo "<tr>";    
      }

    ?>
  </table>
</body>
</html>










