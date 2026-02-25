<?php
// Importamos la clase Admin (que ya incluye a Usuario internamente)
require_once 'Admin.php';

// 1. Instanciar la clase Admin
$admin = new Admin("Javier Rueda", "javier@correo.com");


// Mostrar los resultados en pantalla
echo "<h3>Comprobación de Herencia con Constructor</h3>";
echo "Nombre: " . $admin->getNombre() . "<br>";
echo "Correo: " . $admin->getCorreo() . "<br>";
echo "Rol: " . $admin->getRol();
?>