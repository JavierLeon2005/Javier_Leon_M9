<?php
// Guardem les dades de les cookies a partir del formulari
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    setcookie('majoredat', $_POST['edat'], time() + (30 * 24 * 60 * 60));
    setcookie('idioma', $_POST['idioma'], time() + (30 * 24 * 60 * 60));
    setcookie('moneda', $_POST['moneda'], time() + (30 * 24 * 60 * 60));
    header("Location: infobodega.php"); // Redirigim a la mateixa pàgina per evitar doble enviament
    exit();
}

// Llegim les cookies
$majoredat = isset($_COOKIE['majoredat']) ? $_COOKIE['majoredat'] : '';
$idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'catala';
$moneda = isset($_COOKIE['moneda']) ? $_COOKIE['moneda'] : 'euro';

// Mostrem el missatge depenent de l'edat
if ($majoredat == 'no') {
    $missatge = "No et podem vendre alcohol si ets menor d’edat.";
} else {
    // Generem el missatge segons l'idioma i la moneda
    if ($idioma == 'catala') {
        $missatge = "T’oferim el vi “Les Terrasses” a un preu de 39 ";
    } elseif ($idioma == 'espanol') {
        $missatge = "Te ofrecemos el vino “Les Terrasses” a un precio de 39 ";
    } else {
        $missatge = "We offer you the wine “Les Terrasses” at a price of 39 ";
    }

    if ($moneda == 'euro') {
        $missatge .= "€";
    } elseif ($moneda == 'libra') {
        $missatge .= "£";
    } else {
        $missatge .= "$";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informació de la Botiga</title>
</head>
<body>
    <h1>Informació de la Botiga</h1>
    <p><?php echo $missatge; ?></p>
</body>
</html>
