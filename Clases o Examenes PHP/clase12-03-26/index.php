<?php 
    //clase baja (abstraccion)
    class Empleado {
        //encapsulamiento
        protected $nombre;
        protected $salarioBase;

        //constructor
        public function __construct($nombre, $salarioBase){
            $this-> nombre = $nombre;
            $this-> salarioBase = $salarioBase;
        }
        //Metodo que sera sobreescrito (polimirfismo)
        public function calcularSalario(){
            return $this->salarioBase;
        }
        //metodo comun para mostrar resultados
        public function mostrarDatos(){
            echo "<h3>Resultados</h3>";
            echo "nombre: . {$this->nombre}";
            echo "salario total:" . $this->calcularSalario();
        }
    }
    //clase hija docente (herencia)
    class Docente extends Empleado {
        private $horasClase;

        public function __construct($nombre, $salarioBase, $horasClase){
            parent::__construct($nombre, $salarioBase);
            $this->horasClase = $horasClase;
        }
        //polimorfismo
        public function calcularSalario(){
            return ($this->salarioBase) + ($this->horasClase *10);
        }
    }
    //clase hija
    class Administrativo extends Empleado {
        private $bono;

        public function __construct($nombre, $salarioBase, $bono){
            parent::__construct($nombre, $salarioBase);
            $this->bono = $bono;
        }
    }
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado - POO en PHP</title>
</head>
<body>
    <h1>Registro de empleado</h1>

    <form method="post">
        <label>Nombre</label>
        <input type="text" name="nombre" required><br>

        <label>Salario Base</label>
        <input type="text" name="number" required><br>

        <label>Tipo de Empleado:</label>
        <select name="tipo" required>
        <option value="docente">Docente</option>
        <option value="administrativo">Administrativo</option>
        </select><br>

        <label>Horas(Docente) / Bono(Administrativo)</label><br>
        <input type="number" name="extra" required><br>
        <button type="submit">Calcular Salario</button>
    </form>
    <hr>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST['nombre'];
        $salarioBase = $_POST['salarioBase'];
        $tipo = $_POST['tipo'];
        $extra = $_POST['extra'];
    //instancia segun tipo de empleado
    if ($tipo == "docente"){
        $empleado = new Docente($nombre, $salarioBase, $extra);
    }elseif($tipo == "administrativo") {
        $empleado = new Administrativo($nombre, $salarioBase, $extra);
        }
            $empleado->mostrarDatos();
    }

    ?>    

</body>
</html>