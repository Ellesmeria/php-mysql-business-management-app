<?php

if (isset($_POST['user']) && isset($_POST['password'])) {
  require_once 'conexion.php';
  $user = $_POST['user'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM `usuarios` WHERE `user` = ?";
  $res = $conexion->prepare($sql);
  $res->execute([$user]);
  $fila = $res->fetch();
  $nombre = $fila['nombre'];
  $id_usuario = $fila['id_usuario'];
  if ($fila['password'] === $password) {
    setcookie('nombre', $nombre);
    setcookie('password', $password);
    setcookie('user', $user);
    setcookie('id_usuario', $id_usuario);
  }
  header("location: trabajadores/trabajadores.php");
  exit();
  
}

?>