<?php
session_start();
$conn = mysqli_connect('localhost', 'javierLeonExam', 'Admin1234*', 'javierLeonExam');

if (!$conn) {
    echo "No va tt";
} else {
    
    $año = $_POST['año'];
    $sql = "SELECT TITULO, ANYO, PUNTUACION FROM peliculas WHERE ANYO = '$año'";
    $query = mysqli_query($conn, $sql);

    echo $sql;  
} 
?>
