<?php
/**
 * Alumno: Javier Rueda Tostado 
 * Proyecto: WEB APP BASKET
 */
require_once(__DIR__ . "/template/header.php"); 
?>

<div class="mx-auto p-5">
    <div class="card text-center shadow">
        <!-- Header MENÚ en gris claro -->
        <div class="card-header fw-bold text-dark" style="background-color:#e9ecef;">
            MENÚ
        </div>

        <div class="card-body bg-light">
            <div class="container">
                
                <!-- Primera fila -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-2">
                            <!-- Texto negro -->
                            <div class="card-header fw-bold text-dark">CREAR TORNEO</div>
                            <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 220px;">
                                <a href="frmTorneos.php" class="btn btn-light">
                                    <img src="../../img/torneo-admin.png" alt="Crear Torneo" width="160" height="160">
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-2">
                            <div class="card-header fw-bold text-secondary">LISTA DE TORNEOS</div>
                            <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 220px;">
                                <a href="readAllTorneos.php" class="btn btn-light">
                                    <img src="../../img/lista-torneos-admin.png" alt="Listar Torneos" width="160" height="160">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100 shadow-sm border-2">
                            <div class="card-header fw-bold text-secondary text-uppercase">Estadísticas</div>
                            <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 70px;">
                                <alt="Estadísticas" width="50" height="50">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="card h-100 shadow-sm border-2">
                            <div class="card-header fw-bold text-secondary text-uppercase">Anuncios</div>
                            <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 70px;">
                                <alt="Anuncios" width="80" height="80">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-dark fw-bold bg-white">
            Configuración de torneos. Web App Basket-Ball.
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/template/footer.php"); ?>