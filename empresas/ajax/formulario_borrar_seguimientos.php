
<div class="data_form data_form_seguimiento">
  <form action="" method="post"  class="data_form_borrar_seguimientos">
    <p>Estas segura de que quieres eliminar a los seguimientos?</p>
    <div>
      <input type="hidden" name="id_empresa" value="<?= $_POST['id_empresa'] ?>">
      <input type="hidden" name="id_servicio" value="<?= $_POST['id_servicio'] ?>">
      <button type="submit" name="borrar"  class="data_boton_borrar"><img src="../img/borrar.png" alt="Borrar" class="icon icon_borrar"></button>
      <button type="button" class="data_boton_volver"><img src="../img/volver.png" alt="Volver" class="icon icon_volver"></button>
    </div>
    </form>
</div>