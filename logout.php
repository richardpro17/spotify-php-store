<?php
// Iniciar la sesión
session_start();

// Destruir la sesión
session_destroy();

// Redirigir a index.php
header('Location: index.php');
exit();
?>