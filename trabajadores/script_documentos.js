

main.addEventListener('click', async (e) => {

  let button_documetos = e.target.closest('.button_documetos');
  let button_cerrar = e.target.closest('.documentos_boton_cerrar');
  let documentos = e.target.closest('.documentos');
  documentos_anadir = main.querySelector('.documentos_anadir');
  let documentos_header_boton_anadir = e.target.closest('.documentos_header_boton_anadir');
  let documentos_anadir_form_botones_cancelar = e.target.closest('.documentos_anadir_form_botones_cancelar');
  let documentos_tabla_eliminar = e.target.closest('.documentos_tabla_eliminar');
  let documentos_tabla_cambiar = e.target.closest('.documentos_tabla_cambiar');
   let documentos_tabla_descargar = e.target.closest('.documentos_tabla_descargar');
  
  if (documentos_tabla_descargar) {
    let id_documento = documentos_tabla_descargar.value;
    window.location.href = 'documentos_descargar.php?id_documento=' + id_documento;
  }

  if(button_documetos) {
    e.preventDefault();
    let datos = new FormData();
    datos.append('tabla', tabla);
    datos.append(id, button_documetos.value);
    let response = await fetch('../ajax/documentos/documentos.php', {
      method: 'POST',
      body: datos
    });
    let content = await response.text();
    main.innerHTML += content;
  }

  if(e.target === documentos && documentos || button_cerrar) {
    documentos.remove();
  }

  if (documentos_header_boton_anadir) {
    documentos_anadir.classList.toggle('inactivo');
  }

  if (documentos_anadir_form_botones_cancelar) {
    documentos_anadir.classList.add('inactivo');
  }



  
   
  if(documentos_tabla_eliminar) {
      e.preventDefault();
      let datos_eliminar = new FormData();
      datos_eliminar.append('id_documento', documentos_tabla_eliminar.value);
      datos_eliminar.append('id_trabajador', documentos_tabla_eliminar.dataset.trabajador);
      let response = await fetch('../ajax/documentos/documento_borrar.php', {
        method: 'POST',
        body: datos_eliminar
      });

      let texto = await response.text();

      documentos.innerHTML = texto;
    }

    if (documentos_tabla_cambiar) {
      let id_documento = documentos_tabla_cambiar.value;
      let id_trabajador = documentos_tabla_cambiar.dataset.trabajador;
      let tr = documentos_tabla_cambiar.closest('tr');
      let td_nombre = tr.querySelector('td:first-child');
      let nombre = td_nombre.textContent;
      td_nombre.classList.add('documentos_tabla_td_nombre')
      td_nombre.innerHTML = '<input type="text" value="'+ nombre +'" class="documentos_tabla_guardar_input"><button type="button" class="documentos_tabla_guardar" value="' + id_documento + '" data-trabajador = "'+ id_trabajador +'"><img src="../img/guardar.png" alt="Guardar"></button>'; 
    }
    let documentos_tabla_guardar = e.target.closest('.documentos_tabla_guardar');
    if (documentos_tabla_guardar) {
      let valor = documentos_tabla_guardar.closest('td').querySelector('.documentos_tabla_guardar_input').value;
      let datos_cambiar = new FormData();

      datos_cambiar.append('id_documento', documentos_tabla_guardar.value);
      datos_cambiar.append('id_trabajador', documentos_tabla_guardar.dataset.trabajador);
      datos_cambiar.append('nombre_documento', valor);
      let response = await fetch('../ajax/documentos/documento_cambiar.php', {
        method: 'POST',
        body: datos_cambiar
      });

      let texto = await response.text();
      documentos.innerHTML = texto;
    }






});




main.addEventListener('submit', async (e) => {
  
  let documentos_anadir_form = e.target.closest('.documentos_anadir_form');
  let documentos = e.target.closest('.documentos');
  if (documentos_anadir_form) {
    e.preventDefault();
    let datos_anadir = new FormData(documentos_anadir_form);
    let response = await fetch('../ajax/documentos/documentos_anadir.php', {
      method: 'POST',
      body: datos_anadir
    });

    let texto = await response.text();
    documentos.innerHTML = texto;
  }
  
});






