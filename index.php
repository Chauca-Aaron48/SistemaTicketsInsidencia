<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sistemas de Incidencias Técnicas</h1>
    <h2>Bienvenido, ingrese sus credenciales por favor</h2>
    <form action="acceso.php" method="post">
        <fieldset>
            <label for="nombre">Usuario:</label><br>
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese su usuario" required>
            <br>
            <label for="password">Contraseña:</label><br>
            <input type="password" name="clave" id="password" placeholder="Ingrese su contraseña" required>
            <br><br>
            <input type="submit" value="Ingresar">
        </fieldset>
    </form>
</body>
</html>