<?php 

$tabla = $_POST['tabla'];
require_once '../conexion.php';
require_once '../' . $tabla . '/' . $tabla . '_config.php';
$busqueda = '%' . (isset($_POST['busqueda']) ? $_POST['busqueda'] : '') . '%';
  $condiciones = [];
  $param = [];
  foreach($columnas_buscar as $columna) {
    $condiciones[] = "`$columna` LIKE :$columna";
    $param[$columna] = $busqueda;
  }
  $sql = ($sql_principio ?? "SELECT * FROM `$tabla`");
  $sql .=" WHERE " . implode(' OR ',$condiciones) . " ";
  $sql .= $sql_fin ?? '';

$res = $conexion->prepare($sql);
$res->execute($param);
require_once '../tabla.php';
?>