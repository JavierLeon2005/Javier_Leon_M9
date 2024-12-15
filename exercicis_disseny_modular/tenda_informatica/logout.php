x<?php
session_start();
session_destroy();  // Destruir la sesión

// Redirigir a tenda.php después de hacer logout
header("Location: tenda.php");  
?>
