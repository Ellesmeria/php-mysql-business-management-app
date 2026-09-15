<?php
  $id = 'id_empresa';
  
  $link_nombre = [
    ['texto'=>'<button type="button" class="empresa_nombre_boton" value="'],
    ['campo'=>$id], 
    ['texto'=>'">'],
    ['campo'=>'nombre'],
    ['texto'=>'</button>']
  ];

  $direccion = [
    ['texto'=>'<div class="empresas_td_direccion">'],
    ['campo'=>'direccion'], 
    ['texto'=>', '], 
    ['campo'=>'provincia'], 
    ['texto'=>', '], 
    ['campo'=>'localidad'], 
    ['texto'=>', '], 
    ['campo'=>'codico_postal'], 
    ['texto'=>'</div>']
  ];

  $contactos = [
    ['texto'=>'<div class="empresas_td_contactos"><span>'],
    ['campo'=>'persona_contacto'],
    ['texto'=>',</span> <span><b>tel:</b>'],
    ['campo'=>'telefono'],
    ['texto'=>',</span> <span><b>email:</b>'],
    ['campo'=>'email'],
    ['texto'=>'</span></div>']
  ];
  
  $datos = [
    'Nombre'=>$link_nombre, 'Dirección'=>$direccion,'Contactos'=>$contactos,'Actividad'=>'actividad','Numero de trabajadores'=>'num_trabajadores','Acciónes'=>['botones'=>['cambiar', 'borrar']]
  ];  

  $datos_cambiar_anadir = [
    'Nombre'=>['nombre','text'],
    'Dirección'=>['direccion','text'],
    'Localidad'=>['localidad','text'],
    'Provincia'=>['provincia','text'],
    'Código postal'=>['codico_postal','text'],
    'Telefono'=>['telefono','text'],
    'Email'=>['email','text'],
    'Persona de contacto'=>['persona_contacto','text'],
    'Actividad'=>['actividad','text'],
    'Numero de trabajadores'=>['num_trabajadores','text']
  ];
  $columnas_buscar = ['nombre', 'direccion', 'localidad', 'provincia', 'codico_postal', 'telefono', 'email', 'persona_contacto', 'actividad', 'num_trabajadores'];
  $columnas_buscar_avanzada = ['Nombre'=>'nombre','Telefono'=>'telefono','Email'=>'email','Persona de contacto'=>'persona_contacto'];
  $nombre_id = 'empresa';

  ?>