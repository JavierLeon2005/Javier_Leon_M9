<?php
session_start();

function mostrarDescompte() {
    // Incrementar visites amb cookies
    $visites = isset($_COOKIE['visites']) ? $_COOKIE['visites'] + 1 : 1;
    setcookie('visites', $visites, time() + 3600 * 24 * 30, "/"); // Cookie de 30 dies

    // Agafar informació de sessió per veure si l'usuari està loguejat
    $user_login = isset($_SESSION['usuari']) ? $_SESSION['usuari'] : null;

    // Mostrar el número de visites
    echo "<p>Visites: {$visites}</p>";

    // Mostrar descompte segons visites i estat de login
    if ($user_login && $visites == 10) {
        echo "<p><strong>{$user_login}, agraïm la seva fidelitat, utilitzi el codi PROMO24 per un 30% de descompte</strong></p>";
    } elseif (!$user_login && $visites == 20) {
        echo "<p><strong>Agraïm la seva fidelitat, utilitzi el codi PROMO24 per un 20% de descompte</strong></p>";
    }
}

// Cridar a la funció per mostrar descomptes i visites
mostrarDescompte();
?>
