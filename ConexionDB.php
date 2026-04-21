<?php

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
        $dsn = "mysql:host=($this->host);dbname=($this->db);charset=($this->charset)";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            http_response_code(500);
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function insertarIncidencia($incidencia){
        
    }

}
