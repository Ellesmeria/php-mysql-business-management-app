<?php
  $id = 'id_trabajador';
  

  
  $datos = [
    'Nombre'=>'nombre', 'Contraseña PC'=>'contrasena_pc','IP'=>'ip','Puerto'=>'puerto','Email'=>'email','Numero teléfono'=>'numero_telefono','Acciónes'=>['botones'=>['cambiar', 'borrar','mostrar_mas','documentos','descargar','dias_libres']]
  ];  

  $datos_cambiar_anadir = [
    'Nombre'=>['nombre','text'],
    'Contraseña PC'=>['contrasena_pc','text'],
    'IP'=>['ip','text'],
    'Puerto'=>['puerto','text'],
    'Email'=>['email','text'],
    'Password email'=>['password_email','text'],
    'Numero teléfono'=>['numero_telefono','text']
  ];
  $columnas_buscar = ['nombre', 'contrasena_pc', 'ip', 'puerto', 'email', 'password_email', 'numero_telefono'];
  $columnas_buscar_avanzada = ['Nombre'=>'nombre','IP'=>'ip','Numero teléfono'=>'numero_telefono'];
  $nombre_id = 'trabajador';
  $columnas_mostrar_mas = [
  'ID trabajador'=> 'id_trabajador',
  'Nombre'=>'nombre',
  'Contraseña PC'=>'contrasena_pc',
  'IP'=>'ip',
  'Puerto'=>'puerto',
  'Email'=>'email',
  'Password email'=>'password_email',
  'Numero teléfono'=>'numero_telefono'
  ];
  ?>