<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['clave'])) {
    header("Location: index.php");
    exit();
}
if (require_once 'ConexionDB.php') {
    http_response_code(500);
    if (!isset($_SESSION['usuario'])) {
        ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Código 500</title>
        </head>

        <body>
            <fieldset>
                <h1>Error 500 - Internal Server Error</h1>
            </fieldset>
            <p><a href="registrar.php">Volver al registro</a></p>
        </body>

        </html>
        <?php
        exit();
    }
}
http_response_code(500);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código 500</title>
</head>

<body>
    <h3>Usuario: <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>
    <fieldset>
        <h1>Error 500 - Internal Server Error</h1>
    </fieldset>
    <p><a href="registrar.php">Volver al registro</a></p>
    <p><a href="cerrar_sesion.php"> Cerrar sesión</a></p>
</body>

</html>