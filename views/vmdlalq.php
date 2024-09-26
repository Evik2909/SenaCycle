<div class="mdl-container">
    <div class="mdl-basic p-3">
        <h4>¿Deseas alquilar esta bicicleta?</h4>
        <div class="d-flex justify-content-center p-3 ">
            <table>
                <tr>
                    <th class="px-2">ID:</th>
                    <td><?=$dtOne[0]['idbic']; ?></td>
                </tr>
                <tr>
                    <th class="px-2">Marca:</th>
                    <td><?=$dtOne[0]['marca']; ?></td>
                </tr>
                <tr>
                    <th class="px-2">Serial:</th>
                    <td><?=$dtOne[0]['seriall']; ?></td>
                </tr>
                <tr>
                    <th class="px-2">Color:</th>
                    <td><?=$dtOne[0]['color']; ?></td>
                </tr>
                <tr>
                    <th class="px-2">Precio/hora:</th>
                    <td><?=$dtPrc[0]['nomval']; ?></td>
                </tr>
            </table>
        </div>
        <div class="d-flex justify-content-center gap-3">
        <a href="home.php?pg=<?= $m['idpag']; ?>" class="btn btn-danger">Cancelar</a>
        <a href="home.php?pg=<?= $m['idpag']; ?>&alq=1&idbic=<?=$dtOne[0]['idbic'];?>&ope=save"  class="btn btn-color">Si, Alquilar</a>
        </div>
    </div>
</div>