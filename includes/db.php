<?php

$conn = mysqli_connect(
    'servidor', //server
   'root', // user
    '123456', //password
    '161cdmx1' );

/*
    if (isset($conn)){
        echo "db is connected";
    } else {
        echo "db is NOT connected";
    }
*/
$mysqli = new mysqli("servidor","root","123456","161cdmx1"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	/*if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	} 
*/
?>

