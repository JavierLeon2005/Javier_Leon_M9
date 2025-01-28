<?php

$conn = mysqli_connect('localhost', 'xavi', 'xavi', 'M9_XAVI');

if (!$conn){
	echo "No va tt";
}
else{
	$nota = $_GET['nota'];
	$sql = "SELECT * FROM usuaris WHERE nota > $nota";
	$query = mysqli_query($conn,$sql);
	$array = mysqli_fetch_array($query);
	
	while($rows = mysqli_fetch_array($query)){
		echo "Nom alumne: " . $rows['nom'] . ". Cognom alumne: " . $rows['cognom'] . ". Nota:" . $rows['nota'] . "<br>";
		echo $rows[0];
		echo $rows['dni'];
	} 
	/*$rows = mysqli_num_rows($query);
	echo "Hi ha $rows alumnes amb més d'un $nota";*/
	/*$sql = "INSERT INTO usuaris (`dni`, `nom`, `cognom`, `nota`) VALUES ('13578642A','Manel','Camon','6')";
	$query = mysqli_query($conn,$sql);
	$affected_rows = mysqli_affected_rows($conn);
	echo "S'han introduit $affected_rows a la taula usuaris";*/
}
?>
