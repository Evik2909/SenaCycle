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
                    <td>123</td>
                </tr>
                <tr>
                    <th>Marca:</th>
                    <td>GW</td>
                </tr>
                <tr>
                    <th>Serial:</th>
                    <td>38r9yu94yf2</td>
                </tr>
                <tr>
                    <th>Color:</th>
                    <td>Rojo</td>
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
                    <th>Serial:</th>
                    <td>38r9yu94yf2</td>
                </tr>
                <tr>
                    <th>Color:</th>
                    <td>Rojo</td>
                </tr>
            </table>
        </div>
    </div>
</div>