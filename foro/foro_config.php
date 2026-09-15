<?php
  $id = 'id_pregunta';

  $sql_principio = "SELECT 
        foro.id_pregunta,
        foro.fecha,
        foro.titulo,
        foro.pregunta,
        CASE 
          WHEN CHAR_LENGTH(foro.pregunta) > 200
          THEN CONCAT(LEFT(foro.pregunta,200),'...')
          ELSE foro.pregunta
          END AS `pregunta_corto`, 
        COUNT(respuestas.id_respuesta) AS cantidad_respuestas,
          usuarios.nombre AS autor 
        FROM `foro` 
        LEFT JOIN respuestas 
          ON respuestas.id_pregunta = foro.id_pregunta
        LEFT JOIN usuarios
          ON foro.id_usuario = usuarios.id_usuario"; 

    $sql_fin = "GROUP BY foro.id_pregunta";
  

  

  $pregunta = [
    ['texto'=>'<div class="foro_titulo_pregunta"><button type="button" name="mostrar_mas" value="'],
    ['campo'=>$id], 
    ['texto'=>'"><span class="foro_titulo">'],
    ['campo'=>'titulo'],
    ['texto'=>'</span></button><p class="foro_pregunta">'],
    ['campo'=>'pregunta_corto'],
    ['texto'=>'</p></div>']
  ];

  $autor = [
    ['texto'=>'<div class="foro_autor_fecha"><span class="foro_autor">'],
    ['campo'=>'autor', 'default' => 'Usuario eliminado'], 
    ['texto'=>'</span><span class="foro_fecha">'],
    ['campo'=>'fecha'],
    ['texto'=>'</span></div>']
  ];
  $datos = [
    'Pregunta'=>$pregunta, 'Cantidad de mensajes'=>'cantidad_respuestas','Autor'=>$autor,'Acciónes'=>['botones'=>['borrar']]
  ];  

  $datos_cambiar_anadir = [
    'Titulo'=>['titulo','text'],
    'Pregunta'=>['pregunta','textarea'],
    '1' => ['id_usuario','hidden'],
    '2' => ['fecha', 'hidden']
  ];
  $columnas_buscar = ['titulo', 'pregunta'];
  $columnas_buscar_avanzada = ['Titulo'=>'titulo','Autor'=>'autor'];
  $nombre_id = 'pregunta';

  ?>