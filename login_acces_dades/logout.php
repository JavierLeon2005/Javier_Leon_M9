<?php
session_start();
session_destroy(); // Tanca la sessió
header('Location: index.html'); // Redirigeix al formulari de login
exit();
?>

