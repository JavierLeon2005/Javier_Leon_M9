<?php
session_start();

// Recuperem la cistella
$cistella = isset($_SESSION['cistella']) ? $_SESSION['cistella'] : ['Ruffles' => 0, 'Doritos' => 0];

// Preus dels productes
$preu_patatas = 2;
$preu_doritos = 3;

// Càlcul del total
$total_patatas = $cistella['Ruffles'] * $preu_patatas;
$total_doritos = $cistella['Doritos'] * $preu_doritos;
$total_general = $total_patatas + $total_doritos;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resum de la compra</title>
</head>
<body>
    <h1>Resum de la compra</h1>
    <ul>
        <li>Ruffles: <?php echo $cistella['cafè']; ?> unitats - <?php echo $total_patatas; ?> €</li>
        <li>Doritos: <?php echo $cistella['te']; ?> unitats - <?php echo $total_doritos; ?> €</li>
    </ul>
    <h2>Total: <?php echo $total_general; ?> €</h2>

    <form action="confirmar_compra.php" method="POST">
        <button type="submit">Confirmar compra</button>
    </form>
    <a href="index.html">Tornar a la botiga</a>
</body>
</html>
