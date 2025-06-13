<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

    // Verificar si el usuario ya está registrado
    $sql = "INSERT INTO alumnos (usuario, contraseña) VALUES ('{$usuario}', '{$contraseña}')";
    if (mysqli_query($conexion, $sql)) {
        echo 'OK';
    } else {
        echo 'Error: ' . mysqli_error($conexion);
    }
    mysqli_close($conexion);
}
?>
    
    