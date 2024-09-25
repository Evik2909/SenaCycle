<?php
include "models/musuxeve.php";

//Instanciar el modelo:
$musuxeve = new Musuxeve();


// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;

$idusu = isset($_GET['idusu']) ? $_GET['idusu'] : null;
$ideve = isset($_GET['ideve']) ? $_GET['ideve'] : null;



//Se comprueba que todos los datos que vamos a incertar en la tabla vengan llenos o definidos:
if (!empty($idusu) && !empty($ideve)) {

    if (!empty($ope) && $ope == "save") {

        //Se envian todos los datos al modelo 'musuxeve'
        $musuxeve->setIdusu($idusu);
        $musuxeve->setIdeve($ideve);

        //Se ejecuta la consulta en la base de datos
        $musuxeve->save();

    } elseif (!empty($ope) && $ope == "edit") {

        $musuxeve->setIdusu($idusu);
        $musuxeve->setIdeve($ideve);
        //Se ejecuta la consulta en la base de datos
        $musuxeve->edit($idusu,$ideve);

    }elseif(!empty($ope) && $ope == "delete"){
        
        $musuxeve->setIdusu($idusu);
        $musuxeve->setIdeve($ideve);
        //Se ejecuta la consulta en la base de datos
        $musuxeve->delete($idusu,$ideve);

    }else{
        echo "<script>alert('ERROR: Operación no válida')</script>";
    }
    //Se envian los datos

} else {
    echo "<script>alert('Algunos de los campos están vacíos. Por favor llene todos los campos')</script>";
}

// Obtener todos los datos de las finanzas y guardalos en una variable
$dtUsuariosxevento = $musuxeve->getAll();