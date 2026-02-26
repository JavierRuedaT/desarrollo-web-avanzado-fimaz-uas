<?php
require_once 'Usuario.php';
class Alumno extends Usuario {
    private string $matricula;

    public function __construct(string $nombre, string $correo, string $matricula) {
        parent::__construct($nombre, $correo);
        $this->matricula = $matricula;
    }

    public function getRol(): string { return "Alumno"; }
    public function getMatricula(): string { return $this->matricula; }
}
?>