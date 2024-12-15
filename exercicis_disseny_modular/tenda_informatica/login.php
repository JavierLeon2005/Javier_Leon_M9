<?php
session_start();

$_SESSION['user_login'] = 'intento';  // Potser caldria treure aquesta línia ja que sobreescriu el valor
$user = $_POST['user_log'];
$password = $_POST['pswd'];

if ($user != $password) {
    session_destroy();
    header("Location: ./index_login.html");
} else {
	$_SESSION['user_login']=$user;
	$_SESSION['log']=true;
    // Redirigir a la pàgina tenda.php
    header("Location: ./tenda.php");
}
?>

