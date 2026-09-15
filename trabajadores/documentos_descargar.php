<?php

require_once '../conexion.php';

$id_documento = $_GET['id_documento'];

$sql = "SELECT `ruta`, `nombre_documento` FROM `documentos` WHERE `id_documento` = :id_documento";
$res = $conexion->prepare($sql);
$res->execute(['id_documento' => $id_documento]);
$fila = $res->fetch();
$ruta =  $fila['ruta'];
$nombre_documento = $fila['nombre_documento'] . '.' . pathinfo($fila['ruta'], PATHINFO_EXTENSION);


header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $nombre_documento . '"');
header('Content-Length: ' . filesize($ruta));
readfile($ruta); 
exit;
?>