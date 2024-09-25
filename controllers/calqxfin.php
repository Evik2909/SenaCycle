<?php
include "models/malqxfin.php";

//Instanciar el modelo:
$malqxfin = new Malqxfin();


// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;


$idfin = isset($_GET['idfin']) ? $_GET['idfin'] : null;
$idalq = isset($_GET['idalq']) ? $_GET['idalq'] : null;



//Se comprueba que todos los datos que vamos a incertar en la tabla vengan llenos o definidos:
if (!empty($idfin) && !empty($idalq)) {

    if (!empty($ope) && $ope == "save") {

        //Se envian todos los datos al modelo 'malqxfin'
        $malqxfin->setIdfin($idfin);
        $malqxfin->setIdalq($idalq);

        //Se ejecuta la consulta en la base de datos
        $malqxfin->save();

    } elseif (!empty($ope) && $ope == "edit") {

        $malqxfin->setIdfin($idfin);
        $malqxfin->setIdalq($idalq);
        //Se ejecuta la consulta en la base de datos
        $malqxfin->edit($idfin,$idalq);

    }elseif(!empty($ope) && $ope == "delete"){
        
        $malqxfin->setIdfin($idfin);
        $malqxfin->setIdalq($idalq);
        //Se ejecuta la consulta en la base de datos
        $malqxfin->delete($idfin,$idalq);

    }else{
        echo "<script>alert('ERROR: Operación no válida')</script>";
    }
    //Se envian los datos

} else {
    echo "<script>alert('Algunos de los campos están vacíos. Por favor llene todos los campos')</script>";
}

// Obtener todos los datos de las finanzas y guardalos en una variable
$dtAlquileresxFinanzas = $malqxfin->getAll();