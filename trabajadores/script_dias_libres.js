

main.addEventListener('click', async (e) => {

  let button_dias_libres = e.target.closest('.button_dias_libres');
  let button_cerrar = e.target.closest('.dias_libres_boton_cerrar');
  let dias_libres = e.target.closest('.dias_libres');
  dias_libres_anadir = main.querySelector('.dias_libres_anadir');
  let dias_libres_header_boton_anadir = e.target.closest('.dias_libres_header_boton_anadir');
  let dias_libres_anadir_form_botones = e.target.closest('.dias_libres_anadir_form_botones');
  let dias_libres_anadir_form_botones_cancelar = e.target.closest('.dias_libres_anadir_form_botones_cancelar');
  let dias_libres_tabla_eliminar = e.target.closest('.dias_libres_tabla_eliminar');
  let dias_libres_tabla_cambiar = e.target.closest('.dias_libres_tabla_cambiar');
  let dias_libres_tabla_guardar = e.target.closest('.dias_libres_tabla_guardar');

  if(button_dias_libres) {
    e.preventDefault();
    let datos = new FormData();
    datos.append(id, button_dias_libres.value);
    let response = await fetch('../ajax/dias_libres/dias_libres.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    main.innerHTML += content;
  }

  if(e.target === dias_libres && dias_libres || button_cerrar) {
    dias_libres.remove();
  }

  if (dias_libres_header_boton_anadir) {
    dias_libres_anadir.classList.toggle('inactivo');
  }

  if (dias_libres_anadir_form_botones_cancelar) {
    dias_libres_anadir.classList.add('inactivo');
  }

  if(dias_libres_tabla_cambiar) {
    tr = e.target.closest('tr');
    let id_ausencia = tr.dataset.idAusencia;
    let fechaInicio = tr.dataset.fechaInicio;
    let fechaFin = tr.dataset.fechaFin;
    let motivo = tr.dataset.motivo;
    let dias_libres_tabla_fecha_inicio = tr.querySelector('.dias_libres_tabla_fecha_inicio');
    let dias_libres_tabla_fecha_fin = tr.querySelector('.dias_libres_tabla_fecha_fin');
    let total_dias = tr.querySelector('.total_dias');
    let dias_libres_tabla_motivo = tr.querySelector('.dias_libres_tabla_motivo');
    let dias_libres_tabla_acciones = e.target.closest('.dias_libres_tabla_acciones');
    dias_libres_tabla_fecha_inicio.innerHTML = `<input type="date" name="fecha_inicio" value="${fechaInicio}">`;
    dias_libres_tabla_fecha_fin.innerHTML = `<input type="date" name="fecha_fin" value="${fechaFin}">`;
    total_dias.innerHTML = ``;
    dias_libres_tabla_motivo.innerHTML = `
      <select name="motivo">
        <option value="enfermedad">Enfermedad</option>
        <option value="vacaciones">Vacaciones</option>
        <option value="asuntos_propios">Asuntos propios</option>
        <option value="fuerza_mayor">Fuerza mayor</option>
      </select>
    `;
    dias_libres_tabla_motivo.querySelector('select').value = motivo;
    dias_libres_tabla_acciones.innerHTML = `<button type="button" class="dias_libres_tabla_guardar"  data-id-ausencia="${id_ausencia}"><img src="../../img/guardar.png" alt="Guardar"></button>`;
  }
  
  
  if (dias_libres_tabla_guardar) {
    let tr = dias_libres_tabla_guardar.closest('tr');

    let datos = new FormData();
    datos.append('id_ausencia', dias_libres_tabla_guardar.dataset.idAusencia);
    datos.append('fecha_inicio', tr.querySelector('[name="fecha_inicio"]').value);
    datos.append('fecha_fin', tr.querySelector('[name="fecha_fin"]').value);
    datos.append('motivo', tr.querySelector('[name="motivo"]').value);
    
    let response = await fetch('../ajax/dias_libres/dias_libres_cambiar.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    tr.innerHTML = content;
  }
   
  if(dias_libres_tabla_eliminar) {
    e.preventDefault();
    let datos_eliminar = new FormData();
    let tr = dias_libres_tabla_eliminar.closest('tr');
    datos_eliminar.append('id_ausencia', dias_libres_tabla_eliminar.value);
    let response = await fetch('../ajax/dias_libres/dias_libres_borrar.php', {
      method: 'POST',
      body: datos_eliminar
    });
    
    tr.remove();
  }






});




main.addEventListener('submit', async (e) => {
  let dias_libres_anadir_form = e.target.closest('.dias_libres_anadir_form');
  let dias_libres_tabla_contenido = main.querySelector('.dias_libres_tabla_contenido');
  if (dias_libres_anadir_form) {
    e.preventDefault();
    let datos = new FormData(dias_libres_anadir_form);
    let response = await fetch('../ajax/dias_libres/dias_libres_anadir.php', {
      method: 'POST',
      body: datos
    });

    let content = await response.text();
    dias_libres_tabla_contenido.insertAdjacentHTML('beforeend', content);
    dias_libres_anadir_form.reset();
  }
  
});





