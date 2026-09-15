<div class="seguimientos_div_anadir">
  <form action="" class="seguimientos_form_anadir">
    <div class="seguimientos_form_anadir_select">
      <div class="seguimientos_form_grupo">
        <label for="id_servicio">Servicio</label>
        <select name="id_servicio" id="id_servicio">
          <option value="" disabled selected >Selecciona un servicio</option>
          <?php
          require_once '../../conexion.php';
          $sql = "SELECT * FROM servicios";
          $res = $conexion->prepare($sql);
          $res->execute();
          while ($fila = $res->fetch()) {
          ?>
          <option value="<?= $fila['id_servicio'] ?>"><?= $fila['nombre'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      
      <div class="seguimientos_form_grupo">
        <label for="tipo_contacto">Tipo de contacto</label>
        <select name="tipo_contacto" id="tipo_contacto">
          <option value="" disabled selected >Selecciona el tipo de contacto</option>
          <option value="telefono">Teléfono</option>
          <option value="email">Correo electrónico</option>
          <option value="whatsapp">WhatsApp</option>
          <option value="visita">Visita</option>
          <option value="otro">Otro</option>
        </select>
      </div>
    </div>

    <div class="seguimientos_form_grupo seguimientos_form_grupo_comentarios">
      <label for="comentario">Comentario</label>
      <textarea name="comentario" id="comentario" placeholder="Escribe un comentario..."></textarea>
    </div>

    <div class="seguimientos_form_acciones">
       <button type="button" class="seguimientos_boton_cancelar">
        <img src="../../img/volver.png" alt="Volver" class="icon">
      </button>

      <button type="submit" class="seguimientos_boton_guardar" value="<?= $_POST['id_empresa'] ?>">
        <img src="../../img/guardar.png" alt="Añadir" class="icon">
      </button>
    </div>
  </form>
</div>