<?php
require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';
require_once 'clases/Invitado.php';

$usuarios = [];
$mensajeError = "";

try {
    // 1. Creamos los objetos válidos
    $usuarios[] = new Admin("Javier Rueda", "admin@uas.edu.mx");
    $usuarios[] = new Alumno("Juan Pérez", "juan@alumno.mx", "2024001");
    $usuarios[] = new Invitado("Maria Lopez", "maria@empresa.com", "Google");

    // 2. Registro inválido para comprobar la excepción
    $usuarios[] = new Alumno("Usuario Error", "correo-mal-escrito", "000"); 

} catch (Exception $e) {
    // Guardamos el mensaje para mostrarlo al final
    $mensajeError = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 4 - Sistema POO</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f8f9fa; }
        /* Solo las letras en rojo, sin cuadro */
        .texto-error { 
            color: #d9534f; 
            margin-top: 15px; 
            font-weight: bold; 
        }
    </style>
</head>
<body>

    <h1>Panel de Control de Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th><th>Correo</th><th>Rol</th><th>Matrícula</th><th>Empresa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?php echo $u->getNombre(); ?></td>
                    <td><?php echo $u->getCorreo(); ?></td>
                    <td><?php echo $u->getRol(); ?></td>
                    <td><?php echo (method_exists($u, 'getMatricula')) ? $u->getMatricula() : "—"; ?></td>
                    <td><?php echo (method_exists($u, 'getEmpresa')) ? $u->getEmpresa() : "—"; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($mensajeError): ?>
        <p class="texto-error">
            Excepción capturada: <?php echo $mensajeError; ?>
        </p>
    <?php endif; ?>

</body>
</html>