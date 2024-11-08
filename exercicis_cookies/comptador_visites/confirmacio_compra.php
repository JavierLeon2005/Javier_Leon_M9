<?php
if (!isset($_COOKIE['haComprat']) || $_COOKIE['haComprat'] !== 'true') {
    header("Location: comptador_visites.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmació de Compra</title>
</head>
<body>
    <h1>Compra Realitzada!</h1>
    <p>Gràcies per la teva compra. El teu descompte ha estat aplicat correctament.</p>
    <a href="comptador_visites.php">Torna a la botiga</a>
</body>
</html>
