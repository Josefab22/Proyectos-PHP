<?php
/**
 * Clase Estudiante
 * Arquitectura separada: Lógica pura (Modelo) sin mezclar con HTML (Vista).
 */
class Estudiante {
    private string $nombre;
    private string $materia;
    private array $calificaciones;

    public function __construct(string $nombre, string $materia, array $calificaciones) {
        $this->nombre = $nombre;
        $this->materia = $materia;
        $this->calificaciones = $calificaciones;
    }

    // ==========================================
    // MÉTODOS GETTERS (Acceso controlado a datos)
    // ==========================================
    
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getMateria(): string {
        return $this->materia;
    }

    public function getCalificaciones(): array {
        return $this->calificaciones;
    }

    public function getPromedio(): float {
        if (count($this->calificaciones) === 0) {
            return 0.0;
        }
        $suma = array_sum($this->calificaciones);
        return $suma / count($this->calificaciones);
    }

    // Método lógico para determinar si aprueba (Retorna un booleano, no HTML)
    public function estaAprobado(): bool {
        return $this->getPromedio() >= 10;
    }
}

// ==========================================
// INSTANCIACIÓN (El Controlador)
// ==========================================
$notasSemestre = [15, 12, 18, 9];
$alumno = new Estudiante("José Pérez", "Programación II", $notasSemestre);

?>

<!-- ========================================== -->
<!-- LA VISTA (Capa de Presentación HTML)       -->
<!-- ========================================== -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación Programación II</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding: 40px; }
        .boletin { background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 25px 40px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; margin-top: 0; }
        ul { background-color: #f9f9f9; padding: 15px 15px 15px 35px; border-radius: 5px; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #ecf0f1; border-radius: 5px; font-size: 1.1em; font-weight: bold; text-align: center; }
        .aprobado { color: #27ae60; }
        .reprobado { color: #e74c3c; }
    </style>
</head>
<body>

    <div class='boletin'>
        <h2>Boletín de Calificaciones</h2>
        
        <!-- Extracción de datos usando los métodos Getters -->
        <p><strong>Estudiante:</strong> <?= $alumno->getNombre(); ?></p>
        <p><strong>Materia:</strong> <?= $alumno->getMateria(); ?></p>
        
        <h3>Notas del Semestre:</h3>
        <ul>
            <?php 
            // Uso de sintaxis alternativa (dos puntos ':' y 'endforeach;') ideal para Vistas
            foreach ($alumno->getCalificaciones() as $indice => $nota): 
                $numeroEvaluacion = $indice + 1;
            ?>
                <li>Evaluación <?= $numeroEvaluacion ?>: <strong><?= $nota ?> pts</strong></li>
            <?php endforeach; ?>
        </ul>
        
        <?php 
            // Preparación de variables visuales basadas en la lógica del objeto
            $promedioFormateado = number_format($alumno->getPromedio(), 2);
            $claseCss = $alumno->estaAprobado() ? 'aprobado' : 'reprobado';
            $textoEstado = $alumno->estaAprobado() ? 'Aprobado' : 'Reprobado';
        ?>
        
        <div class='resultado'>
            Promedio Final: <?= $promedioFormateado ?> - 
            Estado: <span class='<?= $claseCss ?>'><?= $textoEstado ?></span>
        </div>
    </div>

</body>
</html>