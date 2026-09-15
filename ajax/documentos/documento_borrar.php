<?php

require_once '../../conexion.php';
$id_documento = $_POST['id_documento'];
    


    $sql = "DELETE FROM `documentos` WHERE `id_documento` = :id_documento";
    $res = $conexion->prepare($sql);
    $res->execute([
      'id_documento' => $id_documento
    ]);

    require_once 'documentos_ventana.php';
?>