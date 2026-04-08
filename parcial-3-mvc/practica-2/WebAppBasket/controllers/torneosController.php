<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Semestre: Sexto semestre
 * Carrera: Ingeniería en Sistemas de Información
 * Materia: Desarrollo Web Avanzado
 * Maestro: Dr. José Alfonso Aguilar Calderón
 * Proyecto: WEB APP BASKET
 */

// Incluimos el archivo del Modelo para poder usar sus métodos.
require_once(__DIR__ . "/../models/torneosModel.php");

class torneosController {

    // Variable privada que contendrá la instancia del modelo.
    private $model;

    // Constructor del controlador: instanciamos la clase torneosModel.
    public function __construct() {
        $this->model = new torneosModel();
    }

    // Método controlador que manda llamar la función insert del Modelo.
    public function saveTorneo(
        $nombreTorneo, $organizador, $patrocinadores, $sede,
        $categoria, $premio1, $premio2, $premio3,
        $otroPremio, $usuario, $contrasena
    ) {
        $id = $this->model->insert(
            $nombreTorneo, $organizador, $patrocinadores, $sede,
            $categoria, $premio1, $premio2, $premio3,
            $otroPremio, $usuario, $contrasena
        );

        return ($id != false) 
            ? header("Location: admin.php") 
            : header("Location: frmTorneos.php");
    }

    public function insertar(
        $nombreTorneo, $organizador, $sede, $patrocinadores,
        $categoria, $premio1, $premio2, $premio3,
        $campeonCanastero, $usuario, $contrasena
    ) {
        //  reordenamos parámetros para que coincidan con saveTorneo
        return $this->saveTorneo(
            $nombreTorneo, $organizador, $patrocinadores, $sede,
            $categoria, $premio1, $premio2, $premio3,
            $campeonCanastero, $usuario, $contrasena
        );
    }

    // Método que manda ejecutar la función read del modelo del Torneo.
    public function readTorneos() {
        return ($this->model->read()) 
            ? $this->model->read() 
            : false;
    }

    // Método para ejecutar la función readOne del modelo Torneo.
    public function readOneTorneos($id) {
        return ($this->model->readOne($id) != false) 
            ? $this->model->readOne($id) 
            : header("Location: admin.php");
    }

    // Método que manda llamar la función update del modelo.
    public function updateTorneo(
        $id, $nombreTorneo, $organizador, $patrocinadores, $sede,
        $categoria, $premio1, $premio2, $premio3, $otroPremio
    ) {
        return ($this->model->update(
            $id, $nombreTorneo, $organizador, $patrocinadores,
            $sede, $categoria, $premio1, $premio2, $premio3, $otroPremio
        ) !== false) 
            ? header("Location: readOneTorneo.php?id=" . $id) 
            : header("Location: readAll.php");
    }

    // Método que manda llamar a la función delete del modelo.
    public function delete($id) {
        return ($this->model->delete($id)) 
            ? header("Location: readAllTorneos.php") 
            : header("Location: readOneTorneo.php?id=" . $id);
    }
}
?>