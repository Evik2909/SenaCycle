<?php
include "models/mbic.php";

//Instanciar el modelo:
$mbic = new Mbic();


// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;


$idbic = isset($_REQUEST['idbic']) ? $_REQUEST['idbic'] : null;
$seriall = isset($_POST['seriall']) ? $_POST['seriall'] : null;
$marca = isset($_POST['marca']) ? $_POST['marca'] : null;
$color = isset($_POST['color']) ? $_POST['color'] : null;
$estbic = isset($_POST['estbic']) ? $_POST['estbic'] : null;
$idsed = isset($_POST['idsed']) ? $_POST['idsed'] : null;



//Se comprueba que todos los datos que vamos a incertar en la tabla vengan llenos o definidos:
if (!empty($idbic) && !empty($seriall) && !empty($marca) && !empty($color) && !empty($estbic) && !empty($idsed)) {

    if (!empty($ope) && $ope == "save") {
        //Se envian todos los datos al modelo 'mbic'
        $mbic->setIdbic($idbic);
        $mbic->setSeriall($seriall);
        $mbic->setMarca($marca);
        $mbic->setColor($color);
        $mbic->setEstbic($estbic);
        $mbic->setIdsed($idsed);

        //Se ejecuta la consulta en la base de datos
        $mbic->save();

    } elseif (!empty($ope) && $ope == "edit") {

        $mbic->setIdbic($idbic);
        $mbic->setSeriall($seriall);
        $mbic->setMarca($marca);
        $mbic->setColor($color);
        $mbic->setEstbic($estbic);
        $mbic->setIdsed($idsed);
        

        //Se ejecuta la consulta en la base de datos
        $mbic->edit($idbic);

    }elseif(!empty($ope) && $ope == "delete"){
        $mbic->setIdbic($idbic);
        $mbic->delete($idbic);
    }else{
        echo "<script>alert('ERROR: Operación no válida')</script>";
    }
    //Se envian los datos

} else {
    echo "<script>alert('Algunos de los campos están vacíos. Por favor llene todos los campos')</script>";
}

// Obtener todos los datos de las bicletas y guardalos en una variable
$dtBicicletas = $mbic->getAll();