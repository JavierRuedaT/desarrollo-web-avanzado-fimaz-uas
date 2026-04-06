<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Proyecto: WEB APP BASKET - DELETE
 */
require_once("../../controllers/torneosController.php");

$objTorneosController = new torneosController();

if (isset($_GET['id'])) {
    $objTorneosController->delete($_GET['id']);
    // AGREGADO: Redirección automática después de borrar
    header("Location: readAllTorneos.php");
    exit();
} else {
    header("Location: readAllTorneos.php");
    exit();
}
?>