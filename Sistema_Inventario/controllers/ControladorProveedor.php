<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Limpieza de datos recibidos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $rif = htmlspecialchars($_POST['rif']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $estado = htmlspecialchars($_POST['estado']);

    // 2. Requerimos conexión y modelo
    require_once '../config/Conexion.php';
    require_once '../models/Proveedor.php';

    // 3. Conectamos a la base de datos
    $baseDeDatos = new Conexion();
    $conn = $baseDeDatos->obtenerConexion();

    // 4. Instanciamos el objeto y llamamos al método guardar
    $nuevoProveedor = new Proveedor(null, $nombre, $rif, $telefono, $direccion, $estado);

    if ($nuevoProveedor->guardarProveedor($conn)) {
        header("Location: ../views/proveedores.php?mensaje=exito");
    } else {
        header("Location: ../views/proveedores.php?mensaje=error");
    }
    
    exit();

} else {
    header("Location: ../views/dashboard.php");
    exit();
}
?>