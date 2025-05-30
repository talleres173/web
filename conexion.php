<?php
$host = 'localhost';
$usuario = 'root';
$password = '';
$base = 'usuarios';
$conexion = mysqli_connect($host, $usuario, $password, $base);
if (!$conexion) {
    die('Fallo en la conexión: ' . mysqli_connect_error());
}
?>


