<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Materia: Desarrollo Web Avanzado
 */
class Futbolista {
    private $conn;
    private $table_name = "futbolistas";

    public $id;
    public $nombre;
    public $posicion;
    public $numero;
    public $edad;
    public $equipo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->nombre = $row['nombre'];
            $this->posicion = $row['posicion'];
            $this->numero = $row['numero'];
            $this->edad = $row['edad'];
            $this->equipo = $row['equipo'];
            return true;
        }
        return false;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, posicion=:posicion, numero=:numero, edad=:edad, equipo=:equipo";
        $stmt = $this->conn->prepare($query);
        $this->bindParams($stmt);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, posicion=:posicion, numero=:numero, edad=:edad, equipo=:equipo WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $this->bindParams($stmt);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }

    private function bindParams($stmt) {
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":posicion", $this->posicion);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":equipo", $this->equipo);
    }
}