<?php
require_once 'ConexionDB.php';

/**
 * Clase que centraliza toda la lógica de incidencias en la BD
 */
class Incidencia
{
    private $id;
    private $id_usuario;
    private $titulo;
    private $descripcion;
    private $prioridad;

    public function __construct($id_usuario = null, $titulo = null, $descripcion = null, $prioridad = null)
    {
        $this->id_usuario = $id_usuario;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->prioridad = $prioridad;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getPrioridad()
    {
        return $this->prioridad;
    }

    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;
    }


    public function toString()
    {
        return "| Id: " . $this->getId() .
            " | titulo: " . $this->getTitulo() .
            " | descripcion: " . $this->getDescripcion() .
            " | prioridad: " . $this->getPrioridad();
    }

    # Métodos de BD para incidencias

    /**
     * Registra una nueva incidencia en la BD
     */
    public static function registrarIncidencia($titulo, $descripcion, $prioridad, $id_usuario)
    {
        $sql = 'INSERT INTO incidencia (titulo, descripcion, prioridad, id_usuario) VALUES (?, ?, ?, ?)';

        try {
            $conn = new ConexionDB();
            $stmt = $conn->getConnection()->prepare($sql);
            return $stmt->execute([$titulo, $descripcion, $prioridad, $id_usuario]);
        } catch (PDOException $e) {
            throw new Exception("Error al registrar incidencia: " . $e->getMessage());
        }
    }

    /**
     * Obtiene todas las incidencias de un usuario
     */
    public static function obtenerIncidenciasPorUsuario($id_usuario)
    {
        $sql = "SELECT id, titulo, descripcion, prioridad FROM incidencia WHERE id_usuario = ?";

        try {
            $conn = new ConexionDB();
            $stmt = $conn->getConnection()->prepare($sql);
            $stmt->execute([$id_usuario]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener incidencias: " . $e->getMessage());
        }
    }

    /**
     * Obtiene una incidencia específica
     */
    public static function obtenerIncidenciaPorId($id, $id_usuario)
    {
        $sql = "SELECT id, titulo, descripcion, prioridad FROM incidencia WHERE id = ? AND id_usuario = ?";

        try {
            $conn = new ConexionDB();
            $stmt = $conn->getConnection()->prepare($sql);
            $stmt->execute([$id, $id_usuario]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener incidencia: " . $e->getMessage());
        }
    }

}
