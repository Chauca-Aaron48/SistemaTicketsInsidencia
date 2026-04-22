<?php
require_once 'Usuario.php';

session_start();

if (!isset($_POST['usuario']) || !isset($_POST["clave"])) {
    http_response_code(400);
} else {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    try {
        $usuarioObj = new Usuario($usuario, $clave);
        $usuarioValido = $usuarioObj->validar();

        if ($usuarioValido) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['clave'] = $clave;
            $_SESSION['nombre'] = $usuarioValido['nombre'];
            $_SESSION['id_usuario'] = $usuarioValido['id'];
            header("Location: listar.php");
            exit();
        }
    } catch (Exception $e) {
        http_response_code(500);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 400</title>
</head>

<body>
    <h1>Error 400: Bad Request</h1>
    <p>Credenciales incorrectas.</p>
    <p><a href="index.php">Volver al inicio de sesión</a></p>
</body>

</html>