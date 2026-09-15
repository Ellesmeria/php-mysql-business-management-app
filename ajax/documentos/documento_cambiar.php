<?php

require_once '../../conexion.php';
$id_documento = $_POST['id_documento'];
$nombre_documento = $_POST['nombre_documento'];

$sql = "UPDATE `documentos` SET `nombre_documento`=:nombre_documento WHERE `id_documento` = :id_documento";
    
$res = $conexion->prepare($sql);
$res->execute([
  'id_documento' => $id_documento,
  'nombre_documento' =>$nombre_documento
]);

require_once 'documentos_ventana.php';
?>