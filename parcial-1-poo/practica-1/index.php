<?php
// Incluimos la definición de la clase
require_once 'Usuario.php';

// Creamos la instancia (Paso 3.2 de las instrucciones)
// $objUsuario es de tipo Object.
$objUsuario = new Usuario("Javier Rueda", "javierrueda@uas.edu.mx");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 1 - FIMAZ</title>
</head>
<body>
    <h1>Información del Usuario</h1>
    <p>
        <strong>Nombre:</strong> <?php echo $objUsuario->getNombre(); ?> <br>
        <strong>Correo:</strong> <?php echo $objUsuario->getCorreo(); ?>
    </p>
</body>
</html>