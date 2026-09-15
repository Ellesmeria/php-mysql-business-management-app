<div class="data_form">
  <div  class="data_form_card">
    <table>
      <button  class="data_boton_volver"><img src="../img/cerrar.png" alt="" class="icon"></button>
      <?php
        $tabla = $_POST['tabla'];
        require_once '../conexion.php';
        require_once '../' . $tabla . '/' . $tabla . '_config.php';
        $id_fila = $_POST[$id];
        
        $sql = "SELECT * FROM `$tabla` WHERE `$id` = ?";
        $res = $conexion->prepare($sql);
        $res->bindValue(1, $id_fila, PDO::PARAM_INT);
        $res->execute();
        $fila = $res->fetch();
        foreach ($columnas_mostrar_mas as $key=>$columna) {
        ?>
          <tr>
            <th><?= $key ?></th>
            <td><?= $fila[$columna] ?></td>
          </tr>
          <?php
        }
        ?>
    </table>
  </div>
</div>