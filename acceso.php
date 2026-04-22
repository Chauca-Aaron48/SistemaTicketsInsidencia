<?php
require_once 'ConexionDB.php';

$conexionBD = new ConexionDB();
$conexionLogin = $conexionBD->getConnection();

session_start();
if(!isset($_POST['nombre']) || !isset($_POST["clave"])){
    http_response_code(400);
}else{

    $nombre = $_POST['nombre'];
    $clave = $_POST['clave']; 

    $sql = "SELECT * FROM usuario WHERE nombre = ? AND clave = ?";

    $stmt = $conexionLogin->prepare($sql);
    $stmt->execute([$nombre, $clave]);
    $resultado = $stmt->fetchAll();

    if (count($resultado) == 1) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['clave'] = $clave;
        header("Location: listar.php");
        exit();
    } else {
        http_response_code(400);
        header("Location: 400.php");
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
    <p>Los datos proporcionados son incorrectos, están incompletos o no existe el usuario ingresado.</p>
    <p><a href="index.php">Volver al inicio de sesión</a></p>
</body>
</html>