<?php
setcookie('nombre', '', time() - 3600, '/');
setcookie('user', '', time() - 3600, '/');
setcookie('password', '', time() - 3600, '/');
setcookie('id_usuario', '', time() - 3600, '/');

header('Location: login.html');
exit();
?>