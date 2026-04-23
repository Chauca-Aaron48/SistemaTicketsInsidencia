<?php

if (php_sapi_name() !== 'cli' && basename($_SERVER['SCRIPT_FILENAME']) === 'ConexionDB.php') {
    header('Location: 403.php');
    exit();
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
            header('Location: 500.php');
            exit();
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function insertarIncidencia($incidencia)
    {
    }
}
?>