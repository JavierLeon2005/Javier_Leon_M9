<?php
include 'header.php';

echo "<h2>Productes disponibles</h2>";

// Mostrar productes amb els preus
echo "<ul>
        <li>Portàtil ASUS - 1000€</li>
        <li>Monitor LG - 200€</li>
        <li>Teclat mecànic Logitech - 100€</li>
      </ul>";

// Enllaç per veure més productes a tenda2.php
echo '<a href="tenda2.php">Veure més productes</a>';

include 'descomptes.php';
include 'footer.php';
?>
