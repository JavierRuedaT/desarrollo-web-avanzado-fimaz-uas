<?php
// Configuracion
$host = "localhost";
$db = "escuela";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Conexion PDO
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Mensajes
$mensaje = "";
$detalle = "";

//  Formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $simularError = isset($_POST["simular_error"]);

    if ($nombre == "" || $apellido == "" || $correo == "") {
        $mensaje = "⚠️ Todos los campos son obligatorios.";
    } else {

        try {
            // Inicio  TRransaccion
            $pdo->beginTransaction();

            // INSERTAR ALUMNO
            $sqlAlumno = "INSERT INTO alumnos (nombre, apellido, correo)
                          VALUES (:nombre, :apellido, :correo)";
            $stmtAlumno = $pdo->prepare($sqlAlumno);
            $stmtAlumno->execute([
                "nombre" => $nombre,
                "apellido" => $apellido,
                "correo" => $correo
            ]);

            $idAlumno = $pdo->lastInsertId();

            // Simular Error
            if ($simularError) {
                throw new Exception("Simulación de error activada");
            }

            // Insertar log
            $sqlLog = "INSERT INTO logs_alumnos (idAlumno, accion)
                       VALUES (:idAlumno, :accion)";
            $stmtLog = $pdo->prepare($sqlLog);
            $stmtLog->execute([
                "idAlumno" => $idAlumno,
                "accion" => "ALTA_ALUMNO"
            ]);

            // Confirmacion
            $pdo->commit();

            $mensaje = "✅ Transacción confirmada (COMMIT). Alumno registrado con ID: $idAlumno";

        } catch (Exception $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }

            $mensaje = "❌ Ocurrió un error. Transacción revertida (ROLLBACK).";
            $detalle = $e->getMessage();
        }
    }
}

// Consultas
$alumnos = $pdo->query("SELECT * FROM alumnos ORDER BY idAlumno DESC")->fetchAll();
$logs = $pdo->query("SELECT * FROM logs_alumnos ORDER BY idLog DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Try/Catch y Transacciones</title>

<style>
body { font-family: Arial; margin:20px; }
.card { border:1px solid #ccc; padding:15px; margin-bottom:15px; }
input { margin:5px 0; padding:5px; width:100%; }
button { padding:8px; background:#007bff; color:white; border:none; }
table { width:100%; border-collapse: collapse; }
th, td { border:1px solid #ddd; padding:8px; }
.msg { padding:10px; background:#f5f5f5; }
.danger { color:red; }
</style>

</head>
<body>

<h2>Práctica: try/catch y transacciones</h2>

<div class="card">
<form method="POST">

<label>Nombre</label>
<input type="text" name="nombre">

<label>Apellido</label>
<input type="text" name="apellido">

<label>Correo</label>
<input type="email" name="correo">

<label>
<input type="checkbox" name="simular_error"> Simular error
</label>

<button type="submit">Registrar alumno</button>

</form>
</div>

<?php if ($mensaje): ?>
<div class="msg"><?= htmlspecialchars($mensaje) ?></div>
<?php if ($detalle): ?>
<div class="danger"><?= htmlspecialchars($detalle) ?></div>
<?php endif; ?>
<?php endif; ?>

<div class="card">
<h3>Tabla alumnos</h3>
<table>
<tr>
<th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th>
</tr>

<?php foreach ($alumnos as $a): ?>
<tr>
<td><?= $a["idAlumno"] ?></td>
<td><?= $a["nombre"] ?></td>
<td><?= $a["apellido"] ?></td>
<td><?= $a["correo"] ?></td>
</tr>
<?php endforeach; ?>

</table>
</div>

<div class="card">
<h3>Tabla logs</h3>
<table>
<tr>
<th>ID Log</th><th>ID Alumno</th><th>Acción</th><th>Fecha</th>
</tr>

<?php foreach ($logs as $l): ?>
<tr>
<td><?= $l["idLog"] ?></td>
<td><?= $l["idAlumno"] ?></td>
<td><?= $l["accion"] ?></td>
<td><?= $l["fecha"] ?></td>
</tr>
<?php endforeach; ?>

</table>
</div>

</body>
</html>
