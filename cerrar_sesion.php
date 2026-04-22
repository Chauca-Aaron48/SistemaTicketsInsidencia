<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['clave'])) {
    header("Location: index.php");
    exit();
}
session_destroy();
header("Location: index.php");
exit();
?>