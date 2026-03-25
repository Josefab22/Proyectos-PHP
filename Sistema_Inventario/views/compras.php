<?php include 'header.php'; ?>

<section class="form-section">
    <h2>Registrar Nueva Compra</h2>
    
    <form action="../controllers/ControladorCompra.php" method="POST">
        <label for="proveedor_id">Proveedor:</label>
        <select id="proveedor_id" name="proveedor_id" required>
            <option value="">Seleccione un proveedor...</option>
            <option value="1">Distribuidora Lara C.A.</option>
        </select>

        <label for="fecha">Fecha de la Compra:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="total">Total de la Factura:</label>
        <input type="number" step="0.01" id="total" name="total" required>

        <label for="estado">Estado de la Compra:</label>
        <select id="estado" name="estado" required>
            <option value="Completada">Completada</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Cancelada">Cancelada</option>
        </select>

        <button type="submit">Registrar Compra</button>
    </form>
</section>

<section class="table-section" style="margin-top: 30px;">
    <h2>Historial de Compras</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5">No hay compras registradas aún.</td>
            </tr>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>