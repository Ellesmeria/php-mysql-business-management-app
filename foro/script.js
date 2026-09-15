let header = document.querySelector('header');
let main = document.querySelector('main');
let tabla = 'preguntas';
let id = 'id_pregunta';

header.addEventListener('click', async (e) => {
  
  let input = header.querySelector('.header_busqueda');
  let header_boton_buscar = e.target.closest('.header_boton_buscar');
  let header_form_buscar_avanzada = e.target.closest('.header_form_buscar_avanzada');
  let buton_buscar_avanzado_cerrar = e.target.closest('#form_buscar_avanzada_cerrar');
  let form_buscar_avanzada = e.target.closest('.form_buscar_avanzada');


  if (header_boton_buscar) {
    let datos = new FormData();
    datos.append('busqueda', input.value);
    datos.append('tabla', tabla);
    let response = await fetch('ajax/buscar.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    main.innerHTML = content;
  }

  if (header_form_buscar_avanzada) {
    let datos = new FormData();
    datos.append('tabla', tabla);
    let response = await fetch('ajax/formulario_buscar_avanzada.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    header.innerHTML += content;
  }

  if(buton_buscar_avanzado_cerrar) {
    let form_buscar_avanzada = buton_buscar_avanzado_cerrar.closest('.form_buscar_avanzada');
      form_buscar_avanzada.remove();
    }

  if (form_buscar_avanzada && (e.target === form_buscar_avanzada)) {
    form_buscar_avanzada.remove();
  }  

});

header.addEventListener('submit', async (e) => {
  let buscar_avanzada_form = e.target.closest('.buscar_avanzada_form');
  let header_form_anadir = e.target.closest('.header_form_anadir');

  if (buscar_avanzada_form) {
    e.preventDefault();
    let form_buscar_avanzada = buscar_avanzada_form.closest('.form_buscar_avanzada');
    let datos = new FormData(buscar_avanzada_form);
    let response = await fetch('ajax/buscar_avanzada.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    main.innerHTML = content;
    form_buscar_avanzada.remove();
  }
  if (header_form_anadir) {
    e.preventDefault();
    let datos = new FormData();
    let response = await fetch('ajax/formulario_anadir.php', {
      method: 'POST',
      body: datos
    });
    
    let content = await response.text();
    main.innerHTML += content;
  }
});

main.addEventListener('submit', async(e) => {
  
  let data_form_anadir = e.target.closest('.data_form_anadir');
  let data_form_borrar = e.target.closest('.data_form_borrar');
  let mostrar_mas_pregunta = e.target.closest('.mostrar_mas_pregunta');
  let data_form = e.target.closest('.data_form');
  let table = main.querySelector('.main_table table');
  let actions = e.target.closest('.worker-actions');
  let form_borrar_respuesta = e.target.closest('.form_borrar_respuesta');
  let foro_pregunta_anadir_comentario = e.target.closest('.foro_pregunta_anadir_comentario');

  if (data_form_anadir) {
    e.preventDefault();
    let datos = new FormData(data_form_anadir);
    let response = await fetch('ajax/anadir.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    table.innerHTML += content;
    data_form.remove();
  }

  if (actions) {
    let boton = e.submitter;
  
    if (boton.name === 'borrar') {
      e.preventDefault();
      let datos = new FormData();
      datos.append(id, boton.value);
      let response = await fetch('ajax/formulario_borrar_pregunta.php', {
        method: 'POST',
        body: datos
      });
      let content = await response.text();
      main.innerHTML += content;
    }

    if (boton.name === 'borrar_respuesta') {
      e.preventDefault();
      let datos = new FormData();
      datos.append('id_respuesta', boton.value);
      let response = await fetch('ajax/formulario_borrar_respuesta.php', {
        method: 'POST',
        body: datos
      });
      let content = await response.text();
      main.innerHTML += content;
    }
  }
  
  if(data_form_borrar) {
    e.preventDefault();
    let datos =new FormData();
    datos.append(id, e.submitter.value);
    let tr = main.querySelector('[data-id="'+e.submitter.value+'"]');
    let response = await fetch('ajax/borrar_pregunta.php',{
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    tr.remove();
    data_form.remove();
  }

  if (mostrar_mas_pregunta) {
    let boton = e.submitter;
    if (boton.name === 'mostrar_mas') {
      e.preventDefault();
      let datos = new FormData();
      datos.append(id, boton.value);
      let response = await fetch('ajax/mostrar_mas.php', {
        method: 'POST',
        body: datos
      });
      let content = await response.text();
      main.innerHTML = content;
    }
  }

  if (form_borrar_respuesta) {
    e.preventDefault();
    let datos =new FormData();
    datos.append('id_respuesta', e.submitter.value);
    let div = main.querySelector('[data-id="' + e.submitter.value + '"]');
    let response = await fetch('ajax/borrar_respuesta.php',{
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    div.remove();
    data_form.remove();
  }

  if (foro_pregunta_anadir_comentario) {
    let foro_pregunta_pagina_respuestas = main.querySelector('.foro_pregunta_pagina_respuestas');
    e.preventDefault();
    let datos =new FormData(foro_pregunta_anadir_comentario);
    datos.append('id_pregunta', e.submitter.value);
    let response = await fetch('ajax/anadir_comentario.php',{
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    foro_pregunta_anadir_comentario.reset();
    foro_pregunta_pagina_respuestas.innerHTML += content;
  }

});

main.addEventListener('click', async(e) => {
  let data_form = e.target.closest('.data_form');
  let data_boton_volver = e.target.closest('.data_boton_volver');


  if(data_form && e.target === data_form || data_boton_volver) {
    data_form.remove();
  };




});