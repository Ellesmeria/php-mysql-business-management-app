<?php
  $id = 'id_parte_trabajo';
  
 $fecha = [
  ['fecha'=>'fecha']
 ];

 $solucionado = [
  ['checkbox'=>'solucionado']
 ];
  
  $datos = [
    'Problema'=>'problema', 'Fecha'=>$fecha,'Solucionado?'=>$solucionado,'Acciónes'=>['botones'=>['cambiar', 'borrar', 'mostrar_mas', 'imprimir']]
  ];  

  $datos_cambiar_anadir = [
    'id_usuario'=>['id_usuario','id'],
    'Fecha'=>['fecha','datetime'],
    'Problema'=>['problema','text'],
    'Solucion'=>['solucion','textarea'],
    'Solucionado?'=>['solucionado','checkbox'],
    'Observaciones'=>['observaciones','textarea'],
  ];
  $columnas_buscar = ['fecha', 'problema', 'solucion', 'observaciones'];
  $columnas_buscar_avanzada = ['Fecha'=>['fecha','intervalo'],'Problema'=>'problema','Solucion'=>'Solucion','Observaciones'=>'observaciones'];
  $nombre_id = 'parte_trabajo';
  $columnas_mostrar_mas = [
  'ID parte de trabajo'=> 'id_parte_trabajo',
  'ID usuario '=>'id_usuario',
  'Fecha'=>'fecha',
  'Problema'=>'problema',
  'Solucion'=>'solucion',
  'Solucionado'=>'solucionado',
  'Observaciones'=>'observaciones'
  ];
  ?>