<?php
include "models/mfin.php";

//Instanciar el modelo:
$mfin = new Mfin();


// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;

// idfin
// nummes
// nommes
// ano
// totfin

$idfin = isset($_REQUEST['idfin']) ? $_REQUEST['idfin'] : null;
$nummes = isset($_POST['nummes']) ? $_POST['nummes'] : null;
$nommes = isset($_POST['nommes']) ? $_POST['nommes'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
 



//Se comprueba que todos los datos que vamos a incertar en la tabla vengan llenos o definidos:
if (!empty($idfin) && !empty($nummes) && !empty($nommes) && !empty($ano) && !empty($totfin)) {

    if (!empty($ope) && $ope == "save") {

        //Se envian todos los datos al modelo 'mfin'
        $mfin->setIdfin($idfin);
        $mfin->setNummes($nummes);
        $mfin->setNommes($nommes);
        $mfin->setAno($ano);

        $totfin = $mfin->getTotalFinanzaPorMes($nummes,$ano);
        $mfin->setTotfin($totfin);

        //Se ejecuta la consulta en la base de datos
        $mfin->save();

    } elseif (!empty($ope) && $ope == "edit") {

        $mfin->setIdfin($idfin);
        $mfin->setNummes($nummes);
        $mfin->setNommes($nommes);
        $mfin->setAno($ano);
        $mfin->setTotfin($totfin);
        //Se ejecuta la consulta en la base de datos
        $mfin->edit($idfin);

    }elseif(!empty($ope) && $ope == "delete"){
        $mfin->setIdfin($idfin);
        $mfin->delete($idfin);
    }else{
        echo "<script>alert('ERROR: Operación no válida')</script>";
    }
    //Se envian los datos

}

// Obtener todos los datos de las finanzas y guardalos en una variable
$dtFinanzas = $mfin->getAll();