<?php
require_once 'Usuario.php';

class Admin extends Usuario {
    public function getRol(): string {
        return "Administrador";
    }
}
?>