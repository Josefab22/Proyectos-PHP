<?php include 'header.php'; ?>

<section class="form-section">
    <h2>Registrar Nuevo Proveedor</h2>
    
    <form action="../controllers/ControladorProveedor.php" method="POST">
        <label for="nombre">Nombre / Razón Social:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="rif">RIF:</label>
        <input type="text" id="rif" name="rif" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>

        <button type="submit">Guardar Proveedor</button>
    </form>
</section>

<section class="table-section" style="margin-top: 30px;">
    <h2>Listado de Proveedores</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RIF</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // 1. Requerimos la conexión y el modelo
                require_once '../config/Conexion.php';
                require_once '../models/Proveedor.php';

                // 2. Nos conectamos a la BD
                $baseDeDatos = new Conexion();
                $conn = $baseDeDatos->obtenerConexion();

                // 3. Ejecutamos la consulta estática
                $listaProveedores = Proveedor::leerTodos($conn);

                // 4. Recorremos los datos y armamos las filas HTML
                if ($listaProveedores) {
                    foreach ($listaProveedores as $prov) {
                        echo "<tr>";
                        echo "<td>" . $prov->nombre . "</td>";
                        echo "<td>" . $prov->rif . "</td>";
                        echo "<td>" . $prov->telefono . "</td>";
                        echo "<td>" . $prov->direccion . "</td>";
                            
                        // Detalle visual para el estado
                        $colorEstado = ($prov->estado == 'Activo') ? 'green' : 'red';
                        echo "<td style='color: {$colorEstado}; font-weight: bold;'>" . $prov->estado . "</td>";
                            
                        echo "<td>
                                <button type='button' style='background: #f0ad4e; border: none; padding: 5px; cursor: pointer;'>Editar</button>
                                <button type='button' style='background: #d9534f; color: white; border: none; padding: 5px; cursor: pointer;'>Eliminar</button>
                            </td>";
                        echo "</tr>";
                        }
                } else {
                        echo "<tr><td colspan='6' style='text-align: center;'>No hay proveedores registrados aún.</td></tr>";
                }
            ?>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>