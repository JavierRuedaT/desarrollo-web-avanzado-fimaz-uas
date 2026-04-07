<?php
/**
 * Alumno: Javier Rueda Tostado 
 */
include_once 'models/Futbolista.php';

class FutbolistaController {
    private $db;
    private $futbolista;

    public function __construct($db) {
        $this->db = $db;
        $this->futbolista = new Futbolista($db);
    }

    public function handleRequest($method, $id, $data) {
        switch ($method) {
            case 'GET':
                return ($id) ? $this->getById($id) : $this->getAll();
            case 'POST':
                return $this->create($data);
            case 'PUT':
                return ($id) ? $this->update($id, $data) : ["message" => "ID requerido"];
            case 'DELETE':
                return ($id) ? $this->delete($id) : ["message" => "ID requerido"];
            default:
                return ["message" => "Metodo no permitido"];
        }
    }

    private function getAll() {
        $stmt = $this->futbolista->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getById($id) {
        $this->futbolista->id = $id;
        $row = $this->futbolista->readOne();
        return ($row) ? $row : ["message" => "Futbolista no encontrado"];
    }

    private function create($data) {
        if (!empty($data->nombre)) {
            $this->futbolista->nombre = $data->nombre;
            $this->futbolista->posicion = $data->posicion;
            $this->futbolista->numero = $data->numero;
            $this->futbolista->edad = $data->edad;
            $this->futbolista->equipo = $data->equipo;
            if ($this->futbolista->create()) {
                http_response_code(201);
                return ["message" => "Futbolista creado exitosamente."];
            }
        }
        return ["message" => "Datos incompletos."];
    }

    private function update($id, $data) {
        $this->futbolista->id = $id;
        $this->futbolista->nombre = $data->nombre;
        $this->futbolista->posicion = $data->posicion;
        $this->futbolista->numero = $data->numero;
        $this->futbolista->edad = $data->edad;
        $this->futbolista->equipo = $data->equipo;
        if ($this->futbolista->update()) {
            return ["message" => "Futbolista actualizado."];
        }
        return ["message" => "Error al actualizar."];
    }

    private function delete($id) {
        $this->futbolista->id = $id;
        if ($this->futbolista->delete()) {
            return ["message" => "Futbolista eliminado."];
        }
        return ["message" => "Error al eliminar."];
    }
}