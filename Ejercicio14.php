<?php

class Alumno {
    public $nombre;
    public $dni;
    public $nota1;
    public $nota2;

    public function __construct($nombre, $dni, $nota1, $nota2) {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
    }

    public function calcularNotaMedia() {
        return ($this->nota1 + $this->nota2) / 2;
    }
}

class Curso {
    public $alumnos = [];

    public function agregarAlumno(Alumno $alumno) {
        $this->alumnos[] = $alumno;
    }

    public function calcularNotaMediaCurso() {
        $totalNotas = 0;
        foreach ($this->alumnos as $alumno) {
            $totalNotas += $alumno->calcularNotaMedia();
        }

        return $totalNotas / count($this->alumnos);
    }
}
// Crear alumnos
$alumno1 = new Alumno("Juan", "12345678", 8.5, 7.5);
$alumno2 = new Alumno("Maria", "98765432", 9.0, 8.0);

// Crear un curso y agregar alumnos
$curso = new Curso();
$curso->agregarAlumno($alumno1);
$curso->agregarAlumno($alumno2);

// Calcular la nota media del curso
$notaMediaCurso = $curso->calcularNotaMediaCurso();

echo "Nota media del curso: $notaMediaCurso";

?>
