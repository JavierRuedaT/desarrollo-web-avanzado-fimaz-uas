<?php
require __DIR__ . '/vendor/autoload.php';

use Models\Producto;
use Controllers\ProductoController;

$controller = new ProductoController();

// CREATE
if (isset($_POST['guardar'])) {
    $producto = new Producto();
    $producto->setNombre($_POST['nombre']);
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setExistencia($_POST['existencia']);
    $producto->setPrecio($_POST['precio']);
    $controller->crear($producto);
    header("Location: index.php");
    exit;
}

// UPDATE
if (isset($_POST['actualizar'])) {
    $producto = new Producto();
    $producto->setId($_POST['id']);
    $producto->setNombre($_POST['nombre']);
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setExistencia($_POST['existencia']);
    $producto->setPrecio($_POST['precio']);
    $controller->actualizar($producto);
    header("Location: index.php");
    exit;
}

// DELETE
if (isset($_GET['eliminar'])) {
    $controller->eliminar($_GET['eliminar']);
    header("Location: index.php");
    exit;
}

// EDITAR
$productoEditar = null;
if (isset($_GET['editar'])) {
    $productoEditar = $controller->obtenerPorId($_GET['editar']);
}

// READ
$productos = $controller->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Productos con POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-4">CRUD de Productos con PHP, PDO y POO</h1>

    <!-- Formulario CREATE / UPDATE -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <?= $productoEditar ? "Editar producto" : "Agregar producto" ?>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $productoEditar['id'] ?? '' ?>">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                               value="<?= $productoEditar['nombre'] ?? '' ?>" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="descripcion" class="form-control" placeholder="Descripción"
                               value="<?= $productoEditar['descripcion'] ?? '' ?>" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="existencia" class="form-control" placeholder="Existencia"
                               value="<?= $productoEditar['existencia'] ?? '' ?>" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio"
                               value="<?= $productoEditar['precio'] ?? '' ?>" required>
                    </div>
                    <div class="col-md-2">
                        <?php if ($productoEditar): ?>
                            <button class="btn btn-warning w-100" name="actualizar">Actualizar</button>
                        <?php else: ?>
                            <button class="btn btn-success w-100" name="guardar">Guardar</button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabla READ + DELETE + EDIT -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">Lista de productos</div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Existencia</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($productos) > 0): ?>
                        <?php foreach($productos as $p): ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td><?= htmlspecialchars($p['nombre']) ?></td>
                            <td><?= htmlspecialchars($p['descripcion']) ?></td>
                            <td><?= $p['existencia'] ?></td>
                            <td>$<?= number_format($p['precio'], 2) ?></td>
                            <td>
                                <a href="?editar=<?= $p['id'] ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                                <a href="?eliminar=<?= $p['id'] ?>" class="btn btn-outline-danger btn-sm"
                                   onclick="return confirm('¿Eliminar producto?')">Borrar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center py-3">No hay registros aún.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>