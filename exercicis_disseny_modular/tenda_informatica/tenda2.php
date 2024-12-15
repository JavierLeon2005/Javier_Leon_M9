<?php
include 'header.php';

echo "<h2>Més productes disponibles</h2>";

// Mostrar productes amb els preus
echo "<ul>
        <li>Impressora Epson - 150€</li>
        <li>Disc dur SSD Samsung - 120€</li>
        <li>Altaveus Bluetooth Sony - 80€</li>
      </ul>";

// Enllaç per tornar a tenda.php
echo '<a href="tenda.php">Tornar a la tenda</a>';

include 'descomptes.php';
include 'footer.php';
?>
