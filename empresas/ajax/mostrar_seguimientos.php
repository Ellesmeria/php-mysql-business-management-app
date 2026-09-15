<?php
  require_once '../../conexion.php';
  $id_empresa = $_POST['id_empresa'];
  $id_servicio = $_POST['id_servicio'];
  $servicio = $_POST['servicio'];
  $sql = "SELECT * FROM `seguimientos` WHERE `id_empresa` = :id_empresa AND id_servicio = :id_servicio ORDER BY `fecha` DESC";
  $res = $conexion->prepare($sql);
  $res->execute(['id_empresa'=> $id_empresa, 'id_servicio'=> $id_servicio]);
  ?>

<div class="seguimientos_data_form">
  <div  class="seguimientos_data_form_card data_form_card">
    <h2><?= $servicio ?></h2>
    
    <button  class="seguimientos_data_boton_volver"><img src="../img/cerrar.png" alt="" class="icon"></button>
    <div class="seguimientos_tabla_scroll">
      <table class="seguimientos_mostrar_tabla">
        <tr>
          <th>Comentario</th>
          <th>Fecha</th>
          <th>Tipo de contacto</th>
          <th>Acciónes</th>
        </tr>
          
        <?php
        while ($fila = $res->fetch()) {
        ?>
        <tr data-id-seguimiento="<?= $fila['id_seguimiento'] ?>">
          <td><?= $fila['comentario'] ?></td>
          <td><?= date('d/m/Y', strtotime($fila['fecha'])) ?></td>
          <td><?= $fila['tipo_contacto'] ?></td>
          <td>
            <div>
              <form action="" method="post" class="worker_actions_seguimiento">
                <button type="submit" name="borrar" value="<?= $fila['id_seguimiento'] ?>" class="buttons_icons button_borrar">
                  <img src="../img/borrar.png" alt="Borrar" class="icon">
                </button>
              </form>
            </div>
          </td>
        </tr>
        <?php
        }
          ?>
      </table>
    </div>
  </div>
</div>