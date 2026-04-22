<?php
require_once 'ConexionDB.php';

/**
 * Clase que centraliza toda la lógica de usuarios en la BD
 */
class Usuario
{
    /**
     * Valida las credenciales del usuario
     * @param string $usuario
     * @param string $clave
     * @return array|null - Array con datos del usuario si es válido, null si no
     */
    public static function validarCredenciales($usuario, $clave)
    {
        $sql = "SELECT * FROM usuario WHERE usuario = ? AND clave = ?";

        try {
            $conn = new ConexionDB();
            $stmt = $conn->getConnection()->prepare($sql);
            $stmt->execute([$usuario, $clave]);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($resultado) == 1) {
                return $resultado[0];
            }
            return null;
        } catch (PDOException $e) {
            throw new Exception("Error al validar credenciales: " . $e->getMessage());
        }
    }
}
