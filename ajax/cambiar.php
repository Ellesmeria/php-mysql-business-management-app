<?php
  $tabla = $_POST['tabla'];
  require_once '../conexion.php';
  require_once '../' . $tabla . '/' . $tabla . '_config.php';
  $sets = [];
  $param = [];
  foreach ($datos_cambiar_anadir as $columna) {
    $columna_nombre = $columna[0];
    $sets[] = "`$columna_nombre`=:$columna_nombre";
    $param[$columna_nombre] = $_POST[$columna_nombre];
  }
  $param[$id] = $_POST[$id];

  $sql = "UPDATE `$tabla` SET ". implode(',',$sets) . " WHERE $id = :$id";
  $res = $conexion->prepare($sql);
  $res->execute($param);

  require_once 'tr_cambiar.php';
?>





