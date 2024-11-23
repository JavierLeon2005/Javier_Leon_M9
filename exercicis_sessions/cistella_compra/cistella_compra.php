<?php
session_start();

// Inicialitzem la cistella si no existeix
if (!isset($_SESSION['cistella'])) {
    $_SESSION['cistella'] = ['Ruffles' => 0, 'Doritos' => 0];
}

// Afegim productes a la cistella
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantitat_patatas = intval($_POST['quantitat_patatas']);
    $quantitat_doritos = intval($_POST['quantitat_doritos']);

    $_SESSION['cistella']['Ruffles'] += $quantitat_patatas;
    $_SESSION['cistella']['Doritos'] += $quantitat_doritos;
}

// Redirigim a la pàgina inicial
header("Location: index.html");
?>
