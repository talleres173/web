<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

    // Buscar usuario por nombre
    $sql = "SELECT * FROM alumnos WHERE usuario = '{$usuario}'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // El usuario existe, validamos la contraseña
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila['contraseña'] === $contraseña) {
            echo 'INGRESO EXITOSO'; // Usuario y contraseña correctos
        } else {
            echo 'YA ESTA REGISTRADO'; // Usuario existe pero contraseña incorrecta
        }
    } else {
        // No existe, lo registramos
        $sql_insert = "INSERT INTO alumnos (usuario, contraseña) VALUES ('{$usuario}', '{$contraseña}')";
        if (mysqli_query($conexion, $sql_insert)) {
            echo 'REGISTRECE'; // Registrado correctamente
        } else {
            echo 'ERROR';
        }
    }

    mysqli_close($conexion);
}
?>

