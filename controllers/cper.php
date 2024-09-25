<?php 
include("models/mper.php");

$idper = isset($_REQUEST['idper']) ? $_REQUEST['idper']:NULL;
$nomper = isset($_POST['nomper']) ? $_POST['nomper']:NULL;
$pagini = isset($_POST['pagini']) ? $_POST['pagini']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
$mdl = isset($_REQUEST['mdl']) ? $_REQUEST['mdl']:NULL;


$mper=new Mper();
$mper->setIdper($idper);
if($ope=="guardar"){
	$mper->setNomper($nomper);
	$mper->setPagini($pagini);
	if($idper) $mper->edit();
	else $mper->save();
}

if ($ope=="del" && $idper) $mper->del();
if ($ope=="edi" && $idper || $mdl==1 && $idper){
	$dtOne = $mper->getOne();
}else{ 
	$dtOne=NULL;
}

$dat=$mper->getAll();
$pag=$mper->getPag();

?>