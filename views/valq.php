<?php
include("controllers/calq.php");
title("bike_lane", "Alquiler de Bicicletas", 0, "add", "opbtn", "Crear");
?>
<div class="cycles-container">
    <?php
    if ($dtBic) {
        foreach($dtBic as $dt){
    ?>
    <a href="home.php?pg=<?= $m['idpag']; ?>&mdl=1&idbic=<?=$dt['idbic'];?>&mdl=alq" class="cycle-item">
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
if ($mdl == "alq") {
    require_once("views/vmdlalq.php");
}
?>
