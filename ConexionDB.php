<?php

if (php_sapi_name() !== 'cli' && basename($_SERVER['SCRIPT_FILENAME']) === 'ConexionDB.php') {
    http_response_code(403);
    die("Acceso denegado");

?>

    <HTML>

    <head></head>

    <body>
        <h1>403 - Acceso Denegado</h1>
        <p>No tienes permiso para acceder a este recurso.</p>
        <p><a href="index.php">Volver al inicio de sesión</a></p>
    </body>

    </HTML>

<?php


}

class ConexionDB
{
    private $host = "localhost";
    private $db = "sistema_incidencias";
    private $username = "root";
    private $password = "";
    private $charset = 'utf8mb4';
    public $pdo;


    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            http_response_code(500);
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function insertarIncidencia($incidencia) {}
}
