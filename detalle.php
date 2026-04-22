<?php
require_once "ConexionDB.php";

session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["clave"])) {
    header("Location: index.php");
    exit();
}

$usuarioLoggeado = $_SESSION["id_usuario"];

$conexionBD = new ConexionDB();

$db = $conexionBD->getConnection();

$sql = "SELECT id, nombre, descripcion, prioridad FROM incidencia WHERE id_usuario = ? AND id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$usuarioLoggeado, $_GET['id']]);
$incidencia = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Incidencia</title>
</head>

<body>

    <header>
        <h6><a href="cerrar_sesion.php">Cerrar Sesión</a></h6>
    </header>

    <h1>Detalle de la Incidencia</h1>


    <h3>Usuario loggeado: </h3>
    <p><?php echo $_SESSION['nombre']; ?></p>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Prioridad</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td><?php echo htmlspecialchars($incidencia['id']); ?></td>
                <td><?php echo htmlspecialchars($incidencia['nombre']); ?></td>
                <td><?php echo htmlspecialchars($incidencia['descripcion']); ?></td>
                <td><?php echo htmlspecialchars($incidencia['prioridad']); ?></td>
            </tr>
        </tbody>
    </table>




    <p><a href="listar.php">Regresar</a></p>




</body>

</html>