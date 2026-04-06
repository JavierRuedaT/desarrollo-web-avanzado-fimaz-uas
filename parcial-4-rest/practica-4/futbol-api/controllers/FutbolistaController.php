<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Maestro: Dr. José Alfonso Aguilar Calderón
 */
class FutbolistaController {
    private $futbolista;

    public function __construct($db) {
        include_once __DIR__ . '/../models/Futbolista.php';
        $this->futbolista = new Futbolista($db);
    }

    public function handleRequest($method, $id, $data) {
        switch($method) {
            case 'GET':
                if($id) {
                    $this->futbolista->id = $id;
                    if($this->futbolista->readOne()) {
                        return [
                            "id" => $this->futbolista->id,
                            "nombre" => $this->futbolista->nombre,
                            "posicion" => $this->futbolista->posicion,
                            "numero" => $this->futbolista->numero,
                            "edad" => $this->futbolista->edad,
                            "equipo" => $this->futbolista->equipo
                        ];
                    }
                    http_response_code(404);
                    return ["message" => "Jugador no encontrado"];
                }
                return $this->futbolista->read()->fetchAll(PDO::FETCH_ASSOC);

            case 'POST':
                if($data->edad < 0) {
                    http_response_code(400);
                    return ["message" => "Error: La edad no puede ser negativa"];
                }
                $this->assignData($data);
                if($this->futbolista->create()) {
                    http_response_code(201);
                    return ["message" => "Jugador creado"];
                }
                break;

            case 'PUT':
                $this->futbolista->id = $id;
                $this->assignData($data);
                if($this->futbolista->update()) {
                    return ["message" => "Datos actualizados"];
                }
                break;

            case 'DELETE':
                $this->futbolista->id = $id;
                if($this->futbolista->delete()) {
                    return ["message" => "Jugador eliminado"];
                }
                break;
        }
        return ["message" => "Operación no realizada"];
    }

    private function assignData($data) {
        $this->futbolista->nombre = $data->nombre;
        $this->futbolista->posicion = $data->posicion;
        $this->futbolista->numero = $data->numero;
        $this->futbolista->edad = $data->edad;
        $this->futbolista->equipo = $data->equipo;
    }
}