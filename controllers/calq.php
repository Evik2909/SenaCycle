<?php
include "models/malq.php";




//Se almacenan los datos
$idalq = isset($_POST['idalq']) ? $_POST['idalq'] : null;
$idusu = isset($_GET['idusu']) ? $_GET['idusu'] : null;
$idbic = isset($_GET['idbic']) ? $_GET['idbic'] : null;
$dist = isset($_POST['dist']) ? $_POST['dist'] : null;
$totalq = isset($_POST['totalq']) ? $_POST['totalq'] : null;
$fecini = isset($_POST['fecini']) ? $_POST['fecini'] : null;
$fecent = isset($_POST['fecent']) ? $_POST['fecent'] : null;
// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;

//Instanciar el modelo:
$malq = new Malq();
$malq->setIdalq($idalq);
if ($ope == "save") {
    //Se envian todos los datos al modelo 'malq'
    $malq->setIdusu($idusu);
    $malq->setIdbic($idbic);
    $malq->setDist($dist);
    $malq->setTotalq($totalq);
    $malq->setFecini($fecini);
    $malq->setFecent($fecent);
    //Se ejecuta la consulta en la base de datos
    if($idalq)$malq->edit($idalq);
    else $malq->save();
}
//if ($ope=="del" && $id)$mpag->del();
if ($ope=="edi" && $idbic || $mdl="alq" && $idbic){
        $dtOne = $malq->getBicInfo($idbic); 
}else{ 
    $dtOne=NULL;
}; 
// Obtener todos los datos de los alquileres y guardalos en una variable
$dtAlq = $malq->getAll();
$dtBic = $malq->getBicicletas();