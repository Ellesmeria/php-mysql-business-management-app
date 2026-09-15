<?php
require_once '../../conexion.php';
$id_trabajador = $_POST['id_trabajador'];
$sql = "SELECT `nombre` FROM `trabajadores` WHERE `id_trabajador` = :id_trabajador";
$res = $conexion->prepare($sql);
$res->execute(['id_trabajador'=>$id_trabajador]);
$trabajador = $res->fetch();

$sql = "SELECT documentos.id_documento,
  documentos.nombre_documento,
  documentos.fecha,
  documentos.ruta,
  usuarios.nombre AS autor
  FROM `documentos` 
  LEFT JOIN usuarios 
    ON usuarios.id_usuario = documentos.id_usuario
  WHERE documentos.id_trabajador = :id_trabajador
  ORDER BY documentos.nombre_documento";
  
$res = $conexion->prepare($sql);
$res->execute(['id_trabajador' => $id_trabajador]);
$filas = $res->fetchAll(PDO::FETCH_ASSOC);
?>
<div class='documentos'>
<div class="documentos_ventana">
  <button class="documentos_boton_cerrar">
    <img src="../img/cerrar.png" alt="Cerrar">
  </button>
  <div class="documentos_header">
    <h2><img src="../img/carpeta.png" alt=""><span>Documentos de <?= $trabajador['nombre'] ?? 'Trabajador'?></span></h2>
    <button class="documentos_header_boton_anadir"><img src="../img/nuevo.png" alt=""><span>Añadir documento</span></button>
  </div>
  <div class="documentos_anadir inactivo">
    <form action="" class="documentos_anadir_form">
      <div>
        <div class="documentos_anadir_form_header">
          <img src="../img/documento_nuevo.png" alt="">
          <div>
            <h4>Añadir nuevo documento</h4>
            <span>Completa los datos y selecciona el archivo</span>
          </div>  
        </div>
        <div class="documentos_anadir_form_inputs">
          <input type="hidden" name="id_trabajador" value="<?= $id_trabajador ?>">
          <div>
            <label for="documentos_anadir_form_inputs_nombre"><b>Nombre del documento</b></label>
            <input type="text" name="nombre_documento" id="documentos_anadir_form_inputs_nombre" placeholder="Ej. Contrato laboral.pdf">
          </div>
          <div>
            <label for="documentos_anadir_form_inputs_archivo"><b>Archivo</b></label>
            <input type="file" name="archivo_documento" id="documentos_anadir_form_inputs_archivo">
          </div>
        </div>
        <div class="documentos_anadir_form_botones">
          <button type="button" class="documentos_anadir_form_botones_cancelar">Cancelar</button>
          <button type="submit" class="documentos_anadir_form_botones_subir">Subir documento</button>
        </div>

      </div>
    </form>
  </div>
  <div class="documentos_tabla">
    <table>
      <tr>
        <th>Nombre del documento</th>
        <th>Añadido por</th>
        <th>Fecha de alta</th>
        <th>Acciones</th>
      </tr>
      <tbody class="documentos_tabla_contenido">
      <?php
      foreach($filas as $fila) {
      ?>
      <tr>
        <td><?= $fila['nombre_documento'] ?></td>
        <td><?= $fila['autor'] ?></td>
        <td><?= implode('/', array_reverse(explode('-', $fila['fecha']))) ?></td>
        <td>
          <div class ="documentos_tabla_acciones">
            <button type="button" class="documentos_tabla_descargar" value="<?= $fila['id_documento'] ?>"><img src="../img/descargar.png" alt="Descargar"></button>
            <button type="button" class="documentos_tabla_eliminar" value="<?= $fila['id_documento']?>" data-trabajador = "<?= $id_trabajador ?>"><img src="../img/borrar.png" alt="Eliminar"></button>
            <button type="button" class="documentos_tabla_cambiar" value="<?= $fila['id_documento']?>" data-trabajador = "<?= $id_trabajador ?>"><img src="../img/cambiar.png" alt="Cambiar"></button>
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

