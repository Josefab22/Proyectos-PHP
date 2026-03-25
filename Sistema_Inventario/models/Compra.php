<?php
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
?>