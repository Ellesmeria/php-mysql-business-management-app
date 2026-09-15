<?php
  $id = 'id_agenda';
  
  $datos = [
    'Empresa'=>'empresa', 'Contacto'=>'contacto', 'Teléfono'=>'telefono', 'Email'=>'email','Descripcion'=>'descripcion','Acciónes'=>['botones'=>['cambiar', 'borrar', 'mostrar_mas','descargar']]
  ];  

  $datos_cambiar_anadir = [
    'Empresa'=>['empresa','text'],
    'Contacto'=>['contacto','text'],
    'Teléfono'=>['telefono','text'],
    'Email'=>['email','text'],
    'Descripcion'=>['descripcion','textarea'],
    
  ];
  $columnas_buscar = ['empresa', 'contacto', 'telefono', 'email', 'descripcion'];
  $columnas_buscar_avanzada = ['Empresa'=>'empresa','Contacto'=>'contacto','Teléfono'=>'telefono'];
  $nombre_id = 'agenda';
  $columnas_mostrar_mas = ['ID agenda'=> 'id_agenda','Empresa'=>'empresa', 'Contacto'=>'contacto', 'Teléfono'=>'telefono', 'Email'=>'email','Descripcion'=>'descripcion']
  ?>