<?php
// Connexió a la base de dades
$conn = mysqli_connect('localhost', 'xavi', 'xavi', 'M9_XAVI');

if (!$conn) {
    echo "No va tt";
} else {
    // Obtenim les dades del formulari
    $nom = $_POST['nom'];
    $contrasenya = $_POST['contrasenya'];

    // Consulta per verificar l'usuari i contrasenya
    $sql = "SELECT * FROM usuarios WHERE nom = '$nom' AND contrasenya = '$contrasenya'";
    $query = mysqli_query($conn, $sql);

    // Si trobem l'usuari, creem una sessió i redirigim a page1.php
    if (mysqli_num_rows($query) > 0) {
        session_start(); // Comença la sessió
        $_SESSION['nom'] = $nom; // Guardem el nom d'usuari a la sessió
        $_SESSION['pagina'] = 'page1'; // Guardem la pàgina a la sessió

        // Redirigeix sempre a page1.php
        header('Location: page1.php');
        exit(); // Atura l'execució per evitar que es mostri el codi després de la redirecció
    } else {
        echo "Login incorrecte. Torna a intentar-ho.";
        echo "<br>";
        echo "<a href='index.html'>Tornar al login</a>";
    }
}
?>


