<?php
// conexion

$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'medellin';
$db = mysqli_connect($servidor, $usuario , $password, $basededatos);
mysqli_query($db, "SET NAMES 'utf8'");

// Comprobar si la condiguracion se realizo 

if(mysqli_connect_errno()){
    echo "la conexion a fallado:" . mysqli_connect_errno();
}else{
    echo "Conexion exitosa";
}

?>