<?php
require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';
require_once 'clases/Invitado.php';

$usuarios = [];
$mensajeError = "";

try {
    // Creamos los objetos válidos
    $usuarios[] = new Admin("Javier Rueda", "admin@uas.edu.mx");
    $usuarios[] = new Alumno("Juan Pérez", "juan@alumno.mx", "2024001");
    $usuarios[] = new Invitado("Maria Lopez", "maria@empresa.com", "Google");

    // Registro inválido para probar la excepción
    $usuarios[] = new Usuario("Invitado Error", "correo-malo"); 

} catch (Exception $e) {
    // Capturamos el error para mostrarlo en el HTML
    $mensajeError = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica 4 - Sistema POO</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .error-box { color: white; background-color: #d9534f; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Panel de Control de Usuarios</h1>

    <?php if ($mensajeError): ?>
        <div class="error-box">
            <strong>Error controlado:</strong> <?php echo $mensajeError; ?>
        </div>
    <?php endif; ?>

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
</body>
</html>