<?php
include "models/malq.php";
//Se almacenan los datos
$idalq = isset($_REQUEST['idalq']) ? $_REQUEST['idalq'] : null;
$idusu = $_SESSION['idusu'];
$idbic = isset($_GET['idbic']) ? $_GET['idbic'] : null;
$totalq = isset($_REQUEST['totalq']) ? $_REQUEST['totalq'] : null;
$fecini = date('Y-m-d H:i:s');
$fecent = isset($_POST['fecent']) ? $_POST['fecent'] : null;
// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;

//Instanciar el modelo:
$malq = new Malq();
if ($ope == "save") {
    //Se envian todos los datos al modelo 'malq'
    $malq->setIdusu($idusu);
    $malq->setIdbic($idbic);
    $malq->setFecini($fecini);
    //Se ejecuta la consulta en la base de datos
    $malq->save();
    $ope=null;
}
if ($ope == "finalq") {
    //Se envian todos los datos al modelo 'malq'
    $malq->setIdalq($idalq);
    $malq->setIdbic($idbic);
    $malq->setTotalq($totalq);
    //Se ejecuta la consulta en la base de datos
    $malq->updateAlq($idalq);
    
}
//if ($ope=="del" && $id)$mpag->del();
if ($ope=="edi" && $idbic || $mdl="alq" && $idbic){
        $dtOne = $malq->getBicInfo($idbic); 
}else{ 
    $dtOne=NULL;
}; 
if($malq->verifyAlq($_SESSION['idusu'])){
    $actAlq = $malq->verifyAlq($_SESSION['idusu']); 
}else{
    $actAlq=null;
}
// Obtener todos los datos de los alquileres y guardalos en una variable
$dtAlq = $malq->getAll();
$dtBic = $malq->getBicicletas();
$dtPrc = $malq->getPrecio(); 
//$actAlq = $malq->verifyAlq($_SESSION['idusu']);
if($malq->infoAlq($_SESSION['idusu'])){
    $inAl = $malq->infoAlq($_SESSION['idusu']);
}else{
    $inAl=null;
}
