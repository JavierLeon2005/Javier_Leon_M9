<?php

$conn = mysqli_connect('localhost', 'xavi', 'xavi', 'M9_XAVI');

if (!$conn){
	echo "No va tt";
}
else{
	$nota = $_GET['nota'];
	$sql = "SELECT * FROM usuaris WHERE nota > $nota";
	$query = mysqli_query($conn,$sql);
	$rows = mysqli_num_rows($query);
	echo "Hi ha $rows alumnes amb més d'un $nota";
}
?>
