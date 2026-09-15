let header = document.querySelector('header');
let main = document.querySelector('main');

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
    let response = await fetch('../ajax/buscar.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    main.innerHTML = content;
  }

  if (header_form_buscar_avanzada) {
    let datos = new FormData();
    datos.append('tabla', tabla);
    let response = await fetch('../ajax/formulario_buscar_avanzada.php', {
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
    datos.append('tabla', tabla);
    let response = await fetch('../ajax/buscar_avanzada.php', {
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
    datos.append('tabla', tabla);
    let response = await fetch('../ajax/formulario_anadir.php', {
      method: 'POST',
      body: datos
    });
    
    let content = await response.text();
    main.innerHTML += content;
  }
});

main.addEventListener('submit', async(e) => {
  
  let data_form_anadir = e.target.closest('.data_form_anadir');
  let data_form_cambiar = e.target.closest('.data_form_cambiar');
  let data_form_borrar = e.target.closest('.data_form_borrar');
  let data_form = e.target.closest('.data_form');
  let table = main.querySelector('.main_table table');
  let actions = e.target.closest('.worker-actions');


  if (data_form_anadir) {
    e.preventDefault();
    let datos = new FormData(data_form_anadir);
    datos.append('tabla', tabla);
    let response = await fetch('../ajax/anadir.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    table.innerHTML += content;
    data_form.remove();
  }

  if (actions) {
    let boton = e.submitter;
    if (boton.name === 'cambiar') {
      e.preventDefault();
      let datos = new FormData();
      datos.append('tabla', tabla);
      datos.append(id, boton.value);
      let response = await fetch('../ajax/formulario_cambiar.php', {
        method: 'POST',
        body: datos
      });
      let content = await response.text();
      main.innerHTML += content;
    }
    else if (boton.name === 'borrar') {
      e.preventDefault();
      let datos = new FormData();
      datos.append('tabla', tabla);
      datos.append(id, boton.value);
      let response = await fetch('../ajax/formulario_borrar.php', {
        method: 'POST',
        body: datos
      });
      let content = await response.text();
      main.innerHTML += content;
    }
    else if (boton.name === 'mostrar_mas') {
      e.preventDefault();
      let datos = new FormData();
      datos.append('tabla', tabla);
      datos.append(id, boton.value);
      let response = await fetch('../ajax/mostrar_mas.php', {
        method: 'POST',
        body: datos
      });
      let content = await response.text();
      main.innerHTML += content;
    }

      
    
  }
  
  if (data_form_cambiar) {
    e.preventDefault();
    let datos =new FormData(data_form_cambiar);
    datos.append('tabla', tabla);
    datos.append(id, e.submitter.value);
    let tr = main.querySelector('[data-id="'+e.submitter.value+'"]');
    let response = await fetch('../ajax/cambiar.php',{
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    tr.innerHTML = content;
    data_form.remove();
  }
  
  if(data_form_borrar) {
    e.preventDefault();
    let datos =new FormData(data_form_borrar);
    datos.append('tabla', tabla);
    datos.append(id, e.submitter.value);
    let tr = main.querySelector('[data-id="'+e.submitter.value+'"]');
    let response = await fetch('../ajax/borrar.php',{
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    tr.remove();
    data_form.remove();
  }


  let seguimientos_form_anadir = e.target.closest('.seguimientos_form_anadir');
  if (seguimientos_form_anadir) {
    e.preventDefault();
    let datos = new FormData(seguimientos_form_anadir);
    datos.append('id_empresa',e.submitter.value);
    
    let response = await fetch('ajax/seguimientos_anadir.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    let seguimientos_tabla = main.querySelector('.seguimientos_tabla table');
    let id_servicio = datos.get('id_servicio');
    let fila = seguimientos_tabla.querySelector('[data-id-servicio="' + id_servicio + '"]');
    if (fila) {
      fila.remove();
    }
    seguimientos_tabla.insertAdjacentHTML('beforeend', content);
    seguimientos_div_anadir = main.querySelector('.seguimientos_div_anadir');
    seguimientos_div_anadir.remove();
    let seguimientos_boton_anadir_servicio = main.querySelector('.seguimientos_boton_anadir_servicio');
    seguimientos_boton_anadir_servicio.classList.remove('inactivo');
  }

  let worker_actions_seguimientos = e.target.closest('.worker_actions_seguimientos');
  let data_form_borrar_seguimientos = e.target.closest('.data_form_borrar_seguimientos');
  let worker_actions_seguimiento = e.target.closest('.worker_actions_seguimiento');
  let data_form_borrar_seguimiento = e.target.closest('.data_form_borrar_seguimiento');
  if(worker_actions_seguimientos) {
    e.preventDefault();
    let datos = new FormData(worker_actions_seguimientos);
    let response = await fetch('ajax/formulario_borrar_seguimientos.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    main.insertAdjacentHTML('beforeend', content);
  }

  if(data_form_borrar_seguimientos) {
    e.preventDefault();
    let datos = new FormData(data_form_borrar_seguimientos);
    let id_servicio = datos.get('id_servicio');
    
    let fila = main.querySelector('[data-id-servicio="' + id_servicio + '"]');
    let response = await fetch('ajax/borrar_seguimientos.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    fila.remove();
    e.target.closest('.data_form').remove();
  }

  if(worker_actions_seguimiento) {
    e.preventDefault();
    let datos = new FormData();
    datos.append('id_seguimiento',e.submitter.value);
    let response = await fetch('ajax/formulario_borrar_seguimiento.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    main.insertAdjacentHTML('beforeend', content);
  }

  if(data_form_borrar_seguimiento) {
    e.preventDefault();
    let datos = new FormData();
    datos.append('id_seguimiento',e.submitter.value);
    
    let fila = main.querySelector('[data-id-seguimiento="' + e.submitter.value + '"]');
    let response = await fetch('ajax/borrar_seguimiento.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    fila.remove();
    e.target.closest('.data_form').remove();
  }

});



main.addEventListener('click', async(e) => {
  let data_form = e.target.closest('.data_form');
  let data_boton_volver = e.target.closest('.data_boton_volver');
  let seguimientos_data_form = e.target.closest('.seguimientos_data_form');
  let seguimientos_data_boton_volver = e.target.closest('.seguimientos_data_boton_volver');

  if(data_form && e.target === data_form || data_boton_volver) {
    data_form.remove();
  };

    if(seguimientos_data_form && e.target === seguimientos_data_form || seguimientos_data_boton_volver) {
    seguimientos_data_form.remove();
  };

  let empresa_nombre_boton = e.target.closest('.empresa_nombre_boton');
  if (empresa_nombre_boton) {
    let datos = new FormData();
    datos.append('id_empresa', empresa_nombre_boton.value);
    let response = await fetch('ajax/seguimientos.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    main.innerHTML = content; 
  }

  let seguimientos_boton_anadir_servicio = e.target.closest('.seguimientos_boton_anadir_servicio');
  let seguimientos_boton_cancelar = e.target.closest('.seguimientos_boton_cancelar');
  if(seguimientos_boton_anadir_servicio) {
    let datos = new FormData()
    datos.append('id_empresa', seguimientos_boton_anadir_servicio.value);
    let response = await fetch('ajax/seguimientos_form_anadir.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    seguimientos_boton_anadir_servicio.insertAdjacentHTML('beforebegin',content);
    seguimientos_boton_anadir_servicio.classList.add('inactivo');
  }
  if (seguimientos_boton_cancelar) {
    let seguimientos_div_anadir = e.target.closest('.seguimientos_div_anadir');
    let seguimientos = e.target.closest('.seguimientos');
    let seguimientos_boton_anadir_servicio = seguimientos.querySelector('.seguimientos_boton_anadir_servicio');
    seguimientos_boton_anadir_servicio.classList.remove('inactivo');
    seguimientos_div_anadir.remove();
  }

  let seguimientos_servicio_nombre = e.target.closest('.seguimientos_servicio_nombre');
  
  if(seguimientos_servicio_nombre) {
    let datos = new FormData();
    datos.append('id_servicio', seguimientos_servicio_nombre.dataset.idServicio);
    datos.append('id_empresa', seguimientos_servicio_nombre.dataset.idEmpresa);
    datos.append('servicio',seguimientos_servicio_nombre.dataset.servicio);
    let response = await fetch('ajax/mostrar_seguimientos.php',{
      method: "POST",
      body: datos
    });
    let content = await response.text();
    main.insertAdjacentHTML ('beforeend',content);
  }

  
});