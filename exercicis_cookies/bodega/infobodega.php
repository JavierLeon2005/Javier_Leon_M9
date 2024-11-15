<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    setcookie('majoredat', $_POST['edat'], time() + (30 * 24 * 60 * 60));
    setcookie('idioma', $_POST['idioma'], time() + (30 * 24 * 60 * 60));
    setcookie('moneda', $_POST['moneda'], time() + (30 * 24 * 60 * 60));
    header("Location: infobodega.php");
    exit();
}

$majoredat = isset($_COOKIE['majoredat']) ? $_COOKIE['majoredat'] : '';
$idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'catala';
$moneda = isset($_COOKIE['moneda']) ? $_COOKIE['moneda'] : 'euro';

if ($majoredat == 'no') {
    $missatge = "No et podem vendre alcohol si ets menor d’edat.";
} else {

    if ($idioma == 'catala') {
        $missatge = "T’oferim el vi Les Terrasses a un preu de 39 ";
	$missatge1 = "Tambe t'oferim el vi La Rioja a un preu de 19";
    } elseif ($idioma == 'espanol') {
        $missatge = "Te ofrecemos el vino Les Terrasses a un precio de 39 ";
	$missatge1 = "Tambien te ofrecemos el vino La Rioja a un precio de 19";
    } else {
        $missatge = "We offer you the wine Les Terrasses at a price of 39 ";
	$missatge1 = "We also offer you the wine La Rioja at a price of 19";
    }

    if ($moneda == 'euro') {
        $missatge .= "€";
	$missatge1 .= "€";
    } elseif ($moneda == 'libra') {
        $missatge .= "£";
	$missatge1 .= "£";
    } else {
        $missatge .= "$";
	$missatge1 .= "$";
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
    <p><?php echo $missatge1; ?></p>
</body>
</html>
