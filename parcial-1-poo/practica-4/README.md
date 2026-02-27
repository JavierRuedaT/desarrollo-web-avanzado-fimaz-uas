# Práctica 4: Integración POO y Manejo de Excepciones

## Objetivo
Construir un mini-sistema en PHP que integra los conceptos fundamentales de la Programación Orientada a Objetos: Encapsulamiento, Herencia y Polimorfismo, añadiendo una capa de validación robusta mediante el manejo de excepciones y una interfaz de salida en HTML.

## Requisitos
* **Lenguaje**: PHP 8.0 
* **Servidor**: XAMPP (Apache corriendo).
* **Entorno**: Git + GitHub para el control de versiones.

## Ruta de ejecución
Para visualizar el proyecto en el navegador, utilizar la siguiente URL:
`http://localhost/desarrollo-web-avanzado-fimaz-uas/parcial-1-poo/practica-4/index.php`

## Características implementadas
* **Clase Base (Usuario)**: Implementa el constructor con validación de formato de correo electrónico.
* **Herencia**: Tres clases hijas (`Admin`, `Alumno`, `Invitado`) que extienden la funcionalidad de la clase base.
* **Excepciones**: Uso de bloques `try/catch` para capturar errores de datos inválidos sin interrumpir la ejecución del sistema.
* **Interfaz**: Salida dinámica de datos en una tabla HTML con estilos CSS.

##  Evidencia Esperada
El sistema muestra una tabla con los usuarios creados y un mensaje de error controlado (en color rojo) cuando se intenta registrar un correo con formato incorrecto.