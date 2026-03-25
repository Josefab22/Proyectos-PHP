<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Datos del Encabezado de la Venta
    $fecha = htmlspecialchars($_POST['fecha']);
    $total = floatval($_POST['total']);
    $estado = htmlspecialchars($_POST['estado']);

    require_once '../models/Venta.php';
    require_once '../models/DetalleVenta.php'; // Clase que dedujimos que faltaba
    require_once '../models/Producto.php'; 
    require_once '../models/MovimientoInventario.php';

    // 2. Instanciamos la Venta
    $nuevaVenta = new Venta(null, $fecha, $total, $estado);

    // =========================================================================
    // 🚧 ZONA DE TRANSACCIÓN OBLIGATORIA (BASE DE DATOS) 🚧
    // Lógica que implementaremos después:
    // 1. Guardar $nuevaVenta en la tabla 'ventas'
    // 2. Obtener el ID de la venta
    // 3. Recorrer los productos vendidos
    //    -> Crear objeto DetalleVenta y guardarlo
    //    -> Actualizar el Stock del Producto (Restar cantidad)
    //    -> Crear objeto MovimientoInventario (Auditoría: SALIDA)
    // 4. PDO::commit() o PDO::rollBack()
    // =========================================================================

    header("Location: ../views/ventas.php?mensaje=exito");
    exit();

} else {
    header("Location: ../views/dashboard.php");
    exit();
}
?>