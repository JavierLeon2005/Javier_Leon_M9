<?php
$conn = mysqli_connect('localhost', 'xavi', 'xavi', 'M9_XAVI');

if (!$conn) {
    echo "No va tt";
} else {
    $nom = $_POST['nom'];
    $contrasenya = $_POST['contrasenya'];

    $sql = "SELECT * FROM usuarios WHERE nom = '$nom' AND contrasenya = '$contrasenya'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        session_start();
        $_SESSION['nom'] = $nom;
        $_SESSION['pagina'] = 'page1';

        header('Location: page1.php');
    } else {
        echo "Login incorrecte. Torna a intentar-ho.";
        echo "<br>";
        echo "<a href='index.html'>Tornar al login</a>";
    }
}
?>


