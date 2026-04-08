<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Proyecto: WEB APP BASKET - LISTADO FINAL
 */
require_once(__DIR__ . "/template/header.php"); 
require_once("../../controllers/torneosController.php");

$objTorneosController = new torneosController();
$rows = $objTorneosController->readTorneos();
?>

<div class="mx-auto p-5">
    <div class="card shadow-sm">
        <div class="card-header py-3 bg-light text-center">
            <h6 class="m-0 font-weight-bold text-dark text-uppercase">
                <i class="fa-solid fa-trophy"></i> LISTADO DE TORNEOS
            </h6>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered table-striped table-hover text-center align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="fw-bold">ID</th>
                        <th class="fw-bold">TORNEO</th>
                        <th class="fw-bold">ORGANIZADOR</th>
                        <th class="fw-bold">ACCIONES</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(!empty($rows)): ?>
                        <?php foreach($rows as $row): ?>
                            <tr>
                                <td class="fw-bold"><?= $row['id'] ?></td>
                                <td><?= $row['nombreTorneo'] ?></td>
                                <td><?= $row['organizador'] ?></td>
                                <td>
                                    <div class="d-inline-flex gap-1">
                                        <a href="readOneTorneo.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-list"></i>
                                        </a>
                                        <a href="updateTorneo.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal<?= $row['id'] ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">¿Desea eliminar el torneo?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        
                                        <div class="modal-body text-start">
                                            Esta acción no se puede deshacer...
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <a href="deleteTorneo.php?id=<?= $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="py-3">No hay registros disponibles.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <a href="admin.php" class="btn btn-primary fw-bold text-uppercase px-4">
            REGRESAR
        </a>
    </div>
</div>

<?php require_once(__DIR__ . "/template/footer.php"); ?>