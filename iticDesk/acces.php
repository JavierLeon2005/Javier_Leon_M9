<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.html');
}

$conn = mysqli_connect('localhost', 'xavi', 'xavi', 'javier_leon_iticdesk');

$email = $_SESSION['email'];
$sql = "SELECT nom, cognom, rol FROM usuaris WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ITICDesk</title>
</head>
<body>
    <h2>Benvingut, <?php echo $user['nom'] . " " . $user['cognom']; ?> (<?php echo $user['rol']; ?>)</h2>
    <a href="registre_incidencies.php">Anar a registre d'incidencies</a>
    <br>
    <a href="incidencies.php">Anar a incidencies</a>
    <br>
    <br>
    <a href="logout.php">Tanca la sessió</a>
</body>
</html>




