## Práctica 2: Herencia en Programación Orientada a Objetos

### 1. Explicación de la herencia aplicada
En esta práctica se aplicó el concepto de **herencia** para crear una especialización de la clase `Usuario`. La clase `Admin` hereda todas las propiedades y métodos de `Usuario` mediante la palabra reservada `extends`, permitiendo que un objeto de tipo administrador posea nombre y correo sin necesidad de volver a definirlos.

### 2. Diferencias entre Usuario y Admin
* **Clase Usuario**: Actúa como la Clase Base o Padre. Contiene los atributos generales (`nombre`, `correo`) y los métodos básicos de acceso (Getters/Setters).
* **Clase Admin**: Actúa como la Clase Hija o Subclase. Hereda la estructura de `Usuario` y añade una propiedad específica denominada `rol`, cuyo valor por defecto es "Administrador".

### 3. Evidencia de ejecución
* **Reutilización de código**: Se utiliza el constructor de la clase padre para inicializar los datos básicos.
* **Ejecución Correcta**: El sistema instancia un objeto `Admin`, asigna valores a través del constructor y muestra los datos (incluyendo el rol) en el navegador sin errores de ejecución.
