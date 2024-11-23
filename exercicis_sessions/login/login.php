<?php
session_start();

// Comprovem si s'ha enviat el formulari
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validació: usuari i contrasenya han de ser iguals
    if ($username == $password) {
        $_SESSION["username"] = $username;
        header("Location: page1.php"); // Redirigim a la pàgina d'informació
    } else {
        echo "<p>Usuari o contrasenya incorrectes. Torna a intentar-ho.</p>";
    }
}
?>

