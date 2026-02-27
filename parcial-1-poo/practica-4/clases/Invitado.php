<?php
require_once 'Usuario.php';

class Invitado extends Usuario {
    private string $empresa;

    public function __construct(string $nombre, string $correo, string $empresa) {
        parent::__construct($nombre, $correo);
        $this->empresa = $empresa;
    }

    public function getEmpresa(): string { return $this->empresa; }
    
    public function getRol(): string { return "Invitado"; }
}
?>