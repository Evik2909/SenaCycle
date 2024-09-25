<div class="mdl-container">
    <div class="mdl-basic mdl-cycle">
        <div class="head-mdl">
            <span class="material-symbols-outlined">pedal_bike</span>
            <span><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['idbic']; ?></span>
            <a href="home.php?pg=<?= $m['idpag']; ?>" class="mdl-cls-btn">
                <span class="material-symbols-outlined">close</span>
            </a>
        </div>
        <div class="map-container" id="map">

        </div>
        <div class="mdl-cycle-info">
            <table>
                <tr>
                    <th>ID:</th>
                    <td><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['idbic']; ?></td>
                </tr>
                <tr>
                    <th>Marca:</th>
                    <td><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['marca']; ?></td>
                </tr>
                <tr>
                    <th>Serial:</th>
                    <td><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['seriall']; ?></td>
                </tr>
                <tr>
                    <th>Color:</th>
                    <td><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['color']; ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Usuario</th>
                    <td>Carlos Correa</td>
                </tr>
                <tr>
                    <th>Cedula</th>
                    <td>12345678</td>
                </tr>
                <tr>
                    <th>Fecha Alquiler:</th>
                    <td>03/09/24</td>
                </tr>
            </table>
        </div>
    </div>
</div>