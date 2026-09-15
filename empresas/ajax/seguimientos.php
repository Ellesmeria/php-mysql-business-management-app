<?php

  require_once '../../conexion.php';
  $id_empresa = $_POST['id_empresa'];
  
  $sql = "SELECT 
    servicios.nombre AS servicio,
    empresas.nombre AS empresa,
    MAX(seguimientos.fecha) AS ultima_fecha,
    servicios.id_servicio
  FROM seguimientos
  LEFT JOIN empresas 
    ON seguimientos.id_empresa = empresas.id_empresa
  LEFT JOIN servicios 
    ON seguimientos.id_servicio = servicios.id_servicio 
  WHERE seguimientos.id_empresa = :id_empresa   
  GROUP BY 
    servicios.id_servicio,
    servicios.nombre,
    empresas.nombre
  ORDER BY ultima_fecha DESC";

  
  $res = $conexion->prepare($sql);
  $res->execute(['id_empresa' => $id_empresa]);
  $filas = $res->fetchAll(PDO::FETCH_ASSOC);
?>
<h2 class="seguimientos_h2"><?= $filas[0]['empresa'] ?></h2>  
<div class="seguimientos">
  <div class="seguimientos_tabla">
    <table>
      <tr>
        <th>Servicio</th>
        <th>Último seguimiento</th>
        <th>Acciónes</th>
      </tr>
      <?php
      foreach($filas as $fila) {
        ?>
        <tr data-id-servicio="<?= $fila['id_servicio'] ?>">
          <td><button type="button" class="seguimientos_servicio_nombre" data-servicio="<?= $fila['servicio'] ?>" data-id-servicio="<?= $fila['id_servicio'] ?>" data-id-empresa="<?= $id_empresa ?>"><?= $fila['servicio'] ?></button></td>
          <td> <?= date('d/m/Y', strtotime($fila['ultima_fecha'])) ?></td>
          <td>
            <div>
              <form action="" method="post" class="worker_actions_seguimientos">
                <input type="hidden" name="id_empresa" value="<?= $id_empresa ?>">
                <input type="hidden" name="id_servicio" value="<?= $fila['id_servicio'] ?>">
                <button type="submit" name="borrar" class="buttons_icons button_borrar">
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
  <button type="button" class="seguimientos_boton_anadir_servicio" value="<?= $id_empresa ?>">
    <img src="../../img/nuevo.png" alt="Añadir servicio" class="icon">
  </button>
</div>