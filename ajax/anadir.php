<?php
    $tabla = $_POST['tabla'];
    require_once '../conexion.php';
    require_once '../' . $tabla . '/' . $tabla . '_config.php';
    $columnas = [];
    $placeholders = [];
    $param =[];
    foreach ($datos_cambiar_anadir as $columna) {
        $columnas[] = "`" . $columna[0] . "`";
        $placeholders[] = ":". $columna[0];
        $param[$columna[0]] = $_POST[$columna[0]];
    }

    $sql = "INSERT INTO `$tabla`(" . implode(', ', $columnas) . ") VALUES (" . implode(', ', $placeholders) . ")";
    $res = $conexion->prepare($sql);
    $res->execute($param);
    $param['id_'. $nombre_id] = $conexion->lastInsertId();

    require_once 'tr_anadir.php';
    

?>