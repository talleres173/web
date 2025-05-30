<!-- registrar.php -->
<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
    $confirmacion= mysqli_real_escape_string($conexion, $_POST['confirmacion']);
    // Opcional: hashear contraseña
    // $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin (usuario, contraseña,confirmacion) VALUES ('{$usuario}', '{$contraseña}','{$confirmacion}')";
    if (mysqli_query($conexion, $sql)) {
        echo 'OK';
    } else {
        echo 'Error: ' . mysqli_error($conexion);
    }
    mysqli_close($conexion);
}
?>