<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
    header("Location: listar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Incidencias Técnicas</title>
</head>

<body>
    <h1>Sistemas de Incidencias Técnicas</h1>
    <h2>Bienvenido, ingrese sus credenciales por favor</h2>
    <form action="acceso.php" method="post">
        <fieldset>
            <legend>Inicio de Sesión</legend>
            <label for="usuario">Usuario:</label><br>
            <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario">
            <br>
            <label for="clave">Contraseña:</label><br>
            <input type="password" name="clave" id="clave" placeholder="Ingrese su contraseña">
            <br><br>
            <input type="submit" value="Ingresar">
        </fieldset>
    </form>
</body>

</html>