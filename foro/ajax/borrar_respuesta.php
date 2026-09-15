<?php
  
    require_once '../../conexion.php';
    $id_respuesta = $_POST['id_respuesta'];
    $sql = "SELECT `id_pregunta` FROM respuestas WHERE `id_respuesta` = :id_respuesta";
    $res = $conexion->prepare($sql);
    $res->execute(['id_respuesta' => $id_respuesta]);
    $fila = $res->fetch();
    $sql = "DELETE FROM `respuestas` WHERE `id_respuesta` = :id_respuesta";
    $res = $conexion->prepare($sql);
    $res->execute(['id_respuesta'=> $id_respuesta]);
  

?>