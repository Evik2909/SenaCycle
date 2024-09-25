<?php
include("controllers/cper.php");
title("supervisor_account", "Perfiles", 1, "person_add", "opbtn", "Crear Perfil");
?>
<div class="insert-form <?php if ($ope == "edi") echo "open-form"; ?>" id="vform">
    <form action="home.php?pg=<?= $m['idpag']; ?>" method="post">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nomper">Nombre</label>
                <input type="text" class="form-control form-control" placeholder="Escribe el nombre..." name="nomper" id="nomper" value="<?php if ($dtOne) echo $dtOne[0]['nomper']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="pagini">Pagina Principal</label>
                <select class="form-select" name="pagini" id="pagini">
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
<div class="table-responsive py-3">
<table class="table table-hover" id="tables" style="width: 100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de Perfil</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ($dat) {
            foreach ($dat as $dt) { ?>
                <tr>
                    <td><?= $dt["idper"]; ?></td>
                    <td><?= $dt["nomper"]; ?></td>
                    <td class="text-align-center">
                        <a class="crudbtn" href="home.php?pg=<?= $m['idpag']; ?>&mdl=1&idper=<?= $dt["idper"]; ?>" title="Paginas Permitidas"><span class="material-symbols-outlined">contact_page</span></a>
                        <a class="crudbtn" href="home.php?pg=<?= $m['idpag']; ?>&ope=edi&idper=<?= $dt["idper"]; ?>" title="Editar"><span class="material-symbols-outlined">edit</span></a>
                        <a class="crudbtn" href="home.php?pg=<?= $m['idpag']; ?>&ope=del&idper=<?= $dt["idper"]; ?>" onclick="drop()" title="Eliminar"><span class="material-symbols-outlined">delete</span></a>
                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre de Perfil</th>
            <th></th>
        </tr>
    </tfoot>
</table>
</div>
<?php
if ($mdl == 1) {
    require_once("views/vpagper.php");
}
?>