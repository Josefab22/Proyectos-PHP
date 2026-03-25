<?php
class Conexion {
    private $host = "localhost";
    private $dbname = "sistema_inventario";
    private $username = "root"; // Cambia esto si tu usuario de XAMPP/WAMP es distinto
    private $password = "";     // Cambia esto si tienes contraseña en tu base de datos
    public $conn;

    // Método para obtener la conexión
    public function obtenerConexion() {
        $this->conn = null;

        try {
            // Creamos la instancia de PDO
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8", 
                $this->username, 
                $this->password
            );
            
            // Configuración CRÍTICA para las transacciones: 
            // Obligamos a PDO a lanzar excepciones si ocurre algún error en SQL
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Forzamos el uso de objetos por defecto para facilitar la lectura de datos
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch(PDOException $exception) {
            // Si la conexión falla, detenemos el sistema y mostramos el error
            die("Error crítico de conexión a la Base de Datos: " . $exception->getMessage());
        }

        return $this->conn;
    }
}
?>