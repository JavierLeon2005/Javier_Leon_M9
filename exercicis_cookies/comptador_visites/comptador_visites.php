<?php
if (isset($_COOKIE['visites'])) {
    $visites = $_COOKIE['visites'] + 1;
} else {
    $visites = 1;
}

setcookie('visites', $visites, time() + 3600 * 24 * 30);

$haComprat = isset($_COOKIE['haComprat']) && $_COOKIE['haComprat'] === 'true';

$descompte = 0;
$missatgeDescompte = "";
if (!$haComprat) {
    if ($visites >= 10) {
        $descompte = 50;
        $missatgeDescompte = "Oferta exclusiva sols per a tu! Utilitza el codi BOTIGA50 per obtenir un 50% de descompte en les teves primeres compres a la botiga";
    } elseif ($visites >= 5) {
        $descompte = 20;
        $missatgeDescompte = "Oferta exclusiva! Utilitza el codi BOTIGA20 per obtenir un 20% de descompte en les teves primeres compres a la botiga";
    }
}

$missatgeCompra = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codiIntroduit = trim($_POST['codiDescompte']);

    error_log("Descompte actual: $descompte, Codi introduït: $codiIntroduit");

    if (!$haComprat) {
        if (($codiIntroduit === "BOTIGA20" && $descompte === 20) || ($codiIntroduit === "BOTIGA50" && $descompte === 50)) {
            setcookie('haComprat', 'true', time() + 3600 * 24 * 30);
            header("Location: confirmacio_compra.php");
            exit();
        } else {
            $missatgeCompra = "Codi de descompte invàlid o no aplicable!";
        }
    } else {
        $missatgeCompra = "Ja has fet una compra. Els codis de descompte no són vàlids després de la compra.";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptador de Visites i Descomptes</title>
</head>
<body>
    <h1>Benvingut a la nostra botiga</h1>

    <p>Has visitat aquesta pàgina <?php echo $visites; ?> vegades.</p>

    <?php if (!$haComprat && $descompte > 0): ?>
        <p><?php echo $missatgeDescompte; ?></p>
    <?php elseif ($haComprat): ?>
        <p>Ja has fet una compra i els codis de descompte ja no són vàlids.</p>
    <?php endif; ?>

    <form method="post">
        <label for="codiDescompte">Introdueix el codi de descompte:</label>
        <input type="text" name="codiDescompte" id="codiDescompte" >
        <button type="submit">Compra amb descompte</button>
    </form>

    <?php if ($missatgeCompra): ?>
        <p><?php echo $missatgeCompra; ?></p>
    <?php endif; ?>
</body>
</html>
