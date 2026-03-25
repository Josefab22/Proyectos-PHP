<?php include 'header.php'; ?>

<main>
    <section class="table-section">
        <h2>Auditoría de Movimientos de Inventario</h2>
        <p>Historial automático de entradas y salidas del sistema.</p>
        
        <table style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Fecha y Hora</th>
                    <th>Producto</th>
                    <th>Tipo de Movimiento</th>
                    <th>Cantidad</th>
                    <th>Usuario Responsable</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2026-03-23 10:30 AM</td>
                    <td>Monitor 24" (PROD-01)</td>
                    <td style="color: green; font-weight: bold;">ENTRADA (Compra)</td>
                    <td>+10</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td>2026-03-23 11:15 AM</td>
                    <td>Teclado Mecánico (PROD-02)</td>
                    <td style="color: red; font-weight: bold;">SALIDA (Venta)</td>
                    <td>-2</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center;">No hay más movimientos registrados.</td>
                </tr>
            </tbody>
        </table>
    </section>
</main>

<?php include 'footer.php'; ?>