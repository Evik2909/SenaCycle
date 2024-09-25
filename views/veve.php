<?php
include("controllers/cper.php");
title("event", "Eventos", 0, "edit_calendar", "opbtn", "Crear Evento");
?>
<div class="insert-form <?php if ($ope == "edi") echo "open-form"; ?>" id="vform">
    <form action="home.php?pg=<?= $m['idpag']; ?>" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nomeve">Nombre</label>
                <input type="text" class=" form-control" placeholder="Escribe el nombre para el evento" name="nomeve" id="nomeve" value="<?php if ($dtOne) echo $dtOne[0]['nomeve']; ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="feceve">Fecha del evento</label>
                <input type="datetime-local" class=" form-control" placeholder="Escribe el nombre para el evento" name="feceve" id="feceve" value="<?php if ($dtOne) echo $dtOne[0]['feceve']; ?>" required>
            </div>
            <div class="form-group col-md-12">
                <label for="deseve">Descripcion</label>
                <textarea class=" form-control" placeholder="Realiza una breve descripcion del evento" name="deseve" id="deseve" required><?php if ($dtOne) echo $dtOne[0]['deseve']; ?></textarea>
            </div>
            <div class="form-group col-md-4">
                <br>
                <input type="hidden" name="ope" value="guardar">
                <input type="submit" class="btn btn-color" value="Crear">
                <a href="home.php?pg=<?= $m['idpag']; ?>" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<div class="events-container">
    <?php
    for ($i = 0; $i <= 5; $i++) {
    ?>
        <div class="events-item">
            <h4>Ciclo Paseo a la Calera!</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed et esse dignissimos debitis, corrupti, sint maiores, quae provident neque blanditiis vel quaerat animi explicabo ab possimus maxime voluptatibus quidem minima?</p>
            <span><b>Fecha:</b> XX/XX/XXXX</span>
            <div class=" events-btn-container">
            <!-- <a href="">
                <span class="material-symbols-outlined">edit</span>
            </a>
            <a href="">
                <span class="material-symbols-outlined">delete</span>
            </a> -->
            </div>
        </div>
    <?php
    }
    ?>
</div>