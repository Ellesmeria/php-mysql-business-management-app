<?php
require_once '../../conexion.php';
$id_trabajador = $_POST['id_trabajador'];
$sql = "SELECT `nombre` FROM `trabajadores` WHERE `id_trabajador` = :id_trabajador";
$res = $conexion->prepare($sql);
$res->execute(['id_trabajador'=>$id_trabajador]);
$trabajador = $res->fetch();

$sql = "SELECT id_ausencia,
  `fecha_inicio`,
  `fecha_fin`,
  DATEDIFF(fecha_fin, fecha_inicio) + 1 AS total_dias,
  `motivo`
  FROM `dias_libres` 
  WHERE `id_trabajador` = :id_trabajador
  ORDER BY `fecha_inicio` DESC";
  
$res = $conexion->prepare($sql);
$res->execute(['id_trabajador' => $id_trabajador]);
$filas = $res->fetchAll(PDO::FETCH_ASSOC);
?>
<div class='dias_libres'>
<div class="dias_libres_ventana">
  <button class="dias_libres_boton_cerrar">
    <img src="../../img/cerrar.png" alt="Cerrar">
  </button>
  <div class="dias_libres_header">
    <h2><img src="../../img/calendario_grande.png" alt=""><span>Dias libres de <?= $trabajador['nombre'] ?? 'Trabajador'?></span></h2>
    <button class="dias_libres_header_boton_anadir"><img src="../../img/nuevo.png" alt=""><span>Añadir ausencia</span></button>
  </div>
  <div class="dias_libres_anadir inactivo">
    <form action="" class="dias_libres_anadir_form">
      <div>
        <div class="dias_libres_anadir_form_header">
          <img src="../../img/calendario_plus.png" alt="">
          <div>
            <h4>Añadir nuevo dias libres</h4>
            <span>Completa los datos</span>
          </div>  
        </div>
        <div class="dias_libres_anadir_form_inputs">
          <input type="hidden" name="id_trabajador" value="<?= $id_trabajador ?>">
          <div>
            <label for="dias_libres_anadir_form_inputs_fecha_inicio"><b>Fecha inicio</b></label>
            <input type="date" name="fecha_inicio" id="dias_libres_anadir_form_inputs_fecha_inicio" >
          </div>
          <div>
            <label for="dias_libres_anadir_form_inputs_fecha_fin"><b>Fecha fin</b></label>
            <input type="date" name="fecha_fin" id="dias_libres_anadir_form_inputs_fecha_fin">
          </div>
          <div>
            <label for="dias_libres_anadir_form_inputs_motivo"><b>Motivo</b></label>
            <select name="motivo" id="dias_libres_anadir_form_inputs_motivo">
              <option value="enfermedad">Enfermedad</option>
              <option value="vacaciones">Vacaciones </option>
              <option value="asuntos_propios">Asuntos propios</option>
              <option value="fuerza_mayor">Fuerza mayor</option>
            </select>
          </div>
          <div>
            <div class="dias_libres_anadir_form_botones">
              <button type="button" class="dias_libres_anadir_form_botones_cancelar">Cancelar</button>
              <button type="submit" class="dias_libres_anadir_form_botones_subir">Subir ausencia</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="dias_libres_tabla">
    <table>
      <tr>
        <th>Fecha inicio</th>
        <th>Fecha fin</th>
        <th>Total dias</th>
        <th>Motivo</th>
        <th>Acciones</th>
      </tr>
      
      <tbody class="dias_libres_tabla_contenido">
      <?php
      foreach($filas as $fila) {
      ?>
      <tr data-id-ausencia="<?= $fila['id_ausencia'] ?>"
          data-fecha-inicio="<?= $fila['fecha_inicio'] ?>"
          data-fecha-fin="<?= $fila['fecha_fin'] ?>"
          data-motivo="<?= $fila['motivo'] ?>">
        <td class="dias_libres_tabla_fecha_inicio"><?= date('d/m/Y', strtotime($fila['fecha_inicio'])) ?></td>
        <td class="dias_libres_tabla_fecha_fin"><?= date('d/m/Y', strtotime($fila['fecha_fin'])) ?></td>
        <td class="total_dias"><?= $fila['total_dias'] ?></td>
        <td class="dias_libres_tabla_motivo"><?= $fila['motivo'] ?></td>
        <td>
          <div class ="dias_libres_tabla_acciones">
            <button type="button" class="dias_libres_tabla_eliminar" value="<?= $fila['id_ausencia'] ?>" data-id-ausencia = "<?= $fila['id_ausencia'] ?>"><img src="../../img/borrar.png" alt="Eliminar"></button>
            <button type="button" class="dias_libres_tabla_cambiar" value="<?= $fila['id_ausencia'] ?>" data-id-ausencia = "<?= $fila['id_ausencia'] ?>"><img src="../../img/cambiar.png" alt="Cambiar"></button>
          </div>
        </td>
      </tr>
      
      
      <?php
      }

      ?>
      </tbody>
    </table>
  </div>
</div>
</div>

