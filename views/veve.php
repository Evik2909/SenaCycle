<?php
include("controllers/ceve.php");
title("event", "Eventos", 1, "edit_calendar", "opbtn", "Crear Evento");
?>
<div class="insert-form <?php if ($ope == "edi") echo "open-form"; ?>" id="vform">
    <form action="home.php?pg=<?= $m['idpag']; ?>" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nomeve">Nombre</label>
                <input type="text" class=" form-control" placeholder="Escribe el nombre para el evento" name="nomeve" id="nomeve" value="<?php if($dtOne && $dtOne[0]['ideve']) echo $dtOne[0]['nomeve']; ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="feceve">Fecha del evento</label>
                <input type="datetime-local" class=" form-control" placeholder="Escribe el nombre para el evento" name="feceve" id="feceve" value="<?php if ($dtOne && $dtOne[0]['ideve']) echo $dtOne[0]['feceve']; ?>" required>
            </div>
            <div class="form-group col-md-12">
                <label for="deseve">Descripcion</label>
                <textarea class=" form-control" placeholder="Realiza una breve descripcion del evento" name="deseve" id="deseve" required><?php if ($dtOne && $dtOne[0]['ideve']) echo $dtOne[0]['deseve']; ?></textarea>
            </div>
            <div class="form-group col-md-4">
                <br>
                <input type="hidden" name="ideve" value="<?php if ($dtOne) echo $dtOne[0]['ideve']; ?>">
                <input type="hidden" name="ope" value="save">
                <input type="submit" class="btn btn-color" value="Crear">
                <a href="home.php?pg=<?= $m['idpag']; ?>" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<div class="events-container">
    <?php
    if ($dtEve) {
        foreach($dtEve as $dt){
    ?>
        <div class="events-item">
            <h4><?= $dt['nomeve']?></h4>
            <p><?= $dt['deseve']?></p>
            <span><b>Fecha:</b> <?= $dt['feceve']?></span>
            <div class=" events-btn-container">
            <a href="home.php?pg=<?= $m['idpag'];?>&ope=edi&ideve=<?= $dt['ideve']?>">
                <span class="material-symbols-outlined">edit</span>
            </a>
            <a href="home.php?pg=<?= $m['idpag'];?>&ope=del&ideve=<?= $dt['ideve']?>">
                <span class="material-symbols-outlined">delete</span>
            </a>
            </div>
        </div>
    <?php
    }}
    ?>
</div>