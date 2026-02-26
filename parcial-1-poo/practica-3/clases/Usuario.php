<?php
class Usuario {
    protected string $nombre;
    protected string $correo;

    public function __construct(string $nombre, string $correo) {
        $this->nombre = $nombre;
        // Validación de correo
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Error: El correo '$correo' no tiene un formato válido.");
        }
        $this->correo = $correo;
    }

    public function getNombre(): string { return $this->nombre; }
    public function getCorreo(): string { return $this->correo; }
}
?>