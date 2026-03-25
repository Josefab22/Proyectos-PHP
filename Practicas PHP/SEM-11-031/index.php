<?php
class Examen {
    // Atributos privados por encapsulamiento
    private $materia;
    private $preguntas;

    // Constructor
    public function __construct(string $materia, array $preguntas) {
        $this->materia = $materia;
        $this->preguntas = $preguntas;
    }

    // Método público para generar la vista
    public function renderizarHTML(): string {
        $html = "<h2>Examen de {$this->materia}</h2>";
        $html .= "<ul>";
        
        foreach ($this->preguntas as $pregunta) {
            $html .= "<li>{$pregunta}</li>";
        }
        
        $html .= "</ul>";
        return $html;
    }
}

// Integración de los tres temas: Array, POO y paso de parámetros al constructor
$listaPreguntas = ["¿Qué es un array asociativo?", "¿Defina el encapsulamiento?"];
$miExamen = new Examen("PHP", $listaPreguntas);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluación</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { color: #2c3e50; }
    </style>
</head>
<body>
    <?php 
        // Salida generada por PHP y formateada con HTML/CSS
        echo $miExamen->renderizarHTML(); 
    ?>
</body>
</html>