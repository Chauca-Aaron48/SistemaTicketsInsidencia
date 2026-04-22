<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['clave'])) {
    header("Location: index.php");
    exit();
}
http_response_code(201);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código 201</title>
</head>
<body>
    <h3>Usuario: <?php echo htmlspecialchars($_SESSION['nombre']); ?></h3>
    <fieldset>
        <h1>Incidencia Creada - 201 Created</h1>
    </fieldset>
    <p><a href="listar.php">Volver al listado de incidencias</a></p>
</body>

</html>