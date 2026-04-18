<?php

require_once 'ConexionDB.php';

session_start();


if (isset($_GET['salir'])) {
	session_unset();
	session_destroy();
	header('Location: index.php');
	exit();
}

if (!isset($_SESSION['nombre'])) {
	header('Location: index.php');
	exit();
}

$titulo = '';
$descripcion = '';
$prioridad = 'Media';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$titulo = trim($_POST['titulo'] ?? '');
	$descripcion = trim($_POST['descripcion'] ?? '');
	$prioridad = trim($_POST['prioridad'] ?? '');

	$prioridadesPermitidas = ['Alta', 'Media', 'Baja'];

	if ($titulo === '' || $descripcion === '' || $prioridad === '' || !in_array($prioridad, $prioridadesPermitidas, true)) {
		header('Location: 400.php');
		exit();
	}

	try {
		$conexionBD = new ConexionDB();
		$conexion = $conexionBD->getConexion();

		$sql = 'INSERT INTO incidencia (nombre, descripcion, prioridad, usuario) VALUES (?, ?, ?, ?)';
		$stmt = $conexion->prepare($sql);
		$ok = $stmt->execute([$titulo, $descripcion, $prioridad, $_SESSION['nombre']]);

		if ($ok) {
			header('Location: 201.php');
			exit();
		}

		header('Location: 500.php');
		exit();
	} catch (Throwable $e) {
		header('Location: 500.php');
		exit();
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrar incidencia</title>
</head>
<body>
	<h1>Registrar incidencia</h1>
	<p>Usuario: <?php echo htmlspecialchars($_SESSION['nombre']); ?></p>
	<p><a href="registrar.php?salir=1">Cerrar sesion</a></p>

	<form action="registrar.php" method="post">
		<fieldset>
			<label for="titulo">Titulo</label>
			<input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
			<br><br>

			<label for="descripcion">Descripcion</label>
			<textarea name="descripcion" id="descripcion" rows="4" cols="50"><?php echo htmlspecialchars($descripcion); ?></textarea>
			<br><br>

			<label for="prioridad">Prioridad</label>
			<select name="prioridad" id="prioridad">
				<option value="Alta" <?php echo $prioridad === 'Alta' ? 'selected' : ''; ?>>Alta</option>
				<option value="Media" <?php echo $prioridad === 'Media' ? 'selected' : ''; ?>>Media</option>
				<option value="Baja" <?php echo $prioridad === 'Baja' ? 'selected' : ''; ?>>Baja</option>
			</select>
			<br><br>

			<input type="submit" value="Guardar">
		</fieldset>
	</form>

	<p><a href="listar.php">Volver al listado</a></p>
</body>
</html>
