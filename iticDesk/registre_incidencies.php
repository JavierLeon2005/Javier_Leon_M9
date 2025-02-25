<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.html');
}

$conn = mysqli_connect('localhost', 'xavi', 'xavi', 'javier_leon_iticdesk');

if (!$conn) {
    die("Error de connexió: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titol = $_POST['titol'];
    $descripcio = $_POST['descripcio'];
    $prioritat = $_POST['prioritat'];
    $data_creacio = date("Y-m-d H:i:s");  // Data actual
    $estat = $_POST['estat']; 

    // Obtenir ID de l'usuari
    $email = $_SESSION['email'];
    $sql_user = "SELECT id FROM usuaris WHERE email = '$email'";
    $result_user = mysqli_query($conn, $sql_user);
    $user = mysqli_fetch_array($result_user);

   

    $usuari_id = $user['id'];

    // Insertar incidència amb la data i estat
    $sql = "INSERT INTO incidencies (prioritat, titol, descripcio, usuari_id, data_creacio, estat) 
            VALUES ('$prioritat', '$titol', '$descripcio', '$usuari_id', '$data_creacio', '$estat')";

    if (mysqli_query($conn, $sql)) {
        echo "Incidència registrada correctament!";
    } else {
        echo "Error en registrar la incidència: " . mysqli_error($conn);
    }
}

$email = $_SESSION['email'];
$sql = "SELECT nom, cognom, rol FROM usuaris WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Registrar Incidència</title>
</head>
<body>
    <h2>Benvingut, <?php echo $user['nom'] . " " . $user['cognom']; ?> (<?php echo $user['rol']; ?>)</h2>
    <h2>Registrar Incidència</h2>
    <form method="POST">
        <label>Títol:</label>
        <input type="text" name="titol" required><br>
        
        <label>Descripció:</label>
        <input name="descripcio" required><br>
        
        <label>Prioritat:</label>
        <select name="prioritat">
            <option value="I">Crítica</option>
            <option value="II">Urgent</option>
            <option value="III">Lleu</option>
            <option value="IV">No urgent</option>
        </select><br>

        <label>Estat:</label>
        <select name="estat">
            <option value="Oberta">Oberta</option>
            <option value="Gestió">Gestió</option>
            <option value="Tancada">Tancada</option>
            <option value="reoberta">Reoberta</option>
        </select><br>

        <button type="submit">Registrar</button>
    </form>
    <br>
    <a href="acces.php">Tornar al menú</a>
</body>
</html>
