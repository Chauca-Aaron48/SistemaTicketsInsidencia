<?php

require_once 'ConexionDB.php';

session_start();

if (!isset($_SESSION['usuario']) && !isset($_SESSION['clave'])) {
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
		$conexion = $conexionBD->getConnection();

		$sql = 'INSERT INTO incidencia (titulo, descripcion, prioridad, id_usuario) VALUES (?, ?, ?, ?)';
		$stmt = $conexion->prepare($sql);
		$ok = $stmt->execute([$titulo, $descripcion, $prioridad, $_SESSION['id_usuario']]);

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
	<h1>Registrar Incidencia</h1>
	<p>Usuario: <?php echo htmlspecialchars($_SESSION['nombre']); ?></p>

	<form action="registrar.php" method="post">
		<fieldset>
			<legend>
				<h3>Formulario de registro</h3>
			</legend>
			<label for="titulo">Título:</label><br>
			<input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($titulo); ?>" required>
			<br><br>

			<label for="descripcion">Descripción:</label><br>
			<textarea name="descripcion" id="descripcion" rows="4" cols="50"
				required><?php echo htmlspecialchars($descripcion); ?></textarea>
			<br><br>

			<label for="prioridad">Prioridad:</label>
			<select name="prioridad" id="prioridad" required>
				<option value="Alta" <?php echo $prioridad === 'Alta' ? 'selected' : ''; ?>>Alta</option>
				<option value="Media" <?php echo $prioridad === 'Media' ? 'selected' : ''; ?>>Media</option>
				<option value="Baja" <?php echo $prioridad === 'Baja' ? 'selected' : ''; ?>>Baja</option>
			</select>
			<br><br>

			<input type="submit" value="Guardar">
		</fieldset>
	</form>

	<p><a href="listar.php">Volver al listado</a></p>
	<p><a href="cerrar_sesion.php">Cerrar sesion</a></p>
</body>

</html>