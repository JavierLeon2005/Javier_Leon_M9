<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.html');
}

$conn = mysqli_connect('localhost', 'xavi', 'xavi', 'javier_leon_iticdesk');

$email = $_SESSION['email'];

// Obtener nom, cognom y rol
$sql = "SELECT id, nom, cognom, rol FROM usuaris WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result);

if (!$user) {
    echo "Usuari no trobat.";
}

$usuari_id = $user['id'];
$rol = $user['rol'];

// Eliminar incidència si es rep un ID per eliminar
if (isset($_POST['eliminar_id'])) {
    $eliminar_id = $_POST['eliminar_id'];
    
    if ($rol == 'administrador') {
        $sql = "DELETE FROM incidencies WHERE id = '$eliminar_id'";
    } else {
        $sql = "DELETE FROM incidencies WHERE id = '$eliminar_id' AND usuari_id = '$usuari_id'";
    }
    
    mysqli_query($conn, $sql);
    header("Location: incidencies.php");
}

// Consulta d'incidències segons el rol
if ($rol == 'administrador') {
    $sql = "SELECT * FROM incidencies ORDER BY prioritat ASC, data_creacio ASC";
} else {
    $sql = "SELECT * FROM incidencies WHERE usuari_id = '$usuari_id' ORDER BY prioritat ASC, data_creacio ASC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Incidències</title>
</head>
<body>
    <h2>Benvingut, <?php echo $user['nom'] . " " . $user['cognom']; ?> (<?php echo $user['rol']; ?>)</h2>
    <h2>Incidències</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Prioritat</th>
            <th>Títol</th>
            <th>Descripció</th>
            <th>Data Creació</th>
            <th>Estat</th>
            <th>Acció</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['prioritat']; ?></td>
            <td><?php echo $row['titol']; ?></td>
            <td><?php echo $row['descripcio']; ?></td>
            <td><?php echo $row['data_creacio']; ?></td>
            <td><?php echo $row['estat']; ?></td>
            <td>
                <form method="post" onsubmit="return confirm('Segur que vols eliminar aquesta incidència?');">
                    <input type="hidden" name="eliminar_id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="acces.php">Tornar al menú</a>
</body>
</html>
