<?php
  require_once '../conexion.php';
  $nombre = $_COOKIE['nombre'] ?? '';
  $password = $_COOKIE['password'] ?? '';
  $user = $_COOKIE['user'] ?? '';
  $sql = "SELECT * from `usuarios` WHERE `nombre` = :nombre and `password` = :password and `user` = :user";
  $res = $conexion->prepare($sql);
  $res->execute(['nombre'=>$nombre, 'user'=>$user, 'password'=>$password]);
  $fila = $res->fetch(); 
  if ($fila) {
    $nombre_archivo = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    $titulo_pagina = ucfirst($nombre_archivo);
    $_POST['tabla'] = $nombre_archivo;
   
  ?>

<!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= $titulo_pagina ?></title>
      <link rel="stylesheet" href="../estilos.css">
    </head>
    <body>
      <header>
        <form action="" method="post" class="header_form_buscar">
          <div>
            <input type="text" name="busqueda" class="header_busqueda" placeholder="buscar">
            <button type="button" name="buscar"><img src="../img/buscar.png" alt="buscar" class="icon header_boton_buscar"></button>
          </div>
          <button type="button" class="header_form_buscar_avanzada"><div>Búsqueda<br>avanzada</div><img src="../img/busqueda_avanzada.png" alt="Búsqueda avanzada" class="icon"></button>
        </form>
        <h1><?= $titulo_pagina ?></h1>
        <form action="" method="post" class="header_form_anadir">
          <button type="submit" name="anadir"><img src="../img/nuevo.png" alt="" class="icon">Nuevo</button>
        </form>
      </header>
      <div class="contenido">
        <aside>
            <div class="aside_header">
              <h3>Bienvenido, <?= $nombre ?></h3>
            </div>
            <div class="aside_body">
              <div class="aside_links">
                <a href="../usuarios/usuarios.php" <?= $nombre_archivo==='usuarios' ? 'class="asside_links_active"': '' ?>>Usuarios</a>
                <a href="../trabajadores/trabajadores.php" <?= $nombre_archivo==='trabajadores' ? 'class="asside_links_active"': '' ?>>Trabajadores</a>
                <a href="../correos/correos.php" <?= $nombre_archivo==='correos' ? 'class="asside_links_active"': '' ?>>Correos</a>
                <a href="../foro/foro.php" <?= $nombre_archivo==='foro' ? 'class="asside_links_active"': '' ?>>Foro</a>
                <a href="../agenda/agenda.php" <?= $nombre_archivo==='agenda' ? 'class="asside_links_active"': '' ?>>Agenda</a>
                <a href="../servicios/servicios.php" <?= $nombre_archivo==='servicios' ? 'class="asside_links_active"': '' ?>>Servicios</a>
                <a href="../empresas/empresas.php" <?= $nombre_archivo==='empresas' ? 'class="asside_links_active"': '' ?>>Empresas</a>
              </div>
              <a href="../logout.php"><img src="../img/salir.png" alt="Salir"></img></a>
            </div>
        </aside>
        <main class="foro_main">
        <?php
    
        if (isset($_POST['anadir'])) {
          require_once "formulario_pregunta_anadir.php";
        }
        elseif (isset($_POST['borrar'])) {
          require_once "formulario_pregunta_borrar.php";
        }
        elseif (isset($_POST['borrar_respuesta'])) {
          require_once "formulario_respuesta_borrar.php";
        }
        elseif (isset($_POST['mostrar_mas']) || isset($_GET['mostrar_mas'])) {
          require_once "mostrar_mas_pregunta.php";
        }
        else {
          if (isset($_POST['buscar_avanzado'])) {
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
            WHERE 1=1";
            $param =[];
            if (!empty($_POST['titulo'])) {
              $sql .= " AND `titulo` = :titulo";
              $param['titulo'] = $_POST['titulo'];
            }

            if (!empty($_POST['autor'])) {
              $sql .= " AND usuarios.nombre = :autor";
              $param['autor'] = $_POST['autor'];
            }

            if (empty($param)) {
              $sql = "SELECT * FROM `preguntas` WHERE 1=0";
            }
            else {
              $sql .= " GROUP BY preguntas.id_pregunta";
            }
            $res = $conexion->prepare($sql);
            $res->execute($param);
          }
          else {
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
          }
            require_once 'foro_tabla.php'; 
        }
  }
  else { 
    header("location: ../login.html");
    exit();
  }       
      ?>
      </main>
      </div>
      
      <script src="script.js"></script>
    </body>
    </html>