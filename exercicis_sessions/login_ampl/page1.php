<?php
session_start();

// Comprovem si l'usuari està autenticat
if (!isset($_SESSION["username"])) {
    header("Location: index.html"); // Redirigim a la pàgina de login
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pàgina 1</title>
</head>
<body>
    <h1>Benvingut, <?php echo $_SESSION["username"]; ?>!</h1>
    <p>Contingut de la pàgina 1.</p>
    <a href="page2.php">Pàgina 2</a> | <a href="logout.php">Logout</a>
</body>
</html>
