<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Semestre: Sexto semestre
 * Carrera: Ingeniería en Sistemas de Información
 * Materia: Desarrollo Web Avanzado
 * Maestro: Dr. José Alfonso Aguilar Calderón
 * Proyecto: WEB APP BASKET
 */

class torneosModel {

    private $PDO;

    public function __construct() {
        try {
            $this->PDO = new PDO("mysql:host=localhost;dbname=proyecto;charset=utf8", "root", "");
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }

    // Insertar un nuevo torneo
    public function insert(
        $nombreTorneo, $organizador, $patrocinadores, $sede,
        $categoria, $premio1, $premio2, $premio3,
        $otroPremio, $usuario, $contrasena
    ) {
        $contrasena = $this->passwordEncrypt($contrasena);

        $sql = "INSERT INTO torneos 
                (nombreTorneo, organizador, patrocinadores, sede, categoria, 
                 premio1, premio2, premio3, otroPremio, usuario, contrasena) 
                VALUES 
                (:nombreTorneo, :organizador, :patrocinadores, :sede, :categoria, 
                 :premio1, :premio2, :premio3, :otroPremio, :usuario, :contrasena)";

        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombreTorneo', $nombreTorneo);
        $statement->bindParam(':organizador', $organizador);
        $statement->bindParam(':patrocinadores', $patrocinadores);
        $statement->bindParam(':sede', $sede);
        $statement->bindParam(':categoria', $categoria);
        $statement->bindParam(':premio1', $premio1);
        $statement->bindParam(':premio2', $premio2);
        $statement->bindParam(':premio3', $premio3);
        $statement->bindParam(':otroPremio', $otroPremio);
        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':contrasena', $contrasena);

        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }

    // Encriptar contraseña
    public function passwordEncrypt($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // Verificar contraseña
    public function passwordDencrypted($passwordEncrypted, $passwordCandidate) {
        return password_verify($passwordCandidate, $passwordEncrypted);
    }

    // Leer todos los torneos
    public function read() {
        $statement = $this->PDO->prepare("SELECT * FROM torneos");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    // Leer un torneo por ID
    public function readOne($id) {
        $statement = $this->PDO->prepare("SELECT * FROM torneos WHERE id = :id LIMIT 1");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    // Actualizar un torneo
    public function update(
        $id, $nombreTorneo, $organizador, $patrocinadores, $sede,
        $categoria, $premio1, $premio2, $premio3, $otroPremio
    ) {
        $sql = "UPDATE torneos SET 
                    nombreTorneo = :nombreTorneo,
                    organizador = :organizador,
                    patrocinadores = :patrocinadores,
                    sede = :sede,
                    categoria = :categoria,
                    premio1 = :premio1,
                    premio2 = :premio2,
                    premio3 = :premio3,
                    otroPremio = :otroPremio
                WHERE id = :id";

        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombreTorneo', $nombreTorneo);
        $stmt->bindParam(':organizador', $organizador);
        $stmt->bindParam(':patrocinadores', $patrocinadores);
        $stmt->bindParam(':sede', $sede);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':premio1', $premio1);
        $stmt->bindParam(':premio2', $premio2);
        $stmt->bindParam(':premio3', $premio3);
        $stmt->bindParam(':otroPremio', $otroPremio);

        return $stmt->execute();
    }

    //Método para eliminar un torneo
    public function delete($id) {
        $statement = $this->PDO->prepare("DELETE FROM torneos WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        return ($statement->execute()) ? true : false;
    }
}
?>