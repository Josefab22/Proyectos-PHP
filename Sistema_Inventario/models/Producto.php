<?php
class Producto {
    private $id;
    private $codigo;
    private $nombre;
    private $descripcion;
    private $precio_compra;
    private $precio_venta;
    private $stock;
    private $estado;

    public function __construct($id, $codigo, $nombre, $descripcion, $precio_compra, $precio_venta, $stock, $estado) {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->stock = $stock;
        $this->estado = $estado;
    }

    // =======================================================================
    // NUEVO MÉTODO: Lógica para insertar el producto en la Base de Datos
    // =======================================================================
    public function guardarProducto($conn) {
        try {
            // 1. Preparamos el SQL con marcadores (los que tienen dos puntos al inicio)
            $sql = "INSERT INTO productos (codigo, nombre, descripcion, precio_compra, precio_venta, stock, estado) 
                    VALUES (:codigo, :nombre, :descripcion, :precio_compra, :precio_venta, :stock, :estado)";
            
            $stmt = $conn->prepare($sql);
            
            // 2. Vinculamos nuestros atributos privados a los marcadores (Bind Parameters)
            $stmt->bindParam(':codigo', $this->codigo);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':descripcion', $this->descripcion);
            $stmt->bindParam(':precio_compra', $this->precio_compra);
            $stmt->bindParam(':precio_venta', $this->precio_venta);
            $stmt->bindParam(':stock', $this->stock);
            $stmt->bindParam(':estado', $this->estado);
            
            // 3. Ejecutamos la consulta. Retorna true si fue exitoso
            return $stmt->execute();

        } catch(PDOException $exception) {
            // Si algo falla (ej: código duplicado), mostramos el error (útil para ti ahorita programando)
            echo "Error al guardar el producto: " . $exception->getMessage();
            return false;
        }
    }
    // =======================================================================
    // NUEVO MÉTODO: Leer todos los productos para mostrarlos en la tabla
    // =======================================================================
    public static function leerTodos($conn) {
        try {
            // Hacemos el SELECT ordenado por el más reciente primero
            $sql = "SELECT * FROM productos ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            // fetchAll(PDO::FETCH_OBJ) convierte cada fila en un objeto de PHP
            return $stmt->fetchAll(PDO::FETCH_OBJ);
            
        } catch(PDOException $exception) {
            echo "Error al cargar los productos: " . $exception->getMessage();
            return false;
        }
    }
}
?>