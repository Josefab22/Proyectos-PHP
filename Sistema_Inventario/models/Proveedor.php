<?php
class Proveedor {
    private $id;
    private $nombre;
    private $rif;
    private $telefono;
    private $direccion;
    private $estado;

    public function __construct($id, $nombre, $rif, $telefono, $direccion, $estado) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->rif = $rif;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->estado = $estado;
    }
    // =======================================================================
    // MÉTODO: Guardar el proveedor en la Base de Datos
    // =======================================================================
    public function guardarProveedor($conn) {
        try {
            $sql = "INSERT INTO proveedores (nombre, rif, telefono, direccion, estado) 
                    VALUES (:nombre, :rif, :telefono, :direccion, :estado)";
            
            $stmt = $conn->prepare($sql);
            
            // Vinculamos parámetros por seguridad (evita inyección SQL)
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':rif', $this->rif);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':direccion', $this->direccion);
            $stmt->bindParam(':estado', $this->estado);
            
            return $stmt->execute();

        } catch(PDOException $exception) {
            echo "Error al guardar el proveedor: " . $exception->getMessage();
            return false;
        }
    }

    // =======================================================================
    // MÉTODO ESTÁTICO: Leer todos los proveedores para la tabla HTML
    // =======================================================================
    public static function leerTodos($conn) {
        try {
            $sql = "SELECT * FROM proveedores ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
            
        } catch(PDOException $exception) {
            echo "Error al cargar los proveedores: " . $exception->getMessage();
            return false;
        }
    }
}
?>