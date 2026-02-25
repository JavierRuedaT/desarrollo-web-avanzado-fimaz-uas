<?php
// Requerimos la clase base
require_once 'Usuario.php';

// Paso 3. Crear la clase Admin que extiende de Usuario
class Admin extends Usuario {
    
    // Implementar el método getRol()
    public function getRol() {
        return "Administrador";
    }
}
?>