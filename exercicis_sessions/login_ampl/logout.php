<?php
session_start();

// Destruïm la sessió per tancar l'usuari
session_unset();
session_destroy();

// Redirigim a la pàgina de login
header("Location: index.html");
?>
