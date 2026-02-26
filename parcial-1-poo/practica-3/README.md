# Práctica 3: Sistema de Usuarios con Validaciones y Excepciones

## 1. Descripción del sistema
Este sistema robustece la gestión de usuarios mediante la implementación de **Manejo de Excepciones** en PHP. El objetivo principal es validar la integridad de los datos (específicamente el formato del correo electrónico) antes de permitir la creación de objetos, simulando un entorno de desarrollo profesional donde la seguridad y la estabilidad son prioritarias.

## 2. Explicación del flujo de clases
El sistema sigue una estructura de herencia jerárquica:
* **Clase Usuario (Base)**: Define los atributos comunes (`nombre`, `correo`) y contiene la lógica de validación en el constructor. Si el correo es inválido, detiene la ejecución mediante una `Exception`.
* **Clase Admin (Hija)**: Hereda de Usuario y especializa el comportamiento mediante el método `getRol()`.
* **Clase Alumno (Hija)**: Hereda de Usuario, añade el atributo específico `matricula` y el método `getRol()`.

## 3. Evidencia del manejo de errores
Se implementó un bloque **try/catch** en el archivo `index.php` para gestionar posibles fallos:
* **Uso de Excepciones**: Se utiliza `throw new Exception` para alertar sobre formatos de correo incorrectos.
* **Resultado**: El sistema captura el error y muestra un mensaje controlado al usuario en lugar de un error fatal del servidor, garantizando que la aplicación siga funcionando.