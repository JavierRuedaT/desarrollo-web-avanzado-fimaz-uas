<?php
/**
 * Alumno: Javier Rueda Tostado
 * Proyecto: WEB APP BASKET - REGISTRO CLON MAESTRO
 */
require_once("../../controllers/torneosController.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombreTorneo'])) {
    $obj = new torneosController();
    $obj->insertar(
        $_POST['nombreTorneo'], 
        $_POST['organizador'], 
        $_POST['sede'], 
        $_POST['patrocinadores'], 
        $_POST['categoria'], 
        $_POST['premio1'], 
        $_POST['premio2'], 
        $_POST['premio3'], 
        $_POST['campeonCanastero'], 
        $_POST['usuario'], 
        $_POST['contrasena']
    );
}

require_once(__DIR__ . "/template/header.php"); 
?>

<div class="mx-auto" style="max-width: 900px; margin-top: 20px;">
    <div class="card shadow-sm mb-4">
        <div class="card-header py-2 bg-secondary text-white d-flex align-items-center">
            <i class="fa-solid fa-trophy me-3"></i>
            <h6 class="m-0 font-weight-bold text-uppercase">Capturar Información del Torneo</h6>
        </div>
        
        <div class="card-body bg-light">
            <form action="" method="POST" id="formTorneo">
                <div class="row g-2">
                    <!-- Nombre del Torneo -->
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">Nombre del Torneo</label>
                        <input type="text" class="form-control form-control-sm" name="nombreTorneo" required>
                    </div>

                    <!-- Organizador -->
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">Organizador</label>
                        <input type="text" class="form-control form-control-sm" name="organizador" required>
                    </div>

                    <!-- Sede -->
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">Sede</label>
                        <input type="text" class="form-control form-control-sm" name="sede" required>
                    </div>

                    <!-- Categoría (select) -->
                    <div class="col-md-4 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">Categoría</label>
                        <select class="form-select form-select-sm" name="categoria" required>
                            <option value="" selected disabled>Seleccione una categoría</option>
                            <option value="1ra. fuerza">1ra. fuerza</option>
                            <option value="2da. fuerza">2da. fuerza</option>
                            <option value="Veteranos">Veteranos</option>
                            <option value="Libre">Libre</option>
                            <option value="Juvenil">Juvenil</option>
                            <option value="Femenil">Femenil</option>
                            <option value="Empresarial">Empresarial</option>
                            <option value="Infantil">Infantil</option>
                            <option value="Minibasket">Minibasket</option>
                        </select>
                    </div>

                    <!-- Patrocinadores (textarea) -->
                    <div class="col-md-12 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">Patrocinadores</label>
                        <textarea class="form-control form-control-sm" name="patrocinadores" rows="3" placeholder="Ingrese los patrocinadores"></textarea>
                    </div>

                    <!-- Premios -->
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">1er Premio</label>
                        <input type="text" class="form-control form-control-sm" name="premio1">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">2do Premio</label>
                        <input type="text" class="form-control form-control-sm" name="premio2">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">3er Premio</label>
                        <input type="text" class="form-control form-control-sm" name="premio3">
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">Otro Premio (Campeón Canastero)</label>
                        <input type="text" class="form-control form-control-sm" name="campeonCanastero">
                    </div>

                    <!-- Usuario y Contraseña -->
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">Usuario Administrador</label>
                        <input type="text" class="form-control form-control-sm" name="usuario" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label small fw-bold text-dark text-uppercase">Contraseña</label>
                        <input type="password" class="form-control form-control-sm" name="contrasena" required>
                    </div>
                </div>

                <!-- Botones -->
                <div class="mt-4 border-top pt-3 text-start">
                    <button type="submit" class="btn btn-primary btn-sm px-4 text-uppercase fw-bold me-2">
                        Guardar
                    </button>
                    <a href="admin.php" class="btn btn-danger btn-sm px-4 text-uppercase fw-bold">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/template/footer.php"); ?>