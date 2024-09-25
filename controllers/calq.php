<?php
include "models/malq.php";

//Instanciar el modelo:
$malq = new Malq();


// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;


//Se almacenan los datos
$idalq = isset($_POST['idalq']) ? $_POST['idalq'] : null;
$idusu = isset($_GET['idusu']) ? $_GET['idusu'] : null;
$idbic = isset($_GET['idbic']) ? $_GET['idbic'] : null;
$dist = isset($_POST['dist']) ? $_POST['dist'] : null;
$totalq = isset($_POST['totalq']) ? $_POST['totalq'] : null;
$fecini = isset($_POST['fecini']) ? $_POST['fecini'] : null;
$fecent = isset($_POST['fecent']) ? $_POST['fecent'] : null;



//Se comprueba que todos los datos que vamos a incertar en la tabla vengan llenos o definidos:
if (!empty($idalq) && !empty($idusu) && !empty($idbic) && !empty($dist) && !empty($totalq) && !empty($fecini) && !empty($fecent)) {

    if (!empty($ope) && $ope == "save") {
        //Se envian todos los datos al modelo 'malq'
        $malq->setIdalq($idalq);
        $malq->setIdusu($idusu);
        $malq->setIdbic($idbic);
        $malq->setDist($dist);
        $malq->setTotalq($totalq);
        $malq->setFecini($fecini);
        $malq->setFecent($fecent);
        //Se ejecuta la consulta en la base de datos
        $malq->save();

    } elseif (!empty($ope) && $ope == "edit") {
        $malq->setIdalq($idalq);
        $malq->setIdusu($idusu);
        $malq->setIdbic($idbic);
        $malq->setDist($dist);
        $malq->setTotalq($totalq);
        $malq->setFecini($fecini);
        $malq->setFecent($fecent);
        $malq->edit($idalq);

    }elseif(!empty($ope) && $ope == "delete"){
        $malq->setIdalq($idalq);
        $malq->delete($idalq);
    }else{
        echo "<script>alert('ERROR: Operación no válida')</script>";
    }
    //Se envian los datos

} else {
    echo "<script>alert('Algunos de los campos están vacíos. Por favor llene todos los campos')</script>";
}

// Obtener todos los datos de los alquileres y guardalos en una variable
$dtAlquileres = $malq->getAll();