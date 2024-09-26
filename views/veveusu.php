<?php
include("controllers/ceve.php");
title("festival", "Eventos", 0, "note_add", "opbtn", "Crear Pagina");

?>
<?php
if (array_key_exists("is_okey_save",$_SESSION) && $_SESSION['is_okey_save']) { ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>¡Te has registrado con éxito a este evento!</strong> No olvides alistarte para este viaje
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }
?>

<div class="events-container">
    <?php
    
    for ($i = 0; $i <= $totEventos; $i++) {
    ?>
        <div class="events-item">
            <?php
            if ($dtEventos) {
                foreach ($dtEventos as $dtE) { ?>
                    <h4><?= $dtE['nomeve']; ?></h4>
                    <p><?= $dtE['deseve']; ?></p>
                    <span><b>Fecha: </b><?= $dtE['feceve']; ?></span>
                    <div class="events-btn-container">
                        <form action="controllers/cusuxeve.php" method="POST">
                            <input type="hidden" name="ideve" value="<?= $dtE['ideve']; ?>">
                            <input type="hidden" name="ope" value="save">
                            <button onclick="" style="background-color: green; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px;">Inscríbete aquí</button>
                        </form>
                    </div>
            <?php }
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>

<div class="table-responsive py-3">
    <div class="container-fluid">
        <table class="table table-hover" id="tables" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($dtEventosxusuario) {
                    foreach ($dtEventosxusuario as $dtEvents) { ?>
                        <tr>
                            <th><?= $dtEvents['ideve']; ?></th>
                            <td><?= $dtEvents['nomeve']; ?></td>
                            <td><?= $dtEvents['deseve']; ?></td>
                            <td><?= $dtEvents['feceve']; ?></td>
                            <td><?= $dtEvents['nomusu']; ?></td>
                        </tr>
                <?php }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>