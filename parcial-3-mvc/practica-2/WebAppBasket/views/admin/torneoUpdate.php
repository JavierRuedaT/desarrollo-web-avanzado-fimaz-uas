<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Proyecto: WEB APP BASKET
 */

require_once("../../controllers/torneosController.php");

// Capturar datos del formulario
$id              = $_POST['txtId'];
$nombreTorneo    = $_POST['txtNombreTorneo'];
$organizador     = $_POST['txtOrganizador'];
$patrocinadores  = $_POST['txtPatrocinador'];
$sede            = $_POST['txtSede'];
$categoria       = $_POST['txtCategoria'];
$premio1         = $_POST['txtPremio1'];
$premio2         = $_POST['txtPremio2'];
$premio3         = $_POST['txtPremio3'];
$otroPremio      = $_POST['txtOtroPremio'];

// Instanciar controlador
$obj = new torneosController();

// Llamar al método update
$obj->updateTorneo(
    $id,
    $nombreTorneo,
    $organizador,
    $patrocinadores,
    $sede,
    $categoria,
    $premio1,
    $premio2,
    $premio3,
    $otroPremio
);