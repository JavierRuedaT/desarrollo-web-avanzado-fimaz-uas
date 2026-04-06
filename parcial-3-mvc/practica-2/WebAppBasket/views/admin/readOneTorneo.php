<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Proyecto: WEB APP BASKET
 */

// Incluimos la cabecera y el controlador con rutas correctas
require_once("../admin/template/header.php");
require_once("../../controllers/torneosController.php");

// Instanciamos el controlador y obtenemos un torneo por ID
$ObjTorneosController = new torneosController();
$lstTorneo = $ObjTorneosController->readOneTorneos($_GET['id']);
?>

<div class="mx-auto">
  <div class="card">
    <div class="card-header bg-secondary text-white fw-bold">
      INFORMACIÓN DEL TORNEO
    </div>
    <div class="card-body bg-light">
      <form>
        
        <div class="row mb-3">
          <label for="nombreTorneo" class="form-label">NOMBRE DEL TORNEO:</label>
          <input type="text" class="form-control" id="nombreTorneo" 
                 value="<?= $lstTorneo['nombreTorneo'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="organizador" class="form-label">ORGANIZADOR (nombre completo)</label>
          <input type="text" class="form-control" id="organizador" 
                 value="<?= $lstTorneo['organizador'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="patrocinador" class="form-label">PATROCINADOR(ES)</label>
          <textarea id="patrocinador" class="form-control" rows="4" readonly><?= $lstTorneo['patrocinadores'] ?></textarea>
          <div class="form-text">
            Atención: se puede separar con “;” si hay más de un patrocinador.
          </div>
        </div>

        <div class="row mb-3">
          <label for="sede" class="form-label">SEDE (cancha)</label>
          <input type="text" class="form-control" id="sede" 
                 value="<?= $lstTorneo['sede'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="categoria" class="form-label">CATEGORÍA</label>
          <input type="text" class="form-control" id="categoria" 
                 value="<?= $lstTorneo['categoria'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="premio1" class="form-label">PREMIO 1ER. LUGAR</label>
          <input type="text" class="form-control" id="premio1" 
                 value="<?= $lstTorneo['premio1'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="premio2" class="form-label">PREMIO 2DO. LUGAR</label>
          <input type="text" class="form-control" id="premio2" 
                 value="<?= $lstTorneo['premio2'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="premio3" class="form-label">PREMIO 3ER. LUGAR</label>
          <input type="text" class="form-control" id="premio3" 
                 value="<?= $lstTorneo['premio3'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="otroPremio" class="form-label">OTRO PREMIO (CAMPEÓN CANASTERO)</label>
          <input type="text" class="form-control" id="otroPremio" 
                 value="<?= $lstTorneo['otroPremio'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="usuario" class="form-label">USUARIO</label>
          <input type="text" class="form-control" id="usuario" 
                 value="<?= $lstTorneo['usuario'] ?>" readonly>
        </div>

        <div class="row mb-3">
          <label for="contrasena" class="form-label">CONTRASEÑA</label>
          <input type="text" class="form-control" id="contrasena" 
                 value="<?= $lstTorneo['contrasena'] ?>" readonly>
        </div>

        <!-- Botón para regresar al listado -->
        <div class="col-12">
          <a href="readAllTorneos.php" class="btn btn-success">REGRESAR</a>
        </div>

      </form>
    </div>
    <div class="card-footer text-body-secondary">
      DETALLE DE TORNEO
    </div>
  </div>
</div>

<?php
require_once("../admin/template/footer.php");
?>