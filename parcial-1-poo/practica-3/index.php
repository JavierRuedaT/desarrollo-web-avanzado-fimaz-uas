<?php
require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';

echo "<h1>Práctica 3: Validaciones y Excepciones</h1>";

try {
    echo "<h3>Prueba 1: Usuario Válido</h3>";
    $admin = new Admin("Javier Rueda", "javier@correo.com");
    echo "Nombre: " . $admin->getNombre() . "<br>";
    echo "Rol: " . $admin->getRol() . "<hr>";

    echo "<h3>Prueba 2: Usuario Inválido (Esto lanzará excepción)</h3>";
    $alumno = new Alumno("Juan Pérez", "correo-invalido", "2024001");
    
} catch (Exception $e) {
    // Aquí capturamos el error y lo mostramos de forma controlada
    echo "<b style='color:red;'>Mensaje de error: </b>" . $e->getMessage();
}
?>