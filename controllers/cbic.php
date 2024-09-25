<?php
include "models/mbic.php";
$idbic = isset($_REQUEST['idbic']) ? $_REQUEST['idbic'] : null;
$seriall = isset($_POST['seriall']) ? $_POST['seriall'] : null;
$marca = isset($_POST['marca']) ? $_POST['marca'] : null;
$color = isset($_POST['color']) ? $_POST['color'] : null;
$estbic = isset($_POST['estbic']) ? $_POST['estbic'] : 1;
$idsed = isset($_POST['idsed']) ? $_POST['idsed'] : null;
// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;
//Instanciar el modelo:
$mbic = new Mbic();
$mbic->setIdbic($idbic);
if ($ope == "save") {
    //Se envian todos los datos al modelo 'mbic'
    $mbic->setSeriall($seriall);
    $mbic->setMarca($marca);
    $mbic->setColor($color);
    $mbic->setEstbic($estbic);
    $mbic->setIdsed($idsed);
    if($idbic)$mbic->edit($idbic);
    else $mbic->save();
}
if ($ope=="del" && $idpag)$mpag->del();
    if ($ope=="edi" && $idbic || $mdl==1 && $idbic){
        $dtOne = $mbic->getOne($idbic); 
    }else{ 
        $dtOne=NULL;
    }; 

// Obtener todos los datos de las bicletas y guardalos en una variable
$dtBic = $mbic->getAll();
$dtSed = $mbic->getSede($_SESSION['idusu']);