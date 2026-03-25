<?php include 'header.php'; ?>

<section class="form-section">
    <h2>Registrar Nueva Venta</h2>
    
    <form action="../controllers/ControladorVenta.php" method="POST">
        <label for="fecha">Fecha de la Venta:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="total">Total de la Venta:</label>
        <input type="number" step="0.01" id="total" name="total" required>

        <label for="estado">Estado de la Venta:</label>
        <select id="estado" name="estado" required>
            <option value="Completada">Completada</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Anulada">Anulada</option>
        </select>

        <button type="submit">Registrar Venta</button>
    </form>
</section>

<section class="table-section" style="margin-top: 30px;">
    <h2>Historial de Ventas</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4">No hay ventas registradas aún.</td>
            </tr>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>