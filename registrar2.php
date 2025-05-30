<!-- registrar2.php -->
<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = mysqli_real_escape_string($conexion, $_POST['matricula']);
    $grupo = mysqli_real_escape_string($conexion, $_POST['grupo']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
    $edad = mysqli_real_escape_string($conexion, $_POST['edad']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
    $confirmación = mysqli_real_escape_string($conexion, $_POST['confirmación']); // corregido
    $fecha = mysqli_real_escape_string($conexion, $_POST['fecha']);

    // Opcional: Verificar que contraseña y confirmación coincidan
    if ($contraseña !== $confirmación) {
        echo "Error: Las contraseñas no coinciden.";
        exit;
    }

    // Opcional: Hashear la contraseña antes de guardar
    // $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql = "INSERT INTO ingresar (matricula, grupo, nombre, apellidos, edad, contraseña, confirmación, fecha)
            VALUES ('$matricula', '$grupo', '$nombre', '$apellidos', '$edad', '$contraseña', '$confirmación', '$fecha')";

    if (mysqli_query($conexion, $sql)) {
        echo 'OK';
    } else {
        echo 'Error: ' . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>
