<?php
require_once 'ConexionDB.php';

session_start();

$conexionBD = new ConexionDB();
$conexionLogin = $conexionBD->getConnection();

if (!isset($_POST['usuario']) || !isset($_POST["clave"])) {
    http_response_code(400);
} else {

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuario WHERE usuario = ? AND clave = ?";

    $stmt = $conexionLogin->prepare($sql);
    $stmt->execute([$usuario, $clave]);
    $resultado = $stmt->fetchAll();

    if (count($resultado) == 1) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['clave'] = $clave;
        $_SESSION['nombre'] = $resultado[0]['nombre'];
        $_SESSION['id_usuario'] = $resultado[0]['id'];
        header("Location: listar.php");
        exit();
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