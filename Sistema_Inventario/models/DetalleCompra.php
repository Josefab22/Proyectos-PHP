<?php
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
?>