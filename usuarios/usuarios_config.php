<?php
  $id = 'id_usuario';
  
  $datos = [
    'Nombre'=>'nombre', 'User'=>'user', 'Password'=>'password', 'Acciónes'=>['botones'=>['cambiar', 'borrar', 'mostrar_mas']]
  ];  

  $datos_cambiar_anadir = [
    'Nombre'=>['nombre','text'],
    'User'=>['user','text'],
    'Password'=>['password','text'],
    
  ];
  $columnas_buscar = ['nombre', 'user', 'password'];
  $columnas_buscar_avanzada = ['Nombre'=>'nombre'];
  $nombre_id = 'usuario';
  $columnas_mostrar_mas = ['ID usuario'=> 'id_usuario','Nombre'=>'nombre', 'User'=>'user', 'Password'=>'password']
  ?>