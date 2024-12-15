<?php
session_start();

// Incrementar el número de visitas
if (!isset($_SESSION['visites'])) {
    $_SESSION['visites'] = 0;
}
$_SESSION['visites']++;

// Comprobar si el usuario está logueado
$is_logged_in = isset($_SESSION['log']) && $_SESSION['log'] === true;
$user_name = isset($_SESSION['user_login']) ? $_SESSION['user_login'] : "";

// Mostrar mensaje según el número de visitas
if ($_SESSION['visites'] % 2 == 0) {
    echo "<h1>Benvingut de nou, esperem que tingui un bon dia</h1>";
} else {
    echo "<h1>Benvingut, és un plaer que ens visitis</h1>";
}

if ($is_logged_in) {
    echo "<h2>Hola, $user_name</h2>";
}
?>

<div>
    <a href="index_login.html">Login</a>
</div>
<div>
    <a href="logout.php">Logout</a>
</div>
