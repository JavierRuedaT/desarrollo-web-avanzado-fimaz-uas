<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Proyecto: WEB APP BASKET
 */
require_once("../admin/template/header.php");
require_once("../../controllers/torneosController.php");

$obj = new torneosController();
$torneo = $obj->readOneTorneos($_GET['id']);
?>

<div class="card">
    <div class="card-header">EDITAR TORNEO</div>
    <div class="card-body">

        <form action="torneoUpdate.php" method="POST">

            <!-- ID -->
            <input type="hidden" name="txtId" value="<?= $torneo['id'] ?>">

            <div class="mb-3">
                <label>Nombre Torneo</label>
                <input type="text" name="txtNombreTorneo" class="form-control" value="<?= $torneo['nombreTorneo'] ?>">
            </div>

            <div class="mb-3">
                <label>Organizador</label>
                <input type="text" name="txtOrganizador" class="form-control" value="<?= $torneo['organizador'] ?>">
            </div>

            <div class="mb-3">
                <label>Patrocinadores</label>
                <textarea name="txtPatrocinador" class="form-control"><?= $torneo['patrocinadores'] ?></textarea>
            </div>

            <div class="mb-3">
                <label>Sede</label>
                <input type="text" name="txtSede" class="form-control" value="<?= $torneo['sede'] ?>">
            </div>

            <div class="mb-3">
                <label>Categoría</label>
                <input type="text" name="txtCategoria" class="form-control" value="<?= $torneo['categoria'] ?>">
            </div>

            <div class="mb-3">
                <label>Premio 1</label>
                <input type="text" name="txtPremio1" class="form-control" value="<?= $torneo['premio1'] ?>">
            </div>

            <div class="mb-3">
                <label>Premio 2</label>
                <input type="text" name="txtPremio2" class="form-control" value="<?= $torneo['premio2'] ?>">
            </div>

            <div class="mb-3">
                <label>Premio 3</label>
                <input type="text" name="txtPremio3" class="form-control" value="<?= $torneo['premio3'] ?>">
            </div>

            <div class="mb-3">
                <label>Otro Premio</label>
                <input type="text" name="txtOtroPremio" class="form-control" value="<?= $torneo['otroPremio'] ?>">
            </div>

            <button class="btn btn-primary">Actualizar</button>
            <a href="readAllTorneos.php" class="btn btn-danger">Cancelar</a>

        </form>

    </div>
</div>

<?php require_once("../admin/template/footer.php"); ?>