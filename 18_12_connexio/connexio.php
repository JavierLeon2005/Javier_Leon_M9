<?php

$conn = mysqli_connect("localhost", "xavi", "xavi", "M9_XAVI");

if (!$conn){
	echo "No estas mi lko". mysqli_connect_error();
}
else{
	echo "Estas mi lko";
}

$query = mysqli_query($conn, "INSERT INTO usuaris (dni, nom, cognom) VALUES ('24681357G', 'Rafa', 'Muñoz')");
?>
