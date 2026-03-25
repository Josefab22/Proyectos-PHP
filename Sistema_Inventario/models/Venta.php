<?php
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