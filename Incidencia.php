<?php
require_once 'ConexionBD.php';
/**
 * Clase que representa una persona.
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

    # Métodos de incidencias

    public function crear()
    {
        $sql = "INSERT INTO incidencia (id_usuario, titulo, descripcion, prioridad) VALUES (?, ?, ?, ?)";

        try {
            $conn = new ConexionDB();
            $stmt = $conn->getConnection()->prepare($sql);
            $stmt->execute([$this->getIdUsuario(), $this->getTitulo(), $this->getDescripcion(), $this->getPrioridad()]);

            // Configurar el valor del id de la nueva persona.
            $this->setId($conn->getConnection()->lastInsertId());
        } catch (PDOException $e) {
            throw new Exception("Error al insertar persona: " . $e->getMessage());
        }
    }

    public function consultarPorIdIncidencia($id)
    {
        $sql = "SELECT * FROM incidencia WHERE id = ?";

        try {
            $conn = new ConexionDB();
            $stmt = $conn->getConnection()->prepare($sql);
            $stmt->execute([$id]);

            $fila = $stmt->fetch();
            if ($fila) {
                $incidencia = new Incidencia($fila['id_usuario'], $fila['titulo'], $fila['descripcion'], $fila['prioridad']);
                $incidencia->setId($fila['id']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            throw new Exception("Error al consultar persona por id: " . $e->getMessage());
        }
    }


    	public function obtenerTodasIncidencias(){
		 $sql = "SELECT * FROM incidencia";
        
        try {
			$cnn = new ConexionDB();
            $stmt = $cnn->getConnection()->prepare($sql);
            $stmt->execute();
            
            $filas = $stmt->fetchAll();
            $incidencias = [];
            foreach ($filas as $fila) {
                $incidencia = new Incidencia($fila['id_usuario'], $fila['titulo'], $fila['descripcion'], $fila['prioridad']);
                $incidencia->setId($fila['id']);
                $incidencias[] = $incidencia;
            }
            return $incidencias;
        } catch (PDOException $e) {
            throw new Exception("Error al obtener incidencias: " . $e->getMessage());
        }
	}

}
