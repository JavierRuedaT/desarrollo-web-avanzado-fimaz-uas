<?php
/**
 * Clase Usuario siguiendo la estructura que se nos pide
 */
class Usuario 
{
    // 1. Atributos: Debe ser privado para cumplir encapsulamiento
    private $nombre;
    private $correo;

    // 2. Constructor de la clase
    function __construct($nombre, $correo) 
    {
        #constructor de la clase.
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // 3. Métodos Getters (para obtener valores privados)
    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    // 4. Métodos Setters (para modificar valores)
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }
}
?>