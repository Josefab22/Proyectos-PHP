<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Limpiamos los datos que vienen del formulario
    $codigo = htmlspecialchars($_POST['codigo']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $precio_compra = floatval($_POST['precio_compra']); 
    $precio_venta = floatval($_POST['precio_venta']);   
    $stock = intval($_POST['stock']);                   
    $estado = htmlspecialchars($_POST['estado']);

    // 2. Requerimos la conexión y la clase
    require_once '../config/Conexion.php';
    require_once '../models/Producto.php';

    // 3. Instanciamos la conexión a la base de datos
    $baseDeDatos = new Conexion();
    $conn = $baseDeDatos->obtenerConexion();

    // 4. Instanciamos nuestro objeto Producto
    $nuevoProducto = new Producto(null, $codigo, $nombre, $descripcion, $precio_compra, $precio_venta, $stock, $estado);

    // 5. ¡AQUÍ ESTÁ LA MAGIA! Llamamos al método guardar y verificamos si funcionó
    if ($nuevoProducto->guardarProducto($conn)) {
        // Si funcionó, lo mandamos a la vista con mensaje de éxito
        header("Location: ../views/productos.php?mensaje=exito");
    } else {
        // Si falló, lo mandamos con mensaje de error
        header("Location: ../views/productos.php?mensaje=error");
    }
    
    exit();

} else {
    header("Location: ../views/dashboard.php");
    exit();
}
?>