<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>CALCULADORA EN PHP</h1>
        <div class="container"><form method="post">
            Numero 1: <input type="number" name="num1" ><br>
            Numero 2: <input type="number" name="num2" ><br>
            Operacion: 
            <select name="operacion">
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicación</option>
                <option value="division">División</option>
            </select><br>
            <input type="submit" name="calcular" value="Calcular">
        </form></div>

    <?php
    if (isset($_POST['calcular'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operacion = $_POST['operacion'];
        $resultado = 0;

        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                break;
            case 'division':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    echo "Error: División por cero no permitida.";
                    exit();
                }
                break;
        }
        echo"<br>";
        echo "El resultado de la operación es: " . $resultado;
    }
    ?>
</body>
</html>