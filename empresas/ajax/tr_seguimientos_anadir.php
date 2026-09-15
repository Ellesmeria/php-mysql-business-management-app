<?php

  require_once '../../conexion.php';
  
  $sql = "SELECT 
    empresas.id_empresa,
    servicios.nombre AS servicio,
    empresas.nombre AS empresa,
    seguimientos.fecha AS ultima_fecha,
    servicios.id_servicio
  FROM seguimientos
  LEFT JOIN empresas 
    ON seguimientos.id_empresa = empresas.id_empresa
  LEFT JOIN servicios 
    ON seguimientos.id_servicio = servicios.id_servicio 
  WHERE seguimientos.id_seguimiento  = :id_seguimiento";

  
  $res = $conexion->prepare($sql);
  $res->execute(['id_seguimiento' => $id_seguimiento]);
  $fila = $res->fetch();
?>
  <tr data-id-servicio="<?= $fila['id_servicio'] ?>">
          <td><button type="button" class="seguimientos_servicio_nombre" data-servicio="<?= $fila['servicio'] ?>" data-id-servicio="<?= $fila['id_servicio'] ?>" data-id-empresa="<?= $id_empresa ?>"><?= $fila['servicio'] ?></button></td>
          <td> <?= date('d/m/Y', strtotime($fila['ultima_fecha'])) ?></td>
          <td>
            <div>
              <form action="" method="post" class="worker_actions_seguimientos">
                <input type="hidden" name="id_empresa" value="<?= $fila['id_empresa'] ?>">
                <input type="hidden" name="id_servicio" value="<?= $fila['id_servicio'] ?>">
                <button type="submit" name="borrar" class="buttons_icons button_borrar">
                  <img src="../img/borrar.png" alt="Borrar" class="icon">
                </button>
              </form>
            </div>
          </td>
        </tr>