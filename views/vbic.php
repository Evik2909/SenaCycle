<?php
include("controllers/cbic.php");
title("pedal_bike", "Bicicletas", 1, "add", "opbtn", "Crear");
?>
<div class="insert-form <?php if ($ope == "edi") echo "open-form"; ?>" id="vform">
    <form action="home.php?pg=<?= $m['idpag']; ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="serial">Serial</label>
                <input type="text" class="form-control form-control" placeholder="Escribe el serial" name="seriall" id="seriall" value="<?php if ($dtOne) echo $dtOne[0]['serial']; ?>" required>
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
                    if ($dtSed) {
                        foreach ($dtSed as $dp) {
                    ?>
                            <option value="<?= $dp['idsed']; ?>" <?php if ($dtSed && $idsed == $dp['idsed']) echo " selected "; ?>>
                                <?= $dp['idsed']; ?> - <?= $dp['nomsed']; ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <br>
                <input type="hidden" name="ope" value="save">
                <input type="submit" class="btn btn-color" value="Crear">
                <a href="home.php?pg=<?= $m['idpag']; ?>" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<div class="cycles-container">
    <?php
    if ($dtBic) {
        foreach($dtBic as $dt){
    ?>
    <a href="home.php?pg=<?= $m['idpag']; ?><?php if($dt['estbic']==2)echo"&mdl=1&idbic=".$dt['idbic'];?>" class="cycle-item <?php if($dt['estbic']==1)echo "cycle-active";else echo "cycle-inactive"; ?>">
        <img class="cycle-item-img" src="img/cycleicon.png" alt="Bicicleta">
        <div class="cycle-info">
            <table>
                <tr>
                    <th>ID:</th>
                    <td><?= $dt['idbic']?></td>
                </tr>
                <tr>
                    <th>Marca:</th>
                    <td><?= $dt['marca']?></td>
                </tr>
                <tr>
                    <th>Color:</th>
                    <td><?= $dt['color']?></td>
                </tr>
            </table>
        </div>
    </a>
    <?php      
       }}
    ?>
</div>
<?php
if ($mdl == 1) {
    require_once("views/vmdlbic.php");
}
?>