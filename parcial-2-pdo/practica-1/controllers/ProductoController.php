<?php
namespace Controllers;

use Config\Database;
use Models\Producto;

class ProductoController {
    private $connection;

    public function __construct() {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    public function crear(Producto $producto) {
        $sql = "INSERT INTO productos(nombre,descripcion,existencia,precio) VALUES(:nombre,:descripcion,:existencia,:precio)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":nombre",$producto->getNombre());
        $stmt->bindValue(":descripcion",$producto->getDescripcion());
        $stmt->bindValue(":existencia",$producto->getExistencia());
        $stmt->bindValue(":precio",$producto->getPrecio());
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }

    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":id",$id);
        return $stmt->execute();
    }

    public function actualizar(Producto $producto) {
        $sql = "UPDATE productos SET nombre=:nombre, descripcion=:descripcion, existencia=:existencia, precio=:precio WHERE id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":id",$producto->getId());
        $stmt->bindValue(":nombre",$producto->getNombre());
        $stmt->bindValue(":descripcion",$producto->getDescripcion());
        $stmt->bindValue(":existencia",$producto->getExistencia());
        $stmt->bindValue(":precio",$producto->getPrecio());
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        return $stmt->fetch();
    }
}