<?php

require_once '../../conexion.php';
$id_trabajador = $_POST['id_trabajador'];
$nombre_documento = $_POST['nombre_documento'];
$archivo = $_FILES['archivo_documento'];
$id_usuario = $_COOKIE['id_usuario'];

    $sql = "INSERT INTO `documentos`(`id_trabajador`, `id_usuario`, `nombre_documento`, `fecha`) VALUES (:id_trabajador, :id_usuario, :nombre_documento, NOW())";
    $res = $conexion->prepare($sql);
    $res->execute([
      'id_trabajador' => $id_trabajador,
      'id_usuario' => $id_usuario,
      'nombre_documento' => $nombre_documento
    ]);

    $id_documento = $conexion->lastInsertId();
    $nombre_original = $archivo['name'];
    $extension = mb_strrchr($nombre_original,'.', false, "UTF-8");
    $ruta_bd = "trabajadores/documentos/" . $id_trabajador . "/" . $id_documento . $extension;
    $ruta_archivo = "../../trabajadores/documentos/" . $id_trabajador . "/" . $id_documento . $extension;
    $sql = "UPDATE `documentos` SET `ruta`=:ruta WHERE `id_documento` = :id_documento";
    $res = $conexion->prepare($sql);
    $res->execute([ 'id_documento'=> $id_documento,'ruta' => $ruta_bd]);

    $carpeta = "../../trabajadores/documentos/" . $id_trabajador;

    if (!is_dir($carpeta)) {
      mkdir($carpeta, 0777, true);
    }


    move_uploaded_file($archivo['tmp_name'], $ruta_archivo);

    require_once 'documentos_ventana.php';
?>