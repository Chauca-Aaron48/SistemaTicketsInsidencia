<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['clave'])) {
    header("Location: index.php");
    exit();
}
http_response_code(400);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 400</title>
</head>

<body>
    <h3>Usuario: <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>
    <fieldset>
        <h1>Error 400 - Bad request</h1>
    </fieldset>
    <p><a href="registrar.php">Volver al registro</a></p>
    <p><a href="cerrar_sesion.php">Cerrar Sesión</a></p>
</body>

</html>