<?php 

class producto{
    protected $id;
    protected $codigo;
    protected $nombre;
    protected $precio_compra;
    protected $precio_venta;
    protected $stock;
    protected $estado;


public function __construct($id, $codigo, $nombre, $precio_compra, $precio_venta, $stock, $estado) {
    $this->id = $id;
    $this->codigo = $codigo;
    $this->nombre = $nombre;
    $this->precio_compra = $precio_compra;
    $this->precio_venta = $precio_venta;
    $this->stock = $stock;
    $this->estado = $estado;}
    //reporte de stock critico
    //movimientos de inventario
}

class provedor{
    protected $id;
    protected $nombre;
    protected $rif;
    protected $telefono;
    protected $direccion;
    protected $estado;

    public function __construct($id, $nombre, $rif, $telefono, $direccion, $estado) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->rif = $rif;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->estado = $estado;}
}

class compra{
    protected $id;  
    protected $proveedor_id;
    protected $fecha;
    protected $total;
    protected $estado;

    public function __construct($id, $proveedor_id, $fecha, $total, $estado) {
        $this->id = $id;
        $this->proveedor_id = $proveedor_id;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->estado = $estado;}
}

class detalles_compra{
    protected $id;
    protected $compra_id;
    protected $producto_id;
    protected $cantidad;
    protected $precio_unitario;
    protected $subtotal;

    public function __construct($id, $compra_id, $producto_id, $cantidad, $precio_unitario, $subtotal) {
        $this->id = $id;
        $this->compra_id = $compra_id;
        $this->producto_id = $producto_id;
        $this->cantidad = $cantidad;
        $this->precio_unitario = $precio_unitario;
        $this->subtotal = $subtotal;}
}

class venta{
    protected $id;
    protected $fecha;
    protected $total;
    protected $estado;

    public function __construct($id, $fecha, $total, $estado) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->estado = $estado;}
} //metodo ventas mensuales

class Movimiento_Inventario extends Producto{
    protected $id;
    protected $codigo;
    protected $nombre;
    protected $precio_compra;
    protected $precio_venta;
    protected $stock;
    protected $estado;

    public function __construct($id, $codigo, $nombre, $precio_compra, $precio_venta, $stock, $estado) {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->stock = $stock;
        $this->estado = $estado;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Gestión de Inventario</h1>
        </header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="provedores.php">Proveedores</a>
            <a href="compras.php">Compras</a>
            <a href="ventas.php">Ventas</a>
        </nav>
        <main>
            <h2>Bienvenido al Sistema de Gestión de Inventario</h2>
            <p>Utilice el menú de navegación para gestionar productos, proveedores, compras y ventas.</p>
        </main>
    </div>
    <footer>
        <p>&copy; 2026 Gestión de Inventario. Todos los derechos reservados.</p>
    </footer>
</body>
</html>