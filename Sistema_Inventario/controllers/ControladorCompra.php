<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Datos del Encabezado de la Compra
    $proveedor_id = intval($_POST['proveedor_id']);
    $fecha = htmlspecialchars($_POST['fecha']);
    $total = floatval($_POST['total']);
    $estado = htmlspecialchars($_POST['estado']);

    require_once '../models/Compra.php';
    require_once '../models/DetalleCompra.php';
    // Requerimos Producto y MovimientoInventario para la Auditoría y Stock
    require_once '../models/Producto.php'; 
    require_once '../models/MovimientoInventario.php';

    // 2. Instanciamos la Compra
    $nuevaCompra = new Compra(null, $proveedor_id, $fecha, $total, $estado);

    // =========================================================================
    // 🚧 ZONA DE TRANSACCIÓN OBLIGATORIA (BASE DE DATOS) 🚧
    // Aquí es donde el profesor evaluará el PDO::beginTransaction()
    // Lógica que implementaremos después:
    // 1. Guardar $nuevaCompra en la tabla 'compras'
    // 2. Obtener el ID de la compra recién guardada
    // 3. Recorrer los productos comprados (que vendrían de un array en el HTML)
    //    -> Crear objeto DetalleCompra y guardarlo
    //    -> Actualizar el Stock del Producto (Sumar cantidad)
    //    -> Crear objeto MovimientoInventario (Auditoría: ENTRADA)
    // 4. Si todo sale bien: PDO::commit()
    // 5. Si algo falla: PDO::rollBack()
    // =========================================================================

    header("Location: ../views/compras.php?mensaje=exito");
    exit();

} else {
    header("Location: ../views/dashboard.php");
    exit();
}
?>