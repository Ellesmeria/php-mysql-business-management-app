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
      <link rel="stylesheet" href="dias_libres_estilos.css">
    </head>
    <body>
      <header>
        
        <h1 class="dias_libres_h1"><?= $titulo_pagina ?></h1>
        
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
                <a href="../partes_trabajo/partes_trabajo.php" <?= $nombre_archivo==='partes_trabajo' ? 'class="asside_links_active"': '' ?>>Partes de trabajo</a>
                <a href="../dias_libres/dias_libres.php" <?= $nombre_archivo==='dias_libres' ? 'class="asside_links_active"': '' ?>>Dias libres</a>
              </div>
              <a href="../logout.php"><img src="../img/salir.png" alt="Salir"></img></a>
            </div>
        </aside>
        <main>
        <?php
        
      
        require_once 'dias_libres_tabla.php'; 
        }
  
  else { 
    header("location: ../login.html");
    exit();
  }       
      ?>
      </main>
      </div>
      
      
      
      <script src="../script.js"></script>
      <script src="script_dias_libres.js"></script>
    <?= $documentos ?? ''?>
    <?= $dias_libres ?? ''?>
    </body>
    </html>

