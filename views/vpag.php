<?php 
    include("controllers/cpag.php");
    title("web","Paginas", 1, "note_add", "opbtn", "Crear Pagina");
?>
<div class="insert-form <?php if($ope=="edi")echo "open-form"?>" id="vform">
    <form  action="home.php?pg=<?= $m['idpag']; ?>" method="post">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="nompag">Nombre</label>
                <input type="text" class="form-control" placeholder="Escribe el nombre..."  name="nompag" id="nompag" value="<?php if($dtOne && $dtOne[0]['nompag']) echo $dtOne[0]['nompag']; ?>"required >
            </div>
            <div class="form-group col-md-3">
                <label for="icopag">Icono</label>
                <input type="text" class="form-control" placeholder="Nombre del icono..." name="icopag" id="icopag" value="<?php if($dtOne && $dtOne[0]['icopag']) echo $dtOne[0]['icopag']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="rutpag">Ruta (URL)</label>
                <input type="text" class="form-control" placeholder="Escribe la URL..." name="rutpag" id="rutpag" value="<?php if($dtOne && $dtOne[0]['rutpag']) echo $dtOne[0]['rutpag']; ?>"required >
            </div>
            <div class="form-group col-md-2">
                <label for="rutpag">Orden</label>
                <input type="number" class="form-control"  name="ordpag" id="ordpag" value="<?php if($dtOne && $dtOne[0]['ordpag']) echo $dtOne[0]['ordpag']; ?>"required >
            </div>
            <div class="form-group col-md-4">
                <br>
                <input type="hidden" name="idpag" value="<?php if($dtOne && $dtOne[0]['idpag']) echo $dtOne[0]['idpag']; ?>">
                <input type="hidden" name="ope" value="save">
                <input type="submit" class="btn btn-color" value="Crear">
                <a href="home.php?pg=<?= $m['idpag']; ?>" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>
<div class="table-responsive py-3">
<table class="table table-hover" id="tables" style="width:100%">
    <thead >
        <tr>
			<th>ID</th>
			<th>Nombre</th>
            <th>Icono</th>
            <th>Orden</th>
            <th>Ruta</th>
			<th></th>
		</tr>
    </thead>
	<tbody>
		<?php if($dat){ foreach ($dat as $dt) { ?>
			<tr>
				<td><?=$dt["idpag"];?></td>
                <td><?=$dt["nompag"];?></td>
				<td><span class="material-symbols-outlined"><?=$dt["icopag"];?></td>
                <td><?=$dt["ordpag"];?></td>
                <td><?=$dt["rutpag"];?></td>
                <td>
					<a class="crudbtn" href="home.php?pg=<?= $m['idpag']; ?>&ope=del&idpag=<?=$dt["idpag"];?>" onclick="drop()"  title="Eliminar"><span class="material-symbols-outlined">delete</span></a>
					<a class="crudbtn" href="home.php?pg=<?= $m['idpag']; ?>&ope=edi&idpag=<?=$dt["idpag"]?>" title="Editar"><span class="material-symbols-outlined">edit</span></a>
				</td>
			</tr>
		<?php }} ?>
	</tbody>
    <tfoot>
        <tr>
			<th>ID</th>
			<th>Nombre</th>
            <th>Icono</th>
            <th>Orden</th>
            <th>Ruta</th>
			<th></th>
		</tr>
    </tfoot>
</table>
</div>