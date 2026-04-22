<?php
require_once 'ConexionDB.php';

session_start();

if (!isset($_SESSION['usuario']) && !isset($_SESSION['clave'])) {
    header("Location: index.php");
    exit();
}

$usuarioLogeado = $_SESSION['id_usuario'];

$conexionBD = new ConexionDB();
$db = $conexionBD->getConnection();

$sql = "SELECT id, titulo, descripcion, prioridad FROM incidencia WHERE id_usuario = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$usuarioLogeado]);
$incidencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Incidencias</title>
</head>

<body>

    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>

    <a href="registrar.php">+ Registrar Nueva Incidencia</a>
    <br>

    <h2>Lista de Incidencias</h2>

    <?php if (count($incidencias) > 0): ?>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($incidencias as $incidencia): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($incidencia['titulo']); ?></td>
                        <td>
                            <a href="detalle.php?id=<?php echo urlencode($incidencia['id']); ?>">
                                Ver detalle
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tienes incidencias registradas aún.</p>
    <?php endif; ?>

    <br>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>

</html>