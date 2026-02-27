<?php
class Usuario {
    // Atributos protegidos para que los hijos los usen
    protected string $nombre;
    protected string $correo;

    public function __construct(string $nombre, string $correo) {
        // Validación obligatoria del correo
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            // Si el correo está mal, lanzamos la excepción
            throw new Exception("Correo inválido: $correo");
        }
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // Getters requeridos
    public function getNombre(): string { return $this->nombre; }
    public function getCorreo(): string { return $this->correo; }
}
?>