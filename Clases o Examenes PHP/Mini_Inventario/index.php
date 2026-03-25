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
}

class Proveedor {
    private $id;
    private $nombre;
    private $rif;
    private $telefono;
    private $direccion;
    private $estado;

    public function __construct ($id, $nombre, $rif, $telefono, $direccion, $estado) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->rif = $rif;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->estado = $estado;
    }
}

class Compra {
    private $id;
    private $proveedor_id;
    private $fecha;
    private $total;
    private $estado;

    public function __construct($id, $proveedor_id, $fecha, $total, $estado) {
        $this->id = $id;
        $this->proveedor_id = $proveedor_id;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->estado = $estado;
    }
}

class DetalleCompra {
    private $id;
    private $compra_id;
    private $producto_id;
    private $cantidad;
    private $precio_unitario;
    private $subtotal;

    public function __construct($id, $compra_id, $producto_id, $cantidad, $precio_unitario, $subtotal) {
        $this->id = $id;
        $this->compra_id = $compra_id;
        $this->producto_id = $producto_id;
        $this->cantidad = $cantidad;
        $this->precio_unitario = $precio_unitario;
        $this->subtotal = $subtotal;
    }
}

class Venta {
    private $id;
    private $fecha;
    private $total;
    private $estado;

    public function __construct($id, $fecha, $total, $estado) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->estado = $estado;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Sistema de Control de Inventario Empresarial</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Sistema de Control de Inventario Empresarial</h1>
        </header>
        
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="productos.php">Productos</a>
            <a href="proveedores.php">Proveedores</a>
            <a href="compras.php">Compras</a>
            <a href="ventas.php">Ventas</a>
        </nav>

        <main>
            <section class="form-section">
                <h2>Registrar Nuevo Producto</h2>
                
                <form action="controlador_producto.php" method="POST">
                    
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" name="codigo" required>

                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>

                    <label for="precio_compra">Precio de Compra:</label>
                    <input type="number" step="0.01" id="precio_compra" name="precio_compra" required>

                    <label for="precio_venta">Precio de Venta:</label>
                    <input type="number" step="0.01" id="precio_venta" name="precio_venta" required>

                    <label for="stock">Stock Inicial:</label>
                    <input type="number" id="stock" name="stock" required>

                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>

                    <button type="submit">Guardar Producto</button>
                </form>
            </section>

            <section class="table-section">
                <h2>Listado de Productos</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PROD-01</td>
                            <td>Monitor 24"</td>
                            <td>120.00</td>
                            <td>150.00</td>
                            <td>10</td>
                            <td>Activo</td>
                            <td>
                                <button type="button">Editar</button>
                                <button type="button">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>

        <footer>
            <p>&copy; 2026 Sistema de Control de Inventario Empresarial. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>
