<?php
  $id = 'id_cuenta';
  
  $datos = [
    'Cuenta'=>'cuenta', 'Acciónes'=>['botones'=>['cambiar', 'borrar', 'mostrar_mas','descargar']]
  ];  

  $datos_cambiar_anadir = [
    'Tipo de cuenta'=>['tipo_cuenta','select',['POP'=>'pop','IMAP'=>'imap'],2],
    'Cuenta'=>['cuenta','text'],
    'Puerto correo entrante'=>['puerto_correo_entrante','text'],
    'Puerto correo saliente'=>['puerto_correo_saliente','text'],
    'Servidor correo entrante'=>['servidor_correo_entrante','textarea'],
    'Servidor correo saliente'=>['servidor_correo_saliente','text'],
    'Seguridad correo entrante'=>['seguridad_correo_entrante','text'],
    'Seguridad correo saliente'=>['seguridad_correo_saliente','text'],
    'Password'=>['password','text']
    
  ];
  $columnas_buscar = ['tipo_cuenta', 'cuenta', 'puerto_correo_entrante', 'puerto_correo_saliente', 'servidor_correo_entrante','servidor_correo_saliente','seguridad_correo_entrante','seguridad_correo_saliente','password'];
  $columnas_buscar_avanzada = ['Cuenta'=>'cuenta'];
  $nombre_id = 'cuenta';
  $columnas_mostrar_mas = [
  'ID correo'=> 'id_cuenta',
  'Tipo de cuenta'=>'tipo_cuenta',
  'Cuenta'=>'cuenta',
  'Puerto correo entrante'=>'puerto_correo_entrante',
  'Puerto correo saliente'=>'puerto_correo_saliente',
  'Servidor correo entrante'=>'servidor_correo_entrante',
  'Servidor correo saliente'=>'servidor_correo_saliente',
  'Seguridad correo entrante'=>'seguridad_correo_entrante',
  'Seguridad correo saliente'=>'seguridad_correo_saliente',
  'Password'=>'password',
  ];
  ?>
