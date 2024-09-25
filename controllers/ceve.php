<?php
include "models/meve.php";

//Instanciar el modelo:
$meve = new Meve();


// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;

$ideve = isset($_REQUEST['ideve']) ? $_REQUEST['ideve'] : null;
$nomeve = isset($_POST['nomeve']) ? $_POST['nomeve'] : null;
$deseve = isset($_POST['deseve']) ? $_POST['deseve'] : null;
$feceve = isset($_POST['feceve']) ? $_POST['feceve'] : null;
$idusu = isset($_GET['idusu']) ? $_GET['idusu'] : null;



//Se comprueba que todos los datos que vamos a incertar en la tabla vengan llenos o definidos:
if (!empty($ideve) && !empty($nomeve) && !empty($deseve) && !empty($feceve) && !empty($idusu)) {

    if (!empty($ope) && $ope == "save") {

        //Se envian todos los datos al modelo 'meve'
        $meve->setIdeve($ideve);
        $meve->setNomeve($nomeve);
        $meve->setDeseve($deseve);
        $meve->setFeceve($feceve);
        $meve->setIdusu($idusu);

        //Se ejecuta la consulta en la base de datos
        $meve->save();

    } elseif (!empty($ope) && $ope == "edit") {

        $meve->setIdeve($ideve);
        $meve->setNomeve($nomeve);
        $meve->setDeseve($deseve);
        $meve->setFeceve($feceve);
        $meve->setIdusu($idusu);
        //Se ejecuta la consulta en la base de datos
        $meve->edit($ideve);

    }elseif(!empty($ope) && $ope == "delete"){
        $meve->setIdeve($ideve);
        $meve->delete($ideve);
    }else{
        echo "<script>alert('ERROR: Operación no válida')</script>";
    }
    //Se envian los datos

} else {
    echo "<script>alert('Algunos de los campos están vacíos. Por favor llene todos los campos')</script>";
}

// Obtener todos los datos de los eventos y guardalos en una variable
$dtEventos = $meve->getAll();