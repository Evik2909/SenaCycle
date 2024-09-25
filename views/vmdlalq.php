<div class="mdl-container">
    <div class="mdl-basic p-3">
        <h4>¿Deseas alquilar esta bicicleta?</h4>
        <div class="d-flex justify-content-center p-3 ">
            <table>
                <tr>
                    <th class="px-2">ID:</th>
                    <td><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['idbic']; ?></td>
                </tr>
                <tr>
                    <th class="px-2">Marca:</th>
                    <td><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['marca']; ?></td>
                </tr>
                <tr>
                    <th class="px-2">Serial:</th>
                    <td><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['seriall']; ?></td>
                </tr>
                <tr>
                    <th class="px-2">Color:</th>
                    <td><?php if ($dtOne && $dtOne[0]['idbic']) echo $dtOne[0]['color']; ?></td>
                </tr>
            </table>
        </div>
        <div class="d-flex justify-content-center gap-3">
        <a href="home.php?pg=<?= $m['idpag']; ?>" class="btn btn-danger">Cancelar</a>
        <button class="btn btn-color">Si, Alquilar</button>
        </div>
    </div>
</div>