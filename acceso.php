<?php
require_once 'Usuario.php';

session_start();
if (empty($_POST['usuario']) || empty($_POST["clave"])) {
    header('Location: 401.php');
    exit();
} else {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    try {
        $usuarioObj = new Usuario($usuario, $clave);
        $usuarioValido = $usuarioObj->validar();

        if ($usuarioValido) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['clave'] = $clave;
            $_SESSION['nombre'] = $usuarioValido['nombre'];
            $_SESSION['id_usuario'] = $usuarioValido['id'];
            header("Location: listar.php");
            exit();
        }
    } catch (Exception $e) {
        header('Location: 500.php');
        exit();
    }
}

?>