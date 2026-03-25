<?php
/**
 * Clase Estudiante
 * Demuestra el uso de POO, encapsulamiento, constructores y manejo de arreglos en PHP.
 */
class Estudiante {
    // 1. Atributos privados (Encapsulamiento)
    private string $nombre;
    private string $materia;
    private array $calificaciones;

    // 2. Método Constructor
    public function __construct(string $nombre, string $materia, array $calificaciones) {
        $this->nombre = $nombre;
        $this->materia = $materia;
        $this->calificaciones = $calificaciones;
    }

    // 3. Método para calcular un valor basado en el arreglo
    private function calcularPromedio(): float {
        // Validar que el arreglo no esté vacío para evitar división por cero
        if (count($this->calificaciones) === 0) {
            return 0.0;
        }

        $suma = array_sum($this->calificaciones);
        $cantidad = count($this->calificaciones);
        
        return $suma / $cantidad;
    }

    // 4. Método público para generar la vista HTML
    public function generarBoletinHTML(): string {
        $promedio = $this->calcularPromedio();
        
        // Estructura HTML combinada con los datos del objeto
        $html = "<div class='boletin'>";
        $html .= "<h2>Boletín de Calificaciones</h2>";
        $html .= "<p><strong>Estudiante:</strong> {$this->nombre}</p>";
        $html .= "<p><strong>Materia:</strong> {$this->materia}</p>";
        
        $html .= "<h3>Notas del Semestre:</h3>";
        $html .= "<ul>";
        
        // Iteración del arreglo para imprimir cada nota
        foreach ($this->calificaciones as $indice => $nota) {
            // Sumamos 1 al índice para que la vista diga "Evaluación 1" en lugar de "Evaluación 0"
            $numeroEvaluacion = $indice + 1;
            $html .= "<li>Evaluación {$numeroEvaluacion}: <strong>{$nota} pts</strong></li>";
        }
        
        $html .= "</ul>";
        
        // Formatear el promedio a 2 decimales
        $promedioFormateado = number_format($promedio, 2);
        
        // Lógica simple para determinar si aprobó (asumiendo base 20, aprueba con 10 o más)
        $estado = ($promedio >= 10) ? "<span class='aprobado'>Aprobado</span>" : "<span class='reprobado'>Reprobado</span>";
        
        $html .= "<div class='resultado'>Promedio Final: {$promedioFormateado} - Estado: {$estado}</div>";
        $html .= "</div>";

        return $html;
    }
}

// ==========================================
// EJECUCIÓN DEL SCRIPT (Instanciación)
// ==========================================

// Definición del arreglo de notas
$notasSemestre = [15, 12, 18, 9]; // Arreglo numérico

// Creación del objeto usando el constructor
$alumno = new Estudiante("José Pérez", "Programación II", $notasSemestre);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación Programación II</title>
    <style>
        /* CSS Básico para la formalidad de la presentación */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            padding: 40px;
        }
        /* Estilos para el boletín */
        .boletin {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 25px 40px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-top: 0;
        }
        /* Estilos para las listas y resultados */
        ul {
            background-color: #f9f9f9;
            padding: 15px 15px 15px 35px;
            border-radius: 5px;
        }
        /* Estilos para el resultado final */
        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: bold;
            text-align: center;
        }
        /* Colores para estado de aprobación */
        .aprobado { color: #27ae60; }
        .reprobado { color: #e74c3c; }
    </style>
</head>
<body>

    <!-- Renderizado del método que devuelve el HTML -->
    <?= $alumno->generarBoletinHTML(); ?>

</body>
</html>