<?php 
require_once '../../conexion.php';

$busqueda = '%' . (isset($_POST['busqueda']) ? $_POST['busqueda'] : '') . '%';
        
            $sql = "SELECT 
              preguntas.id_pregunta,
              preguntas.fecha,
              preguntas.titulo,
              CASE 
                WHEN CHAR_LENGTH(preguntas.pregunta) > 200
                THEN CONCAT(LEFT(preguntas.pregunta,200),'...')
                ELSE preguntas.pregunta
                END AS `pregunta_corto`, 
              COUNT(respuestas.id_respuesta) AS cantidad_respuestas,
              usuarios.nombre AS autor 
            FROM `preguntas` 
            LEFT JOIN respuestas 
              ON respuestas.id_pregunta = preguntas.id_pregunta
            LEFT JOIN usuarios
              ON preguntas.id_usuario = usuarios.id_usuario  
            WHERE preguntas.pregunta LIKE :pregunta
            GROUP BY preguntas.id_pregunta";

            $res = $conexion->prepare($sql);
            $res->execute([
              'pregunta' => $busqueda
            ]);
require_once '../foro_tabla.php';
?>