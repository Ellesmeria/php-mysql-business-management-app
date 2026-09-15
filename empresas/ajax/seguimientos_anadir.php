<?php
    
    require_once '../../conexion.php';
    $id_empresa = $_POST['id_empresa'];
    $id_servicio = $_POST['id_servicio'];
    $tipo_contacto = $_POST['tipo_contacto'];
    $comentario = $_POST['comentario'];

    $sql = "INSERT INTO `seguimientos`(`id_empresa`, `id_servicio`, `tipo_contacto`, `comentario`, `fecha`) VALUES (:id_empresa, :id_servicio, :tipo_contacto, :comentario, NOW())";
    $res = $conexion->prepare($sql);
    $res->execute(['id_empresa' => $id_empresa, 'id_servicio' => $id_servicio, 'tipo_contacto' => $tipo_contacto, 'comentario' => $comentario]);
    $id_seguimiento  = $conexion->lastInsertId();
    require_once 'tr_seguimientos_anadir.php';
    

?>