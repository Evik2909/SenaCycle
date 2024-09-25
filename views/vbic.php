<?php
include("controllers/cper.php");
title("pedal_bike", "Bicicletas", 1, "add", "opbtn", "Crear");
?>
<div class="insert-form <?php if ($ope == "edi") echo "open-form"; ?>" id="vform">
    <form action="home.php?pg=<?= $m['idpag']; ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="serial">Serial</label>
                <input type="text" class="form-control form-control" placeholder="Escribe el serial" name="serial" id="serial" value="<?php if ($dtOne) echo $dtOne[0]['serial']; ?>" required>
            </div>
            <div class="form-group col-md-3">
                <label for="marca">Marca</label>
                <input type="text" class="form-control form-control" placeholder="Escribe la marca" name="marca" id="marca" value="<?php if ($dtOne) echo $dtOne[0]['marca']; ?>" required>
            </div>
            <div class="form-group col-md-2">
                <label for="color">Color</label>
                <input type="text" class="form-control form-control" placeholder="Indica el color" name="color" id="color" value="<?php if ($dtOne) echo $dtOne[0]['color']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="idsed">Sede</label>
                <select class="form-select" name="idsed" id="idsed">
                    <?php
                    if ($pag) {
                        foreach ($pag as $dp) {
                    ?>
                            <option value="<?= $dp['idpag']; ?>" <?php if ($pag && $pagini == $dp['idpag']) echo " selected "; ?>>
                                <?= $dp['idpag']; ?> - <?= $dp['nompag']; ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>
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
<div class="cycles-container">
    <?php
        for($i=0;$i<=30;$i++){
    ?>
    <a class="cycle-item">
        <img class="cycle-item-img" src="img/cycleicon.png" alt="Bicicleta">
        <div class="cycle-info">
            <table>
                <tr>
                    <th>ID:</th>
                    <td>123</td>
                </tr>
                <tr>
                    <th>Marca:</th>
                    <td>GW</td>
                </tr>
                <tr>
                    <th>Color:</th>
                    <td>Rojo</td>
                </tr>
            </table>
        </div>
    </a>
    <?php      
       }
    ?>
</div>
<?php
if ($mdl == 1) {
    require_once("views/vmdlbic.php");
}
?>