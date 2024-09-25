<?php
include "models/meve.php";

$ideve = isset($_REQUEST['ideve']) ? $_REQUEST['ideve'] : null;
$nomeve = isset($_POST['nomeve']) ? $_POST['nomeve'] : null;
$deseve = isset($_POST['deseve']) ? $_POST['deseve'] : null;
$feceve = isset($_POST['feceve']) ? $_POST['feceve'] : null;
$idusu = $_SESSION['idusu'];
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;
//Instanciar el modelo:
$meve = new Meve();
$meve->setIdeve($ideve);
if ($ope == "save") {
    $meve->setNomeve($nomeve);
    $meve->setDeseve($deseve);
    $meve->setFeceve($feceve);
    $meve->setIdusu($idusu);
    if($ideve)$meve->edit($ideve);
    else $meve->save(); 
} 
if ($ope=="del" && $ideve)$meve->delete($ideve);
    if ($ope=="edi" && $ideve){
        $dtOne = $meve->getOne($ideve); 
    }else{ 
        $dtOne=NULL;
    };

// Obtener todos los datos de los eventos y guardalos en una variable
$dtEve = $meve->getAll();

