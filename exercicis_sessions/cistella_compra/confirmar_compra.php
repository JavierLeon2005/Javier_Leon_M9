<?php
session_start();

// Eliminem la cistella
unset($_SESSION['cistella']);

// Missatge de confirmació
echo "<h1>Compra confirmada!</h1>";
echo "<p>Gràcies per comprar a la nostra botiga.</p>";
echo '<a href="index.html">Tornar a la botiga</a>';
?>
