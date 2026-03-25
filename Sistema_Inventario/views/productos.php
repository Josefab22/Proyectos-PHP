<?php 
// Traemos toda la parte de arriba (head, navbar, apertura del main)
include 'header.php'; 
?>

<section class="form-section">
    <h2>Registrar Nuevo Producto</h2>
    
    <form action="../controllers/ControladorProducto.php" method="POST">
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

<section class="table-section" style="margin-top: 30px;">
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
            <?php
            // 1. Requerimos la conexión y el modelo
            require_once '../config/Conexion.php';
            require_once '../models/Producto.php';

            // 2. Nos conectamos a la BD
            $baseDeDatos = new Conexion();
            $conn = $baseDeDatos->obtenerConexion();

            // 3. Llamamos a nuestra nueva función estática
            $listaProductos = Producto::leerTodos($conn);

                    // 4. Verificamos si hay productos y los mostramos con un ciclo
                    if ($listaProductos) {
                        foreach ($listaProductos as $prod) {
                            echo "<tr>";
                            echo "<td>" . $prod->codigo . "</td>";
                            echo "<td>" . $prod->nombre . "</td>";
                            echo "<td>$" . number_format($prod->precio_compra, 2) . "</td>";
                            echo "<td>$" . number_format($prod->precio_venta, 2) . "</td>";
                            echo "<td>" . $prod->stock . "</td>";
                            
                            // Un detallito visual para que el estado se vea fino
                            $colorEstado = ($prod->estado == 'Activo') ? 'green' : 'red';
                            echo "<td style='color: {$colorEstado}; font-weight: bold;'>" . $prod->estado . "</td>";
                            
                            echo "<td>
                                    <button type='button' style='background: #f0ad4e; border: none; padding: 5px; cursor: pointer;'>Editar</button>
                                    <button type='button' style='background: #d9534f; color: white; border: none; padding: 5px; cursor: pointer;'>Eliminar</button>
                                </td>";
                            echo "</tr>";
                        }
                } else {
                // Si la tabla está vacía, mostramos este mensaje
                echo "<tr><td colspan='7' style='text-align: center;'>No hay productos registrados aún.</td></tr>";
                }
            ?>
        </tbody>
    </table>
</section>

<?php 
// Traemos toda la parte de abajo (cierre del main, footer, cierre del html)
include 'footer.php'; 
?>