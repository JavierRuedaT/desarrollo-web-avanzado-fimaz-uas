<?php
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
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, posicion=:posicion, numero=:numero, edad=:edad, equipo=:equipo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":posicion", $this->posicion);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":equipo", $this->equipo);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, posicion=:posicion, numero=:numero, edad=:edad, equipo=:equipo WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":posicion", $this->posicion);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":equipo", $this->equipo);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}