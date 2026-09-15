<div class="data_form">
  <form action="" method="post" class="form_borrar_respuesta">
    <p>Estas segura de que quieres eliminar a la respuesta?</p>
    <div>
      <button type="submit" name="borrar_respuesta" value = "<?= $_POST['id_respuesta'] ?>" class="data_boton_borrar"><img src="../img/borrar.png" alt="Borrar" class="icon icon_borrar"></button>
      <button type="submit"  class="data_boton_volver" value = "<?= $_POST['id_respuesta'] ?>"><img src="../img/volver.png" alt="Volver" class="icon icon_volver" ></button>
    </div>
    </form>
</div>
