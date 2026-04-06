<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Semestre: Sexto semestre
 * Carrera: Ingeniería en Sistemas de Información
 * Materia: Desarrollo Web Avanzado
 * Maestro: Dr. José Alfonso Aguilar Calderón
 * Proyecto: WEB APP BASKET
 */

//Crear una clase para conexión a base de datos mediante PDO.

class DataBase{
    //Atributos de la clase DataBase con valores por defecto de XAMPP
    private $host = "localhost";
    private $db = "proyecto";
    private $user = "root";     // Valores por defecto en XAMPP
    private $password = "";     // XAMPP no tiene contraseña

    public function __construct()
    {
        //Constructor...
    }

    //Método para conexión a la base de datos.
    public function connect(){
        try {
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->password);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
?>