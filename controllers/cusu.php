<?php
include "models/musu.php";

//Instanciar el modelo:
$musu = new Musu();


// Se define y/o llena la variable de ope para saber que operacion se va a realizar en la tabla de 'alquiler'
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : null;


$idusu = isset($_REQUEST['idusu']) ? $_REQUEST['idusu'] : null;
$idper = isset($_POST['idper']) ? $_POST['idper'] : null;
$nomusu = isset($_POST['nomusu']) ? $_POST['nomusu'] : null;
$tipdoc = isset($_POST['tipdoc']) ? $_POST['tipdoc'] : null;
$ndoc = isset($_POST['ndoc']) ? $_POST['ndoc'] : null;
$emausu = isset($_REQUEST['emausu']) ? $_REQUEST['emausu'] : null;
$telusu = isset($_POST['telusu']) ? $_POST['telusu'] : null;
$pasusu = isset($_POST['pasusu']) ? $_POST['pasusu'] : null;
$codubi = isset($_POST['codubi']) ? $_POST['codubi'] : null;
$idsed = isset($_POST['idsed']) ? $_POST['idsed'] : null;
$estusu = isset($_POST['estusu']) ? $_POST['estusu'] : null;



//Se comprueba que todos los datos que vamos a incertar en la tabla vengan llenos o definidos:
if (!empty($idusu) && !empty($idper) && !empty($nomusu) && !empty($tipdoc) && !empty($ndoc) && !empty($emausu) && !empty($telusu) && !empty($pasusu) && !empty($codubi) && !empty($idsed)) {

    if (!empty($ope) && $ope == "save") {

        //Se envian todos los datos al modelo 'musu'
        $musu->setIdusu($idusu);
        $musu->setIdper($idper);
        $musu->setNomusu($nomusu);
        $musu->setTipdoc($tipdoc);
        $musu->setNdoc($ndoc);
        $musu->setEmausu($emausu);
        $musu->setTelusu($telusu);
        $musu->setPasusu($pasusu);
        $musu->setCodubi($codubi);
        $musu->setIdsed($idsed);
        $musu->setEstusu($estusu);

        //Se ejecuta la consulta en la base de datos
        $musu->save();

    } elseif (!empty($ope) && $ope == "edit") {

        $musu->setIdusu($idusu);
        $musu->setIdper($idper);
        $musu->setNomusu($nomusu);
        $musu->setTipdoc($tipdoc);
        $musu->setNdoc($ndoc);
        $musu->setEmausu($emausu);
        $musu->setTelusu($telusu);
        $musu->setPasusu($pasusu);
        $musu->setCodubi($codubi);
        $musu->setIdsed($idsed);
        $musu->setEstusu($estusu);

        //Se ejecuta la consulta en la base de datos
        $musu->edit($idusu);

    }elseif(!empty($ope) && $ope == "delete"){
        $musu->setIdusu($idusu);
        $musu->delete($idusu);
    }else{
        echo "<script>alert('ERROR: Operación no válida')</script>";
    }
    //Se envian los datos

} else {
    echo "<script>alert('Algunos de los campos están vacíos. Por favor llene todos los campos')</script>";
}

// Obtener todos los datos de los usuarios y guardalos en una variable
$dtUsuarios = $musu->getAll();