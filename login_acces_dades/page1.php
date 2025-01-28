<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header('Location: index.html'); // Redirigeix si no hi ha sessió activa
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pàgina 1</title>
</head>
<body>
    <p>Aquesta és la primera pàgina d'informació.</p>
    <a href="page2.php">Anar a la pàgina 2</a>
    <br>
    <a href="logout.php">Tanca la sessió</a>
</body>
</html>


