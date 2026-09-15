<tr data-id-ausencia="<?= $fila['id_ausencia'] ?>"
          data-fecha-inicio="<?= $fecha_inicio ?>"
          data-fecha-fin="<?= $fecha_fin ?>"
          data-motivo="<?= $motivo ?>">
  <td class="dias_libres_tabla_fecha_inicio"><?= date('d/m/Y', strtotime($fecha_inicio)) ?></td>
  <td class="dias_libres_tabla_fecha_fin"><?= date('d/m/Y', strtotime($fecha_fin)) ?></td>
  <td class="total_dias"><?= $total_dias ?></td>
  <td class="dias_libres_tabla_motivo"><?= $motivo ?></td>
  <td>
    <div class ="dias_libres_tabla_acciones">
      <button type="button" class="dias_libres_tabla_eliminar" value="<?= $id_ausencia ?>" data-id-ausencia = "<?= $id_ausencia ?>"><img src="../../img/borrar.png" alt="Eliminar"></button>
      <button type="button" class="dias_libres_tabla_cambiar" value="<?= $id_ausencia ?>" data-id-ausencia = "<?= $id_ausencia ?>"><img src="../../img/cambiar.png" alt="Cambiar"></button>
    </div>
  </td>
</tr>