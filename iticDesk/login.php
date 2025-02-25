<?php
session_start();
$conn = mysqli_connect('localhost', 'xavi', 'xavi', 'javier_leon_iticdesk');

if (!$conn) {
    echo "No va tt";
} else {
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];

    $sql = "SELECT * FROM usuaris WHERE email = '$email' AND contrasenya = '$contrasenya'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['pagina'] = 'acces';

        header('Location: acces.php');
    } else {
        echo "Login incorrecte. Torna a intentar-ho.";
        echo "<br>";
        echo "<a href='index.html'>Tornar al login</a>";
    }
    echo $sql;
}
?>


